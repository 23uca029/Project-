<?php
include 'config.php';

$job_id="";
$custId="";
$job_date="";
$car_number="";
$technician_allocated="";
$car_model="";
$completion_date="";

if(isset($_POST['retrieve'])){

$job_id=$_POST['job_id'];

$sql="SELECT * FROM transactions WHERE job_id='$job_id'";
$result=$conn->query($sql);

if($result->num_rows>0){

$row=$result->fetch_assoc();

$custId=$row['custId'];
$job_date=$row['job_date'];
$car_number=$row['car_number'];
$technician_allocated=$row['technician_allocated'];
$car_model=$row['car_model'];
$completion_date=$row['completion_date'];

}else{
echo "<script>alert('Job ID not found');</script>";
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Transaction Page</title>

<style>

body{
font-family:Arial;
background:#eef2f7;
margin:0;
}

.navbar{
background:#0f172a;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
color:#4facfe;
font-size:20px;
font-weight:bold;
}

.nav-links a{
color:white;
text-decoration:none;
margin-left:20px;
}

.container{
max-width:1200px;
margin:25px auto;
background:white;
padding:25px 30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.header-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.top-buttons{
display:flex;
gap:10px;
}

.top-buttons button{
padding:8px 18px;
border:none;
background:#4facfe;
color:white;
border-radius:6px;
cursor:pointer;
}

.top-buttons button:hover{
background:#00c6ff;
}

form{
display:grid;
grid-template-columns:1fr 1fr 1fr;
gap:12px 18px;
}

input,select{
padding:8px;
border:1px solid #ccc;
border-radius:6px;
width:100%;
}

</style>
</head>

<body>

<div class="navbar">

<div class="logo">AutoReplace</div>

<div class="nav-links">
<a href="home.php">Home</a>
<a href="view_customers.php">Customers</a>
<a href="view_suppliers.php">Suppliers</a>
<a href="view_employees.php">Employees</a>
<a href="transaction.php">Transaction</a>
</div>

</div>

<div class="container">

<div class="header-bar">

<h2>Mirror Replacement Transaction</h2>

<div class="top-buttons">

<button type="submit" form="transactionForm" formaction="save_transaction.php">Save</button>

<button type="submit" form="transactionForm" name="retrieve">Retrieve</button>

<button type="reset" form="transactionForm">Clear</button>

</div>

</div>

<form id="transactionForm" action="transaction.php" method="POST">

<div>
<label>Job ID</label>
<input type="number" name="job_id" value="<?php echo $job_id; ?>">
</div>

<div>
<label>Customer ID</label>

<select name="custId">

<option value="">Select Customer ID</option>

<?php
$sql="SELECT custId,custName FROM customers";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

$selected = ($custId==$row['custId']) ? "selected" : "";

echo "<option value='".$row['custId']."' $selected>".$row['custId']." - ".$row['custName']."</option>";

}
?>

</select>

</div>

<div>
<label>Job Date</label>
<input type="date" name="job_date" value="<?php echo $job_date; ?>">
</div>

<div>
<label>Car Number</label>
<input type="text" name="car_number" value="<?php echo $car_number; ?>">
</div>

<div>
<label>Technician Allocated</label>

<select name="technician_allocated">

<?php
$sql="SELECT * FROM employees WHERE empType='Non Technical'";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

$selected = ($technician_allocated==$row['empName']) ? "selected" : "";

echo "<option $selected>".$row['empName']."</option>";

}
?>

</select>

</div>

<div>
<label>Car Model</label>
<input type="text" name="car_model" value="<?php echo $car_model; ?>">
</div>

<div>
<label>Completion Date</label>
<input type="date" name="completion_date" value="<?php echo $completion_date; ?>">
</div>



</div>

<div class="container">

<h2>Transaction Details</h2>


<table id="itemTable" width="100%" border="1" style="border-collapse:collapse;text-align:center">

<tr style="background:#4facfe;color:white">
<th>Job ID</th>
<th>Item No</th>
<th>Item Description</th>
<th>Quantity Used</th>
<th>Price</th>
<th>Amount</th>
</tr>

</table>

<br>

<button type="button" onclick="addRow()">Add Item</button>
<br><br>

<h3>Total Bill: ₹ <span id="totalBill">0</span></h3>

</div>
<script>

function addRow(){

var table=document.getElementById("itemTable");

var row=table.insertRow(-1);

var jobId = document.querySelector("input[name='job_id']").value;

row.innerHTML = `
<td><input type="number" name="jobid" value="${jobId}" readonly></td>
<td><input type="number" name="itemno" onblur="fetchItem(this)"></td>
<td><input type="text" name="itemdescription" readonly></td>
<td><input type="number" name="quantityused" oninput="calculate(this)"></td>
<td><input type="number" name="pri" readonly></td>
<td><input type="number" name="amt" readonly></td>
`;
}

function calculate(element){

var row = element.parentElement.parentElement;

var qty = row.cells[3].children[0].value;
var price = row.cells[4].children[0].value;

var amount = qty * price;

row.cells[5].children[0].value = amount;

}
</script>
<script>

function fetchItem(element){

var itemNo = element.value;
var row = element.parentElement.parentElement;

var xhr = new XMLHttpRequest();

xhr.open("GET","get_item.php?item_no="+itemNo,true);

xhr.onload = function(){

if(this.status==200){

var data = JSON.parse(this.responseText);

if(data){

row.cells[2].children[0].value = data.item_description;
row.cells[4].children[0].value = data.price;

}	

}

};

xhr.send();

}

function calculate(element){

var row = element.parentElement.parentElement;

var qty = row.cells[3].children[0].value;
var price = row.cells[4].children[0].value;

var amount = qty * price;

row.cells[5].children[0].value = amount;

calculateTotal();

}
function calculateTotal(){

var table = document.getElementById("itemTable");

var total = 0;

for(var i=1;i<table.rows.length;i++){

var amount = table.rows[i].cells[5].children[0].value;

if(amount != "")
total += parseFloat(amount);

}

document.getElementById("totalBill").innerText = total;

}
</script>
</form>
</body>
</html>