<?php
include 'config.php';

if(isset($_POST['id'])){

$id = $_POST['id'];

$empId   = $_POST['empId'];
$empName = $_POST['empName'];
$addr1   = $_POST['addr1'];
$addr2   = $_POST['addr2'];
$addr3   = $_POST['addr3'];
$pincode = $_POST['pincode'];
$mobile  = $_POST['mobile'];
$empType = $_POST['empType'];

$sql = "UPDATE employees SET
empId='$empId',
empName='$empName',
addr1='$addr1',
addr2='$addr2',
addr3='$addr3',
pincode='$pincode',
mobile='$mobile',
empType='$empType'
WHERE id=$id";

if($conn->query($sql)==TRUE){

header("Location: view_employees.php");
exit();

}else{

echo "Error updating employee: ".$conn->error;

}

}

$conn->close();
?>