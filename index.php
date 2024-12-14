<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodCourt</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/section.css">
</head>
<body>

<?php
    session_start();
    $username = $_SESSION["username"];
?>


<!-- Menu bar code section start -->
<header class="header">
    <style>
    .logo img {
    width: 150px; /* Adjust the width as needed */
    height: auto; /* Maintain the aspect ratio */
    display: inline-block; /* Make the logo inline with the text */
    margin-right: 10px; /* Add spacing between logo and text */
    }
    </style>
    <div class="logo">
        <img src="logo.jpg" alt="Logo">
    </div>
    <nav class="nav">
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="menucart.php">MenuCart</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a><li>
        </ul>
    </nav>
</header>

<!-- section End -->
    
    <section class="featured">
        <div class="featured-item">
            <img src="img/burger.jpg" alt="Food Item">
            <h2>Special Dish</h2>
            <p>Try our mouthwatering special dish. Made with love and care.</p>
        </div>
        
        <div class="featured-item">
            <img src="img/Pizza.jpg" alt="Food Item">
            <h2>Pizza</h2>
            <p>Indulge in our delightful pizza that will satisfy your sweet tooth.</p>
        </div>
        
        <div class="featured-item">
            <img src="img/healthfood.jpg" alt="Food Item">
            <h2>Healthy Options</h2>
            <p>Explore our range of healthy options that taste as good as they look.</p>
        </div>
    </section>
<!-- Section End -->

<section class="banner">
        <div class="banner-content">
            <h1>Welcome to Toastada!</h1>
            <p>Delicious and Fresh Food Delivered to Your Doorstep</p>
            <a href="menucart.php" class="btn">Explore Menu</a>
        </div>
    </section>

<footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">Toastada</div>
            <div class="footer-social">
                <a href="#"><img src="img/facebook.jpg" alt="Facebook"></a>
                <a href="#"><img src="img/twitter.jpg" alt="Twitter"></a>
                <a href="#"><img src="img/insta.jpg" alt="Instagram"></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Toastada. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
