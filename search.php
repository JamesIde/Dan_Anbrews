<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <title>Search</title>
    <meta charset="UTF-8" />
    <meta name="author" content=" " />
    <link rel="icon" href="img/dan_anbrews.jpg">
</head>
<body>
<?php require_once "php/menu.php"; ?>

    <?php $searchResult = "%" . $_GET['searchBar'] ."%";?>
    <div class="image-row">
        <h1 id=productCategory>Search Results</h1>
        <div class="image-column">
            <?php
        require_once "php/dbconn.php";
                    
                    $statement = mysqli_stmt_init($conn);
                    if ($conn) {

                        $stmt = $conn->prepare("SELECT * FROM product_info WHERE product_type LIKE ? OR product_name LIKE ?");
                        $stmt->bind_param('ss', $searchResult, $searchResult);
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
                    if($result = 0){
                        echo "No results to match the query";
                    }
                    // Close the connection
                    $stmt->close();
                    $conn->close();
                    ?>
        </div>
    </div>
</body>

</html>