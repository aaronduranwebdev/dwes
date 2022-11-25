<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product_report.css">
    <title>Product Report</title>
</head>
<body>
    <?php
    // Show submitted fields as unordered list
    echo "<h1>Product Report</h1>";
    echo "<ul>";
    echo "<li class=\"key\">Product Name</li>";
    echo "<li class=\"value\">" .$_POST['product_name'] ."</li>";
    if(!empty($_POST["description"])){
        echo "<li class=\"key\">Description</li>";
        echo "<li class=\"value\">" .$_POST['description'] ."</li>";
    }
    if(!empty($_POST["price"])){
        echo "<li class=\"key\">Price</li>";
        echo "<li class=\"value\">" .$_POST['price'] ."</li>";
    }
    if(!empty($_POST["state"])){
        echo "<li class=\"key\">Category</li>";
        foreach($_POST["state"] as $state){
            echo "<li class=\"value\">" . $state ."</li>";
        }
    }
    echo "<li class=\"key\">Product Date</li>";
    echo "<li class=\"value\">" . date("m/d/Y", strtotime($_POST["year"] . "/" . $_POST["month"] . "/" . $_POST["day"])) ."</li>";
    echo "</ul>";
    ?>
</body>
</html>   