<?php
include 'config.php';

$edit=false;
$add=false;

if(isset($_GET['edit'])){
    $edit=true;
    $id=$_GET['edit'];

    $sql="SELECT * FROM employees WHERE id=$id";
    $result=$conn->query($sql);
    $editRow=$result->fetch_assoc();
}

if(isset($_GET['add'])){
    $add=true;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>View Employees</title>

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

/* CONTAINER */

.container{
max-width:1100px;
margin:60px auto;
background:white;
padding:40px;
border-radius:12px;
box-shadow:0 15px 35px rgba(0,0,0,0.1);
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

/* BUTTON */

button{
padding:6px 12px;
border:none;
background:#4facfe;
color:white;
border-radius:6px;
cursor:pointer;
}

/* FORM GRID */

.edit-form{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px 30px;
margin-top:20px;
}

.edit-form input,
.edit-form select{
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
<a href="view_employees.php">View Employees</a>
</div>

</div>


<div class="container">

<h2>Employee List</h2>

<a href="view_employees.php?add=1">
<button style="margin-bottom:20px;">New Employee</button>
</a>

<table>

<tr>
<th>ID</th>
<th>Employee ID</th>
<th>Name</th>
<th>Address</th>
<th>Pincode</th>
<th>Mobile</th>
<th>Type</th>
<th>Action</th>
</tr>

<?php

$sql="SELECT * FROM employees";
$result=$conn->query($sql);

if($result->num_rows>0){

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['empId']; ?></td>
<td><?php echo $row['empName']; ?></td>
<td><?php echo $row['addr1']." ".$row['addr2']." ".$row['addr3']; ?></td>
<td><?php echo $row['pincode']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['empType']; ?></td>

<td>
<a href="view_employees.php?edit=<?php echo $row['id']; ?>">
<button>Edit</button>
</a>
</td>

</tr>

<?php
}

}else{

echo "<tr><td colspan='8'>No Employees Found</td></tr>";

}

?>

</table>

</div>


<?php if($edit==true){ ?>

<div class="container">

<h2>Edit Employee</h2>

<form action="update_employee.php" method="POST" class="edit-form">

<input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">

<div>
<label>Employee ID</label>
<input type="number" name="empId" value="<?php echo $editRow['empId']; ?>" readonly>
</div>

<div>
<label>Employee Name</label>
<input type="text" name="empName" value="<?php echo $editRow['empName']; ?>">
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
<label>Employee Type</label>

<select name="empType">

<option <?php if($editRow['empType']=="Technical") echo "selected"; ?>>Technical</option>

<option <?php if($editRow['empType']=="Non Technical") echo "selected"; ?>>Non Technical</option>

</select>

</div>

<button type="submit">Update Employee</button>

</form>

</div>

<?php } ?>


<?php if($add==true){ ?>

<div class="container">

<h2>Add New Employee</h2>

<form action="save_employee.php" method="POST" class="edit-form">

<div>
<label>Employee ID</label>
<input type="number" name="empId" required>
</div>

<div>
<label>Employee Name</label>
<input type="text" name="empName" required>
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
<label>Employee Type</label>

<select name="empType">

<option value="Technical">Technical</option>
<option value="Non Technical">Non Technical</option>

</select>

</div>

<button type="submit">Save Employee</button>

</form>

</div>

<?php } ?>

</body>
</html>