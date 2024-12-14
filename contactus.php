<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodCourt</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/contactus.css">
</head>
<body>

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
        </ul>
    </nav>
</header>

        <! Menu bar code section End >

    <div class="container">
        <h1>Contact Information</h1>
        <p>We'd love to hear from you! If you have any questions, comments, or feedback, please don't hesitate to get in touch.</p>
        
        <h2>Email</h2>
        <p>Email: <a href="mailto:info@foodzone.com">info@foodzone.com</a></p>

        <h2>Phone</h2>
        <p>Phone: +1 (123) 456-7890</p>

        <h2>Visit Us</h2>
        <p>123 Main Street<br>City, State ZIP Code</p>

        <h2>Send us a Message</h2>
        <form action="contactus_submit.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

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