<?php
include 'config.php';

$edit=false;
$add=false;

if(isset($_GET['edit'])){
    $edit=true;
    $id=$_GET['edit'];

    $sql="SELECT * FROM suppliers WHERE id=$id";
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
<title>View Suppliers</title>

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
<a href="view_suppliers.php">View Suppliers</a>
<a href="view_employees.php">Employee</a>
</div>

</div>


<div class="container">

<h2>Supplier List</h2>

<a href="view_suppliers.php?add=1">
<button style="margin-bottom:20px;">New Supplier</button>
</a>

<table>

<tr>
<th>ID</th>
<th>Supplier Code</th>
<th>Name</th>
<th>Address</th>
<th>Pincode</th>
<th>Mobile</th>
<th>Action</th>
</tr>

<?php

$sql="SELECT * FROM suppliers";
$result=$conn->query($sql);

if($result->num_rows>0){

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['supplier_code']; ?></td>
<td><?php echo $row['supplier_name']; ?></td>
<td><?php echo $row['addr1']." ".$row['addr2']." ".$row['addr3']; ?></td>
<td><?php echo $row['pincode']; ?></td>
<td><?php echo $row['mobile']; ?></td>

<td>
<a href="view_suppliers.php?edit=<?php echo $row['id']; ?>">
<button>Edit</button>
</a>
</td>

</tr>

<?php
}

}else{

echo "<tr><td colspan='7'>No Suppliers Found</td></tr>";

}

?>

</table>

</div>


<?php if($edit){ ?>

<div class="container">

<h2>Edit Supplier</h2>

<form action="update_supplier.php" method="POST" class="edit-form">

<input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">

<div>
<label>Supplier Code</label>
<input type="number" name="supplier_code" value="<?php echo $editRow['supplier_code']; ?>" readonly>
</div>

<div>
<label>Supplier Name</label>
<input type="text" name="supplier_name" value="<?php echo $editRow['supplier_name']; ?>">
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

<button type="submit">Update Supplier</button>

</form>

</div>

<?php } ?>


<?php if($add){ ?>

<div class="container">

<h2>Add New Supplier</h2>

<form action="save_supplier.php" method="POST" class="edit-form">

<div>
<label>Supplier Code</label>
<input type="number" name="supplier_code" required>
</div>

<div>
<label>Supplier Name</label>
<input type="text" name="supplier_name" required>
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

<button type="submit">Save Supplier</button>

</form>

</div>

<?php } ?>

</body>
</html>