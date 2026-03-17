<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Automobile Replacement System</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    scroll-behavior: smooth;
}

/* ===== NAVBAR ===== */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    background: #0f172a;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

.logo {
    color: #4facfe;
    font-size: 22px;
    font-weight: bold;
}

.nav-links a {
    color: white;
    text-decoration: none;
    margin-left: 25px;
    font-size: 15px;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #4facfe;
}

/* ===== HERO SECTION ===== */
.hero {
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url("https://images.unsplash.com/photo-1503376780353-7e6692767b70") 
                no-repeat center center/cover;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}

.hero-content h1 {
    font-size: 48px;
    margin-bottom: 15px;
}

.hero-content p {
    font-size: 18px;
    margin-bottom: 25px;
}

.btn {
    padding: 12px 25px;
    background: #4facfe;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.3s;
}

.btn:hover {
    background: #00c6ff;
}

/* ===== MODULE SECTION ===== */
.modules {
    padding: 80px 40px;
    background: #f8fafc;
    text-align: center;
}

.modules h2 {
    margin-bottom: 40px;
    font-size: 32px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.card h3 {
    margin-bottom: 10px;
    color: #4facfe;
}

/* ===== ABOUT SECTION ===== */
.about {
    padding: 80px 40px;
    background: #0f172a;
    color: white;
    text-align: center;
}

.about p {
    max-width: 800px;
    margin: auto;
    line-height: 1.6;
}

/* ===== FOOTER ===== */
footer {
    background: #111827;
    color: white;
    text-align: center;
    padding: 20px;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    .hero-content h1 {
        font-size: 32px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">AutoReplace</div>
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#modules">Modules</a>
        <a href="#about">About</a>
        <a href="login.html">Login</a>
    </div>
</div>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Automobile Replacement System</h1>
        <p>Efficient management of customers, items, suppliers, vendors and employees in one centralized platform.</p>
        <a href="#modules" class="btn">Explore Modules</a>
    </div>
</section>

<!-- MODULES -->
<!-- MODULES -->
<section class="modules" id="modules">
    <h2>System Modules</h2>

    <div class="card-container">

        <a href="userlogin1.php" style="text-decoration:none;">
            <div class="card">
                <h3>Customer Module</h3>
                <p>Manage customer details and maintain accurate service records.</p>
            </div>
        </a>

        <a href="item.php" style="text-decoration:none;">
            <div class="card">
                <h3>Item & Vendor Module</h3>
                <p>Allocate vendors to items and manage spare part information.</p>
            </div>
        </a>

        <a href="supplier.php" style="text-decoration:none;">
            <div class="card">
                <h3>Supplier Module</h3>
                <p>Store supplier details and maintain vendor communication records.</p>
            </div>
        </a>

        <a href="employee.php" style="text-decoration:none;">
            <div class="card">
                <h3>Employee Module</h3>
                <p>Manage employee details including technical and non-technical staff.</p>
            </div>
        </a>
	
	<a href="transaction.php" style="text-decoration:none;">
    	    <div class="card">
        	<h3>Transaction Module</h3>
        	<p>Manage mirror replacement transactions, billing, and service details 		efficiently.</p>
    	    </div>
	</a>

    </div>
</section>


<!-- ABOUT -->
<section class="about" id="about">
    <h2>About the System</h2>
    <br>
    <p>
        The Automobile Replacement System is a web-based application designed 
        to simplify and automate the management of automobile spare parts, 
        vendor allocation, suppliers, employees, and customers. 
        It reduces manual record keeping and improves operational efficiency.
    </p>
</section>

<!-- FOOTER -->
<footer>
    © Automobile Replacement System 
</footer>

</body>
</html>
