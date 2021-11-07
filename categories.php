<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="icon" href="img/dan_anbrews.jpg">
    <title>Dan An-Brews</title>
    <meta charset="UTF-8" />
    <meta name="author" content=" " />
</head>

<body>
    <div class="TopMenu">
        <li> <a href="home.php"> <img src="img/dan_anbrews.jpg" id="danImg"></a></li>
        <li id="title">
            <h1>Dan An-Brews</h1>
        </li>
        <li><input type="text" id="textarea" name="searchBar" placeholder="Search Product"></li>
        <li><input type="submit" id="submitButton" value="Enter"></li>
        <li id="checkoutButton"><a href="checkout.php"><img src="img/cart.jpg" id="cartImg"></a></li>
    </div>
    <div class="menu">
        <ul>
            <div class="droptown-content">
                <li><a href="specials.html" class="menu-special">Specials</a></li>
                <li><a href="categories.php" class="menu-categories">Categories</a></li>
            </div>
        </ul>
    </div>

        <?php
        require_once "php/dbconn.php";

        $sql = "SELECT DISTINCT product_type from product_info;";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 1) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                                <div class = "listCategory">
                                    <ul>
                            <?php $pType = $row['product_type']; ?>
                            <?php echo "<a href=product-type.php?product_type=" . $pType . "> $pType </a>" ?>
                            </ul>    
                        </div>
        <?php
                }
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        ?>
</body>

</html>