<?php
require_once "php/menu.php";
require_once "php/databaseQuery.php";
if(!(isset($_SESSION['cart']))){
    $_SESSION['cart'] = array();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $quanNum = $_GET['quan'];
    if($quanNum > 0 && filter_var($quanNum, FILTER_VALIDATE_INT)){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] += $quanNum;
        }else {
            $_SESSION['cart'][$id] = $quanNum;
            header("cart.php");
        }
    } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Product</title>
      <link rel="icon" href="img/dan_anbrews.jpg">
      <link rel="stylesheet" href="styles/product.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
  </head>
  <body>

<?php echo "
<div id='content'>

    <div class='product_name'>
        <p>{$productName}</p>
    </div>

    <div class='product_image'>
       <img src={$image} alt='product' width='325' height='400' />
    </div>

    <div class='product_add_cart'>
        
        <p>Price: $ {$price}</p>
        <div id='buttons'>
            <form>
                <label for='quan'>Quantity: </label>
                <input name='quan' id='quan' type='text' value='1'>
                <input type='hidden' name='id' id='id' value={$productID}>
                <br>
                <br>
                <input type='submit' id='submitButton' value='Add to cart'>
            </form>
        </div>
    </div>
    <div class='product_details'>
        <p id = pInfo> Size and Quantity </p>
        <p id = pDetails> {$details}</p>
        <p id = pInfo> About the product </p>
        <p id = pDescription> {$description}</p>
    </div>
</div>
  "?>
</body>
</html>