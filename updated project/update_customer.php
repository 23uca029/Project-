<?php
include 'config.php';

$id=$_POST['id'];
$custId=$_POST['custId'];
$custName=$_POST['custName'];
$addr1=$_POST['addr1'];
$addr2=$_POST['addr2'];
$addr3=$_POST['addr3'];
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];

$sql="UPDATE customers SET
custId='$custId',
custName='$custName',
addr1='$addr1',
addr2='$addr2',
addr3='$addr3',
pincode='$pincode',
mobile='$mobile',
email='$email'
WHERE id=$id";

$conn->query($sql);

header("Location:view_customers.php");
?>