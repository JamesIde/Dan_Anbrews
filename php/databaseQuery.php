<?php
include "dbconn.php";
session_start();
$id = (int)$_GET['id'];
$statement = mysqli_stmt_init($conn);
if($conn):
    $stmt = $conn -> prepare("SELECT * FROM product_info WHERE productId=?");
    $stmt -> bind_param('i',$id);
    $stmt -> execute();
    $result = $stmt->get_result();
    while($row = $result ->fetch_assoc()):
        $productName = $row['product_name'];
        $price = $row['product_price'];
        $details = $row['product_descr'];
        $image = $row["product_image_dir"];
        $description = $row["product_page_detail"];
        $productID = $row["productId"];
    endwhile;
else:
    echo mysqli_error($conn);
endif;
$stmt -> close();
$conn -> close();
?>
