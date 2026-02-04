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
    <title>Item Allocation</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .main-title {
            font-size: 32px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }

        .login-container {
            background: #ffffff;
            padding: 30px 35px;
            width: 100%;
            max-width: 600px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 20px;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #444;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        textarea {
            resize: vertical;
        }

        button {
            grid-column: span 2;
            padding: 12px;
            background: #4facfe;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #00c6ff;
        }

        @media (max-width: 600px) {
            form { grid-template-columns: 1fr; }
            button { grid-column: span 1; }
        }
    </style>
</head>

<body>

<h1 class="main-title">Automobile Replacement System</h1>

<div class="login-container">
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
        <input type="text" name="vendor_code" value="<?php echo $vendorCode; ?>" readonly>

        <button type="submit" name="submit">Allocate Vendor</button>

    </form>
</div>

</body>
</html>
