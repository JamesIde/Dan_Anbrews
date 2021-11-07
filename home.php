<?php
session_start();
require_once "php/menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dan An-Brews</title>
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/dan_anbrews.jpg">
</head>
<body>
<div class="image-row">
    <h1>Featured Products</h1>
        <div class="image-column">
            <?php
                require_once "php/dbconn.php";
                $sql = "SELECT * FROM product_info;";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="image-grid-item">
                            <?php $id = $row["productId"]; ?>
                            <img src=<?php echo $row["product_image_dir"]; ?>>
                            <?php echo $row["product_name"]; ?><br>
                            <?php echo $row["product_descr"]; ?><br>
                         <div class="product_price">   $<?php echo $row["product_price"]; ?><br> </div>
                            <?php echo "<a href=product-template.php?id=" . $id .">View Product</a>"?>
                        </div>
            <?php
                    }
                }
                mysqli_free_result($result);
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>

</html>

