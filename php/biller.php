<!DOCTYPE html>
<html>

<body>
  <?php

  require_once "dbconn.php";


  if (isset($_POST['submit'])) {

    // The Placeholders in $_POST Reference the name, not the ID!
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip_code = $_POST['zipCode'];


    // Credit Card Information

    $creditCardName = $_POST['creditCardName'];
    $creditCard = $_POST['creditCard'];
    $cvv = $_POST['cvv'];
    $expDate = $_POST['expDate'];


    // SQL Statement
    $userInfo = "INSERT INTO user_info(`fname`, `lname`, `email`, `phone_number`, `address`, `city`, `zip_code`) values ('$fname', '$lname', '$email', '$phone_number', '$address', '$city', '$zip_code')";
    $creditInfo = "INSERT INTO payment_info(`card_number`,`cvv`,`card_name`,`expiration_date`) values ('$creditCard', '$cvv', '$creditCardName','$expDate')";
  // Here is the problem - when i try to insert into payment info it has no idea what the userId is from user_info so it wont let me insert 
    
    // Insert into DB 
    $userInsert = mysqli_query($conn, $userInfo);
    $creditInsert = mysqli_query($conn, $creditInfo);

    //Credit Card details from the checkout form are not sent yet
    if (!$userInsert) {
      echo mysqli_error($conn);
    } else {
      echo "User Info Received <br>";
    }

    if (!$creditInsert) {
      echo mysqli_error($conn);
    } else {
      echo "Credit Information (insecurely) Received";
    }


    mysqli_close($conn);
  }
  // for the credit card details that would need to be sent and stored securely using those filters or whatever
  ?>

</body>

</html>