<?php
include 'config.php';

if(isset($_POST['supplier_code'])){

$supplier_code = $_POST['supplier_code'];
$supplier_name = $_POST['supplier_name'];
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$addr3 = $_POST['addr3'];
$pincode = $_POST['pincode'];
$mobile = $_POST['mobile'];

$sql = "INSERT INTO suppliers
(supplier_code,supplier_name,addr1,addr2,addr3,pincode,mobile)
VALUES
('$supplier_code','$supplier_name','$addr1','$addr2','$addr3','$pincode','$mobile')";

if($conn->query($sql)==TRUE){

echo "<h2>Supplier Details Saved Successfully!</h2>";
echo "<a href='view_suppliers.php'>Go Back</a>";

}else{

echo "Database Error: " . $conn->error;

}

}else{

echo "Form not submitted properly.";

}

$conn->close();
?>