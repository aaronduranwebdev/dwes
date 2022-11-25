<?php

    /*
        This file is in charge of handling the process of saving files.
        It can either process the required files or the optional files.
        If something goes wrong during the process the functions in the
        FileProcessor class will yield an enum containing the error cause
        in a string
    */

    include_once "parser.php";

    enum PostFile {
        case Required;
        case Optional;
    }

    enum FileError: string {
        case InvalidFile = "Image could not be uploaded";
        case InvalidFormat = "Error uploading optional files. Files do not meet the requirements";
        case UploadError = "Something went wrong when uploading file";
    }

    class FileProcessor {

        static private $UPLOADS_DIR = "uploads/";

        static public function save_files($filetype, $new_name = null){
            FileProcessor::check_upload_dir();
    
            // Always check if the file extension is allowed
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
    
            if($filetype == PostFile::Required){
                $file = $_FILES["image"]["tmp_name"];
                $valid_extensions = array("jpg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif");
                $ext = array_search(finfo_file($finfo, $file), $valid_extensions);
    
                if($ext === false) {
                    finfo_close($finfo);
                    return FileError::InvalidFile;
                }
        
                $res = move_uploaded_file($file, "./" . FileProcessor::$UPLOADS_DIR . $new_name . "." . $ext);
        
                finfo_close($finfo);

                return $res ? true : FileError::UploadError;
            }
            else if($filetype == PostFile::Optional){
                $files = $_FILES["opt_files"];
                $valid_extensions = array("jpg" => "image/jpeg", "png" => "image/png", "pdf" => "application/pdf");
                $curr = current($files["tmp_name"]);
                $curr_original_name = current($files["name"]);
    
                while($curr){
                    if(!empty($curr)){
                        $ext = array_search(finfo_file($finfo, $curr), $valid_extensions);
        
                        if($ext === false) {
                            finfo_close($finfo);
                            array_map("unlink", glob(FileProcessor::$UPLOADS_DIR . "*"));
                            return FileError::InvalidFile;
                        }
    
                        if(!Parser::check_format($curr_original_name, $ext)){ 
                            finfo_close($finfo);
                            array_map("unlink", glob(FileProcessor::$UPLOADS_DIR . "*"));
                            return FileError::InvalidFormat;
                        }
        
                        // Hash the name of the file before saving it
                        $new_name = hash("sha1", $curr);
            
                        $res = move_uploaded_file($curr, "./" . FileProcessor::$UPLOADS_DIR . $new_name . "." . $ext);
            
                        if($res === false) {
                            finfo_close($finfo);
                            array_map("unlink", glob(FileProcessor::$UPLOADS_DIR . "*"));
                            return FileError::UploadError;
                        }
                    }
        
                    $curr = next($files["tmp_name"]);
                    $curr_original_name = next($files["name"]);
                }
        
                finfo_close($finfo);
        
                return true;
            }
        }

        // Check if uploads dir exists, if not, create it
        static private function check_upload_dir(){
            if(!file_exists(FileProcessor::$UPLOADS_DIR) || !is_dir(FileProcessor::$UPLOADS_DIR)){
                mkdir(FileProcessor::$UPLOADS_DIR);
            }
        }
    }