
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta charset="UTF-8" />
    <meta name="author" content="James Ide ide0010" />
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/dan_anbrews.jpg">
    <link rel="stylesheet" href="styles/checkout.css?v=<?php echo time(); ?>">

</head>
<?php
require_once "php/menu.php";
?>

    <div class="row">
        <div class="outer">
            <div class="container"  id = "cc">
            <form action="php\creditcardscript.php" method="POST" >

                <div class="row" >
                     <div class="inner" >
                        <h3>Payment</h3>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="creditCardName" name="creditCardName" >
                        <label for="ccnum">Credit Card Number</label>
                        <input type="text" id="creditCardNumber" name="creditCardNumber" minlength="1">
                        <label for="expmonth">Expiration Date (MM/YYYY)</label>
                        <input type="text" id="expDate" name="expDate" maxlength = "7">

                        <div class="row">

                            <div class="inner">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" maxlength = "3">
                            </div>
                        </div>
                    </div> 
                </div>
                <button type="submit" id="place-order-button" value="submit" name="submit" 
                class = "btn"> Complete Order</button>                
            </form>
            </div>
        </div>
        
    </div>

</body>

</html>

