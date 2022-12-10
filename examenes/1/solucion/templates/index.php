<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Choice</title>
</head>
<body>
    <h1>Select destination page</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="submit" value="product" name="site_choice">
    <input type="submit" value="service" name="site_choice">
    </form>
</body>
</html>
