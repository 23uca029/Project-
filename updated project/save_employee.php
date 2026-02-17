<?php
include 'config.php';

if (isset($_POST['submit'])) {

    $empId   = $_POST['empId'];
    $empName = $_POST['empName'];
    $addr1   = $_POST['addr1'];
    $addr2   = $_POST['addr2'];
    $addr3   = $_POST['addr3'];
    $pincode = $_POST['pincode'];
    $mobile  = $_POST['mobile'];
    $empType = $_POST['empType'];

    $sql = "INSERT INTO employees
            (empId, empName, addr1, addr2, addr3, pincode, mobile, empType)
            VALUES
            ('$empId', '$empName', '$addr1', '$addr2', '$addr3', '$pincode', '$mobile', '$empType')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Employee Details Saved Successfully!</h2>";
        echo "<a href='employee.php'>Go Back</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
