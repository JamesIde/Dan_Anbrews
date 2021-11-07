<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dan An-Brews</title>
    <link rel="stylesheet" href="styles/checkout.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="TopMenu">
    <li><a href="home.php"><img src="img/dan_anbrews.jpg" id="danImg"></a></li>
        <li id="title">
            <h1>Dan An-Brews</h1>
        </li>
            <form class = "searchForm" action="search.php" method="GET">
                <li><input type="text" id="textarea" name="searchBar" placeholder="Search"></li>
                <li><button type="submit" id="searchButton" name ="submit-search" >Search</li>
            </form>
        <li id="checkoutButton"><a href="cart.php"><img src="img/cart.jpg" id="cartImg"></a></li>
    </div>
<div class="menu">
    <ul>
        <li class="dropdown"><a class="dropbtn" href="#1">Categories</a>
            <div class="dropdown-content">
                <a href="product-type.php?product_type=Beer">Beer</a>
                <a href="product-type.php?product_type=Wine">Wine</a>
                <a href="product-type.php?product_type=Vodka">Vodka</a>
                <a href="product-type.php?product_type=Cider">Cider</a>
            </div>    
        </li>
    </ul>
</div>
</body>
</html>

