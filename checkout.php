<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/dan_anbrews.jpg">
    <link rel="stylesheet" href="styles/checkout.css?v=<?php echo time(); ?>">
</head>

<?php
require_once "php/menu.php";
?>
    <div class="row">
        <div class="outer">
            <div class="container">
            <form action="php\billingscript.php" method="POST" id="checkout-form">

                <div class="row">
                    <div class="inner">
                        <h3>Billing Address</h3>
                        <label for="fname"> First Name</label>
                        <input type="text" id="fname" name="fname">
                        <label for="fname"> Last Name</label>
                        <input type="text" id="lname" name="lname">
                        <label for="email"> Email</label>
                        <input type="text" id="email" name="email">
                        <label for="email"> Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber">
                        <label for="adr"></i> Address</label>
                        <input type="text" id="address" name="address">
                       

                        <div class="row">
                            <div class="inner">
                            <label for="city"> City</label>
                        <input type="text" id="city" name="city">
                            </div>
                            <div class="inner">
                                <label for="zip">Zip</label>
                                <input type="text" id="zipCode" name="zipCode">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="continueButton" value="submit" name="submit" 
                class = "btn"> Continue </button>

                </form>
            </div>
        </div> 
    </div>

</body>

</html>