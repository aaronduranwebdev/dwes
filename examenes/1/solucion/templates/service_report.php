<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product_report.css">
    <title>Service Report</title>
</head>
<body>
    <?php
    // Show submitted fields as unordered list
    echo "<h1>Service Report</h1>";
    echo "<ul>";
    echo "<li class=\"key\">Service Code</li>";
    echo "<li class=\"value\">" .$_POST['service_code'] ."</li>";
    if(!empty($_POST["service_name"])){
        echo "<li class=\"key\">Service Name</li>";
        echo "<li class=\"value\">" .$_POST['service_name'] ."</li>";
    }
    if(!empty($_POST["description"])){
        echo "<li class=\"key\">Description</li>";
        echo "<li class=\"value\">" .$_POST['description'] ."</li>";
    }
    echo "<li class=\"key\">Service Date</li>";
    echo "<li class=\"value\">" . date("m/d/Y", strtotime($_POST["year"] . "/" . $_POST["month"] . "/" . $_POST["day"])) ."</li>";
    echo "<p>Files submitted correctly</p>";
    echo "</ul>";
    ?>
</body>
</html>