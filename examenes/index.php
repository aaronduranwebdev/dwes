<?php

    if(!empty($_POST)){
        
        // Redirect user to another page
        $sitemap = array("product" => "product.php", "service" => "service.php");
        $choice = $_POST["site_choice"];
        header("Location: $sitemap[$choice]");
    }
    else {
        ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>Choice</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="product">Product</label>
        <input type="radio" name="site_choice" id="product" value="product">
        <label for="service">Service</label>
        <input type="radio" name="site_choice" id="service" value="service">
        <input type="submit" value="Submit">
        </form>
    </body>
    </html>

        <?php
    }