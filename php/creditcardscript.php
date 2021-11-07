
<?php
session_start();

$lastId = $_SESSION['lastID'];

require_once "dbconn.php";

if (isset($_POST['submit'])) {
    $statement = mysqli_stmt_init($conn);
    // Code for inserting into payment_info table
    if ($conn) {
        $creditCardName = $_POST['creditCardName'];
        $creditCard = $_POST['creditCardNumber'];
        $cvv = $_POST['cvv'];
        $expDate = $_POST['expDate'];
        $paymentId = null;
        $stmt = $conn->prepare("INSERT INTO payment_info(paymentId, userId,`card_number`,`cvv`,`card_name`,`expiration_date`) 
        values (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $null, $lastId, $creditCard, $cvv, $creditCardName,$expDate);
        if ($stmt->execute()) {
            header("location: ../completed-order.php");
        } else {
            echo mysqli_error($conn);
    }
  } //conn
} //isset


$stmt->close();
$conn->close();
?>