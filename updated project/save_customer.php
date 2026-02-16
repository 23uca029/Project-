<?php
include 'config.php';

if (isset($_POST['submit'])) {

    $custId   = $_POST['custId'];
    $custName = $_POST['custName'];
    $addr1    = $_POST['addr1'];
    $addr2    = $_POST['addr2'];
    $addr3    = $_POST['addr3'];
    $pincode  = $_POST['pincode'];
    $mobile   = $_POST['mobile'];
    $email    = $_POST['email'];

    $sql = "INSERT INTO customers 
            (custId, custName, addr1, addr2, addr3, pincode, mobile, email)
            VALUES 
            ('$custId', '$custName', '$addr1', '$addr2', '$addr3', '$pincode', '$mobile', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Customer Details Saved Successfully!</h2>";
        echo "<a href='userlogin1.php'>Go Back</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
