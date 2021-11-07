<?php
require "php/menu.php";
include "php/dbconn.php";
session_start();
if(!(isset($_SESSION['cart']))){
    $_SESSION['cart'] = array();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    if($quantity > 0 && filter_var($quantity, FILTER_VALIDATE_INT)){
        $_SESSION['cart'][$id] = $quantity;
    }
    elseif($quantity == 0){
	    unset($_SESSION['cart'][$id]);
    }
    else {
	    echo "Bad input";
    }
}


if(isset($_GET['remove']) && (!empty($_GET['remove'] || $_GET['remove'] == 0))){
    unset($_SESSION['cart'][$_GET['remove']]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Link two stylesheets one for the main layout out and the second for the actual content on the page-->
    <link rel="stylesheet", href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet", href="styles/cart.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/dan_anbrews.jpg">
    <title>dan_anbrews</title>
    <meta charset="UTF-8"/>
</head>
<body>

<!-- cart items -->

    <div class='small-container cart-page'>
        <table id="maintable">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
            $showDivFlag = true;
            if(!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $val) {
                    if ($conn) {
                        $stmt = $conn->prepare("SELECT * FROM product_info WHERE productId=?") or die("");
                        $stmt->bind_param('i', $key);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            $productName = $row['product_name'];
                            $price = $row['product_price'];
                            $details = $row['product_descr'];
                            $image = $row["product_image_dir"];
                            $description = $row["product_page_detail"];
                            $productID = $row["productId"];
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                    $subtotal = $val * $price;
                    $grandtotal += $subtotal;
                    echo "
                        <tr>
                            <td>
                                <div class='cart-info'>
                                   <img src={$image} alt='product'/>
                                    <div>
                                        <p>{$productName}</p>
                                        <small>subtotal: $ {$price}</small>
                                        <br>
                                        <a href='?remove={$key}'>remove</a>
                                    </div>
                                </div>
                            </td>
                    <form action={$_SERVER['PHP_SELF']}>
                        <td><input type='text' value='$val' name='quantity'></td>
                        <input type='hidden' value='$key' name='id'>
                                <td>$ {$subtotal}</td>
                        </form>
                    </tr>
                    ";
                }
            }
            else {
                echo "
                        <script type='text/javascript'>document.getElementById('maintable').style.display = 'none';</script>
                        <div class='small-container cart-page'>                                
                            <h1>Your cart appears to be empty, why not get on the beers?</h1>    
                            <img id='getonthebeers' src='img/danandrews.png'>
                        </div>
                ";
            }?>
        </table>
            <?php if(!empty($_SESSION['cart'])){
                echo "
                    <div class='totalPrice'>
                        <table>
                            <tr>
                                <td>Total</td>
                                <td>$ {$grandtotal}</td>
                            </tr>
                        </table>
                    </div>
                    <form action='checkout.php'>
                        <input type='submit' value='Checkout' id='button'>
                    </form>
                "; } else {
                echo "";
            }?>
</div>
</body>
</html>
