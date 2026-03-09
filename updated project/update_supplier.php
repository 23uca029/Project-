<?php
include 'config.php';

$id=$_POST['id'];

$supplier_code=$_POST['supplier_code'];
$supplier_name=$_POST['supplier_name'];
$addr1=$_POST['addr1'];
$addr2=$_POST['addr2'];
$addr3=$_POST['addr3'];
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];

$sql="UPDATE suppliers SET
supplier_name='$supplier_name',
addr1='$addr1',
addr2='$addr2',
addr3='$addr3',
pincode='$pincode',
mobile='$mobile'
WHERE id=$id";

$conn->query($sql);

header("Location:view_suppliers.php");
?>