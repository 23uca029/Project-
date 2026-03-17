<?php
include 'config.php';

if(isset($_GET['item_no'])){

$item_no=$_GET['item_no'];

$sql="SELECT item_description,price FROM items WHERE item_no='$item_no'";
$result=$conn->query($sql);

if($result->num_rows>0){

$row=$result->fetch_assoc();

echo json_encode($row);

}else{

echo json_encode(array());

}

}
?>