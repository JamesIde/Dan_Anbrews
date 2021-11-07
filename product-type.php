<?php  $pType = $_GET['product_type']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/dan_anbrews.jpg?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <title>Product</title>
    <meta charset="UTF-8" />
    <meta name="author" content="J" />
</head>

<body>
<?php require_once "php/menu.php" ?>
    <div class="image-row">
            <h1 id = "productCategory"> <?php echo $pType ?> Products</h1>
            <div class="image-column">
                    <?php
                    require_once "php/dbconn.php";
                    
                    $statement = mysqli_stmt_init($conn);
                    if ($conn) {

                        //Check for malicious input
                        $stmt = $conn->prepare("SELECT * FROM product_info WHERE product_type=?");
                        $stmt->bind_param('s', $pType);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Setting the variables
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["productId"];
                            $pName = $row['product_name'];
                            $price = $row['product_price'];
                            $pDescr = $row['product_descr'];
                            $image = $row["product_image_dir"];

                            
                    ?>
                            <!-- Echo the products -->
   
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
                    } else {
                        echo mysqli_error($conn);
                    }
                    // Close the connection
                    $stmt->close();
                    $conn->close();
                    ?>
            </div>
        </div>

</body>

</html>