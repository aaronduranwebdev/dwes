<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Product</title>
</head>
<body>
<div class="title">
    <h1>Register product</h1>
    <p class="note">Note: Required fields appear in red</p>
</div>
<p id="err"><?php echo $error_message ?></p>
<div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="product_name" class="required">Product Name</label>
        <input type="text" name="product_name" id="product_name" value="<?php if(isset($_POST['product_name']))  echo $_POST['product_name']?>">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?php if(isset($_POST['description']))  echo $_POST['description']?>">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" min="0" step="0.01" value="<?php if(isset($_POST['price']))  echo $_POST['price']?>">
        <label for="date" class="required">Manufacturing Date</label>
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
        <div class="state">
        <h2>Category</h2>
        <label for="bio">BIO</label>
        <input type="checkbox" name="state[]" value="bio" <?php if(isset($_POST['state']) && in_array('bio', $_POST['state'])) echo 'checked=\"checked"' ?>>
        <label for="fresh">Fresh</label>
        <input type="checkbox" name="state[]" value="fresh" <?php if(isset($_POST['state']) && in_array('fresh', $_POST['state'])) echo 'checked=\"checked"' ?>>
        <label for="frozen">Frozen</label>
        <input type="checkbox" name="state[]" value="frozen" <?php if(isset($_POST['state']) && in_array('frozen', $_POST['state'])) echo 'checked=\"checked"' ?>>
        <label for="packed">Packed</label>
        <input type="checkbox" name="state[]" value="packed" <?php if(isset($_POST['state']) && in_array('packed', $_POST['state'])) echo 'checked=\"checked"' ?>>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
<script src="js/calendary.js"></script>
</body>
</html>