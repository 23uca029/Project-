<?php
include 'config.php';

$edit=false;
$add=false;

if(isset($_GET['edit'])){
    $edit=true;
    $id=$_GET['edit'];

    $sql="SELECT * FROM customers WHERE id=$id";
    $result=$conn->query($sql);
    $editRow=$result->fetch_assoc();
}

if(isset($_GET['add'])){
    $add=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Customers</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:Arial;
background:#eef2f7;
}

/* NAVBAR */

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

.nav-links a:hover{
color:#4facfe;
}

/* TABLE CONTAINER */

.container{
max-width:1100px;
margin:60px auto;
background:white;
padding:40px;
border-radius:12px;
box-shadow:0 15px 35px rgba(0,0,0,0.1);
}

.container h2{
text-align:center;
margin-bottom:30px;
color:#4facfe;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}

th{
background:#4facfe;
color:white;
}

tr:hover{
background:#f5f5f5;
}

button{
padding:6px 12px;
border:none;
background:#4facfe;
color:white;
border-radius:6px;
cursor:pointer;
}

button:hover{
background:#00c6ff;
}

.edit-form{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px 30px;
margin-top:20px;
}

.edit-form input{
padding:10px;
border:1px solid #ccc;
border-radius:6px;
width:100%;
}

.edit-form button{
grid-column:span 2;
padding:12px;
background:#4facfe;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
}

.edit-form button:hover{
background:#00c6ff;
}

@media(max-width:768px){
.edit-form{
grid-template-columns:1fr;
}
}

</style>
</head>

<body>

<div class="navbar">
<div class="logo">AutoReplace</div>

<div class="nav-links">
<a href="home.php">Home</a>
<a href="userlogin1.php">Customer</a>
<a href="view_customers.php">View Customers</a>
<a href="item.php">Item</a>
<a href="supplier.php">Supplier</a>
<a href="employee.php">Employee</a>
</div>
</div>

<div class="container">

<h2>Customer List</h2>
<a href="view_customers.php?add=1">
<button style="margin-bottom:20px;">New Customer</button>
</a>

<table>

<tr>
<th>ID</th>
<th>Customer ID</th>
<th>Name</th>
<th>Address</th>
<th>Pincode</th>
<th>Mobile</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

$sql="SELECT * FROM customers";
$result=$conn->query($sql);

if($result->num_rows>0){

while($row=$result->fetch_assoc()){

?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['custId']; ?></td>
<td><?php echo $row['custName']; ?></td>
<td><?php echo $row['addr1']." ".$row['addr2']." ".$row['addr3']; ?></td>
<td><?php echo $row['pincode']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
<a href="view_customers.php?edit=<?php echo $row['id']; ?>">
<button>Edit</button>
</a>
</td>

</tr>

<?php
}

}else{

echo "<tr><td colspan='8'>No Customers Found</td></tr>";

}
?>

</table>

</div>


<?php if($edit==true){ ?>

<div class="container">

<h2>Edit Customer</h2>

<form action="update_customer.php" method="POST" class="edit-form">

<input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">

<div>
<label>Customer ID</label>
<input type="number" name="custId" value="<?php echo $editRow['custId']; ?>" readonly>
</div>

<div>
<label>Customer Name</label>
<input type="text" name="custName" value="<?php echo $editRow['custName']; ?>">
</div>

<div>
<label>Address Line 1</label>
<input type="text" name="addr1" value="<?php echo $editRow['addr1']; ?>">
</div>

<div>
<label>Address Line 2</label>
<input type="text" name="addr2" value="<?php echo $editRow['addr2']; ?>">
</div>

<div>
<label>Address Line 3</label>
<input type="text" name="addr3" value="<?php echo $editRow['addr3']; ?>">
</div>

<div>
<label>Pincode</label>
<input type="number" name="pincode" value="<?php echo $editRow['pincode']; ?>">
</div>

<div>
<label>Mobile</label>
<input type="text" name="mobile" value="<?php echo $editRow['mobile']; ?>">
</div>

<div>
<label>Email</label>
<input type="email" name="email" value="<?php echo $editRow['email']; ?>">
</div>

<button type="submit">Update Customer</button>

</form>

</div>
<?php } ?>

<?php if($add==true){ ?>

<div class="container">

<h2>Add New Customer</h2>

<form action="save_customer.php" method="POST" class="edit-form">

<div>
<label>Customer ID</label>
<input type="number" name="custId" required>
</div>

<div>
<label>Customer Name</label>
<input type="text" name="custName" required>
</div>

<div>
<label>Address Line 1</label>
<input type="text" name="addr1" required>
</div>

<div>
<label>Address Line 2</label>
<input type="text" name="addr2" required>
</div>

<div>
<label>Address Line 3</label>
<input type="text" name="addr3" required>
</div>

<div>
<label>Pincode</label>
<input type="number" name="pincode" required>
</div>

<div>
<label>Mobile</label>
<input type="text" name="mobile" required>
</div>

<div>
<label>Email</label>
<input type="email" name="email" required>
</div>

<button type="submit" name="submit">Save Customer</button>

</form>

</div>

<?php } ?>

</body>
</html>