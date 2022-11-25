<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/service.css">
    <title>Service</title>
</head>
<body>
    <div class="title">
        <h1>Register service</h1>
        <p class="note">Note: Required fields appear in red</p>
    </div>
    <p id="err"><?php echo $error_message ?></p>
    <div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <label for="product_name" class="required">Service Code</label>
        <input type="text" name="service_code" id="service_code" value="<?php if(isset($_POST['service_code']))  echo $_POST['service_code']?>">
        <label for="service_name">Service Name</label>
        <input type="text" name="service_name" id="service_name" value="<?php if(isset($_POST['service_name'])) echo $_POST['service_name'] ?>">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?php if(isset($_POST['description']))  echo $_POST['description']?>">
        <label for="date" class="required">Start Date</label>
        <div class="date-picker">
            <select name="month" id="month" class="date">
                <option value="<?php if(isset($_POST['month'])) echo $_POST['month']; else echo '1' ?>" selected><?php if(isset($_POST['month'])) echo date('F', mktime(0, 0, 0, $_POST['month'], 10)); else echo 'January' ?></option>
            </select>
            <select name="day" id="day" class="date">
                <option value="<?php if(isset($_POST['day'])) echo $_POST['day']; else echo '1' ?>" selected><?php if(isset($_POST['day'])) echo $_POST['day']; else echo '1' ?></option>
            </select>
            <select name="year" id="year" class="date">
            <option value="<?php if(isset($_POST['year'])) echo $_POST['year']; else echo '1990' ?>" selected><?php if(isset($_POST['year'])) echo $_POST['year']; else echo '1990' ?></option>
            </select>
        </div>
        <label for="image" class="required">Image</label>
        <input type="file" name="image" id="image">
        <div class="optional">
        <h2>Optional Files</h2>
            <input type="file" name="opt_files[]" id="">
            <input type="file" name="opt_files[]" id="">
            <input type="file" name="opt_files[]" id="">
        </div>
        <input type="submit" value="Submit">
    </form>
    </div>
    <script src="js/calendary.js"></script>
</body>