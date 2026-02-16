<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Supplier Module</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f1f5f9;
}

/* ===== NAVBAR ===== */
.navbar {
    background: #0f172a;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    color: #4facfe;
    font-size: 20px;
    font-weight: bold;
}

.nav-links a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #4facfe;
}

/* ===== HEADER ===== */
.page-header {
    text-align: center;
    padding: 30px 20px;
}

.page-header h1 {
    font-size: 32px;
    color: #0f172a;
}

/* ===== CONTAINER ===== */
.container {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    margin-bottom: 50px;
}

.container h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #4facfe;
}

/* ===== FORM ===== */
form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px 30px;
}

label {
    font-weight: bold;
    font-size: 14px;
}

input {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

input:focus {
    border-color: #4facfe;
    box-shadow: 0 0 6px rgba(79,172,254,0.5);
    outline: none;
}

.full-width {
    grid-column: span 2;
}

button {
    grid-column: span 2;
    padding: 14px;
    background: #4facfe;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #00c6ff;
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    form {
        grid-template-columns: 1fr;
    }

    .full-width,
    button {
        grid-column: span 1;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">AutoReplace</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="userlogin1.php">Customer</a>
        <a href="item.php">Item</a>
        <a href="supplier.php">Supplier</a>
        <a href="employee.php">Employee</a>
    </div>
</div>

<!-- HEADER -->
<div class="page-header">
    
</div>

<!-- FORM -->
<div class="container">
    <h2>Supplier Details</h2>

    <form action="save_supplier.php" method="POST">

        <label>Supplier Code</label>
        <input type="number" name="supplier_code" placeholder="Enter Supplier Code" required>

        <label>Supplier Name</label>
        <input type="text" name="supplier_name" placeholder="Enter Supplier Name" required>

        <label>Address Line 1</label>
        <input type="text" name="addr1" placeholder="Enter Street Name" required>

        <label>Address Line 2</label>
        <input type="text" name="addr2" placeholder="Enter Area Name" required>

        <label>Address Line 3</label>
        <input type="text" name="addr3" placeholder="Enter City Name" required>

        <label>Pincode</label>
        <input type="number" name="pincode" placeholder="Enter Pincode" required>

        <label>Mobile Number</label>
        <input type="number" name="mobile" placeholder="Enter Mobile Number" required>

        <button type="submit" name="submit">Submit</button>

    </form>
</div>

</body>
</html>
