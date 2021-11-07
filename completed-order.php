<?php
session_start();
unset($_SESSION['cart']);
require "php/menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/dan_anbrews.jpg">
    <title>Thank you</title>
    <meta charset="UTF-8"/>
</head>
<body>
<h1 id="ordercompleteheader">
    We are processing your order now, Thank you for your purchase
</h1>
</body>
</html>
