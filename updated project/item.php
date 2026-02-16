<?php
// Initialize variables
$vendorCode = "";
$selectedVendor = "";

// Allocate vendor code when form is submitted
if (isset($_POST['submit'])) {
    $selectedVendor = $_POST['vendor'];

    if ($selectedVendor == "Vendor A") {
        $vendorCode = "V001";
    } elseif ($selectedVendor == "Vendor B") {
        $vendorCode = "V002";
    } elseif ($selectedVendor == "Vendor C") {
        $vendorCode = "V003";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Item Module</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
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

/* ===== CONTAINER ===== */
.container {
    max-width: 900px;
    margin: 60px auto;
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
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

input, select, textarea {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

textarea {
    resize: vertical;
}

input:focus, select:focus, textarea:focus {
    border-color: #4facfe;
    outline: none;
    box-shadow: 0 0 6px rgba(79,172,254,0.5);
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

<!-- CONTENT -->
<div class="container">
    <h2>Item Details & Vendor Allocation</h2>

    <form method="POST">

        <label>Item Number</label>
        <input type="number" name="item_no" required>

        <label>Item Description</label>
        <textarea name="item_description" rows="4" required></textarea>

        <label>Number of Items</label>
        <input type="number" name="no_of_items" required>

        <label>Unit of Measure</label>
        <select name="unit_of_measure" required>
            <option value="">-- Select Unit --</option>
            <option value="kg">Kilogram</option>
            <option value="no">Number</option>
            <option value="litre">Litre</option>
        </select>

        <label>Allocate Vendor</label>
        <select name="vendor" required>
            <option value="">-- Select Vendor --</option>
            <option value="Vendor A" <?= ($selectedVendor=="Vendor A")?"selected":"" ?>>Vendor A</option>
            <option value="Vendor B" <?= ($selectedVendor=="Vendor B")?"selected":"" ?>>Vendor B</option>
            <option value="Vendor C" <?= ($selectedVendor=="Vendor C")?"selected":"" ?>>Vendor C</option>
        </select>

        <label>Vendor Code</label>
        <input type="text" value="<?php echo $vendorCode; ?>" readonly>

        <button type="submit" name="submit">Allocate Vendor</button>

    </form>
</div>

</body>
</html>
