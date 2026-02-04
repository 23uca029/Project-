<?php
// Check if form is submitted
if(isset($_POST['submit'])){

    // Collect form data
    $custId   = $_POST['custId'];
    $custName = $_POST['custName'];
    $addr1    = $_POST['addr1'];
    $addr2    = $_POST['addr2'];
    $addr3    = $_POST['addr3'];
    $pincode  = $_POST['pincode'];
    $mobile   = $_POST['mobile'];
    $email    = $_POST['email'];

    // File name (unique per customer)
    $filename = "customer_" . $custId . ".txt";

    // Data to write
     $line = $custId . "," .
            $custName . "," .
            $addr1 . "," .
            $addr2 . "," .
            $addr3 . "," .
            $pincode . "," .
            $mobile . "," .
            $email . ".".PHP_EOL;

    // Create and write to file
    file_put_contents($filename, $line);

    // Success message
    echo "<h2>Customer details saved successfully!</h2>";
    echo "<p>File created: <b>$filename</b></p>";
    echo "<a href='userlogin1.php'>Go Back</a>";
}
?>
