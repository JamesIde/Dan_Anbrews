<?php
session_start();

require_once "dbconn.php";

if (isset($_POST['submit'])) {
  $last_id = mysqli_insert_id($conn);
  //Set the id to that of the last id inserted into user_info
  $_SESSION['lastID'] = $last_id;
  $statement = mysqli_stmt_init($conn);
  if ($conn) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip_code = $_POST['zipCode'];
    $null = null;
    $stmt = $conn->prepare("INSERT INTO user_info(userid,`fname`, `lname`, `email`, `phone_number`, `address`, `city`, `zip_code`) 
    values (?,?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssss', $null, $fname, $lname, $email, $phone_number, $address, $city, $zip_code);
    if ($stmt->execute()) {
      $last_id = mysqli_insert_id($conn);
      $_SESSION['lastID'] = $last_id;
      header("location: ../creditcard.php");
    } else {
      echo mysqli_error($conn);
    }
  } //conn
} //isset


$stmt->close();
$conn->close();
?>