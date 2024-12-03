<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli(hostname: "sql210.infinityfree.com", username: "if0_37821724", password: "9wPQoxqYjTW", database: "if0_37821724_crud_milkteahouse");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query(query: $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea Avenue - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('1milk-tea-background.jpg'); /* Background image set here */
            background-size: cover; /* Stretch the background image */
            background-position: center;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Navigation Styles */
        nav {
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav h1 {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
            color: #444;
        }

        nav a {
            text-decoration: none;
            color: #444;
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #888;
        }

        .home-btn {
            padding: 8px 15px;
            border-radius: 20px;
            background-color: #e0e0e0;
            color: #333;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s;
        }

        .home-btn:hover {
            background-color: #d0d0d0;
        }

        /* Welcome Section */
        .welcome-section {
            text-align: center;
            padding: 220px 20px;
            background-image: url('milk-tea-background.jpg'); /* Background image set here */
            background-size: cover;
            background-position: center;
            color: white;
            animation: fadeIn 2s ease-in-out;
        }

        .welcome-section h2 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: slideUp 1.5s ease-out;
        }

        .welcome-section p {
            font-size: 1.5rem;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            animation: slideUp 1.5s ease-out 0.5s;
        }

        .cta-btn {
            display: inline-block;
            padding: 15px 30px;
            margin-top: 20px;
            background-color: #ffbf69;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .cta-btn:hover {
            background-color: #ff9f42;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        footer {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        footer .social-links {
            margin-top: 10px;
        }

        footer .social-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.2rem;
        }

        footer .social-links a:hover {
            color: #ffbf69;
        }

        /* About Us Section */
        .about-us {
            padding: 50px 20px;
            background-color: #d3d3d3; /* Light grey background color */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
        }

        .about-us .content {
            max-width: 600px;
            margin-right: 20px;
        }

        .about-us h2 {
            font-size: 2rem;
            color: #444;
            margin-bottom: 20px;
        }

        .about-us p {
            font-size: 1rem;
            color: #666;
        }

        .about-us img {
            max-width: 200px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <h1>Tea Avenue</h1>
        <div>
            <a href="index.php" class="home-btn">Home</a>
            <a href="menu.php">Menu</a>
            <a href="cart.php">Cart</a>
            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
                <a href="logout.php" class="ms-3">Hello, <?php echo htmlspecialchars(string: $_SESSION['username']); ?></a>
            <?php else: ?>
                <a href="login.php" class="ms-3">Login</a> / <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <h2>Welcome to Tea Avenue</h2>
        <p>Enjoy the best milk tea made with passion and quality ingredients!</p>
        <a href="menu.php" class="cta-btn">Explore Our Menu</a>
    </section>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="content">
            <h2>About Us</h2>
            <p>At Tea Avenue Milk Tea House, we pride ourselves in providing the finest quality tea and the best customer service. Our goal is to bring you the taste of perfection in every sip. Our wide selection of flavors and toppings ensures that there’s something for everyone!</p>
        </div>
        <img src="tea av.jpg" alt="About Tea Avenue">
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Tea Avenue Milk Tea House. All rights reserved.</p>
        <div class="social-links">
            <a href="https://www.facebook.com/tamingmarkfrancis" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i> Facebook
            </a>
            <a href="https://www.instagram.com/tamingmarkfrancis/" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="https://www.gmail.com/markfrancis.cullamat@hcdc.edu.ph" target="_blank" aria-label="Email">
            <i class="fas fa-envelope"></i> Email
            </a>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
