<?php
include 'config.php';

if(isset($_POST['submit'])){

$item_no=$_POST['item_no'];
$item_description=$_POST['item_description'];
$no_of_items=$_POST['no_of_items'];
$price=$_POST['price'];
$unit_of_measure=$_POST['unit_of_measure'];
$vendor=$_POST['vendor'];

$vendor_code="";

if($vendor=="Vendor A"){
$vendor_code="V001";
}
elseif($vendor=="Vendor B"){
$vendor_code="V002";
}
elseif($vendor=="Vendor C"){
$vendor_code="V003";
}

$sql="INSERT INTO items
(item_no,item_description,no_of_items,price,unit_of_measure,vendor,vendor_code)
VALUES
('$item_no','$item_description','$no_of_items','$price','$unit_of_measure','$vendor','$vendor_code')";

if($conn->query($sql)==TRUE){

echo "<h2>Item Saved Successfully</h2>";
echo "<a href='item.php'>Go Back</a>";

}
else{

echo "Database Error: ".$conn->error;

}

}

$conn->close();
?>