<?php
include 'config.php';


$job_id = $_POST['job_id'];
$custId = $_POST['custId'];
$job_date = $_POST['job_date'];
$car_number = $_POST['car_number'];
$technician_allocated = $_POST['technician_allocated'];
$car_model = $_POST['car_model'];
$completion_date = $_POST['completion_date'];


$itemno = $_POST['item_no'];
$itemdescription = $_POST['itemdescription'];
$quantityused = $_POST['quantityused'];
$pri = $_POST['pri'];
$amt = $_POST['amt'];
$jobid = $_POST['jobid'];


$check = "SELECT * FROM transactions WHERE job_id='$job_id'";
$result = $conn->query($check);

if($result->num_rows > 0){

$sql = "UPDATE transactions SET
custId='$custId',
job_date='$job_date',
car_number='$car_number',
technician_allocated='$technician_allocated',
car_model='$car_model',
completion_date='$completion_date'
WHERE job_id='$job_id'";

}else{

$sql = "INSERT INTO transactions
(job_id,custId,job_date,car_number,technician_allocated,car_model,completion_date)
VALUES
('$job_id','$custId','$job_date','$car_number','$technician_allocated','$car_model','$completion_date')";
}





$sql2="INSERT INTO transaction_details
(job_id,item_no,item_description,quantity_used,price,amount)
VALUES(10002,10001,'Left side mirror',1,900,900)";
$conn->query($sql);
$conn->query($sql2);





header("Location: transaction.php");
?>