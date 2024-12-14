<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodCourt</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/search.css">
</head>
<body>

<?php 
    session_start(); 
    $username = $_SESSION['username'];
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
        </ul>
    </nav>
</header>

<!-- Menu bar code section End -->
<section class="search-section">
    <div class="search-bar">
        <input type="text" placeholder="Search for restaurants, cuisines, or dishes">
        <button>Search</button>
    </div>
</section>

<section class="restaurant-list">
    <?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "parkingfoodordersystem";

    // Create connection
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT foodname, foodamount, foodimagelocation, ingredients FROM foods";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="restaurant">';
            echo '<img src="' . $row["foodimagelocation"] . '">';
            echo '<h3>' . $row["foodname"] . '</h3>';
            echo '<p>Ingredients: ' . $row["ingredients"] . '</p>';
            echo '<p>Price: ' . $row["foodamount"] . ' OMR</p>';
            echo '<form>';
            echo '<input type="hidden" name="foodname" value="' . $row["foodname"] . '">';
            echo '<input type="hidden" name="foodamount" value="' . $row["foodamount"] . '">';
            echo '<label for="quantity">Quantity:</label>';
            echo '<select name="quantity">';
            for ($i = 1; $i <= 10; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            echo '</select>';
            echo '<button class="add-to-cart-button" type="button" data-foodname="' . $row["foodname"] . '" data-foodamount="' . $row["foodamount"] . '">Add Cart</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No food items found.</p>';
    }

    $conn->close();
    ?>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addToCartButtons = document.querySelectorAll(".add-to-cart-button");

        addToCartButtons.forEach((button) => {
            button.addEventListener("click", function (event) {
                const foodname = event.target.getAttribute("data-foodname");
                const foodamount = event.target.getAttribute("data-foodamount");
                const quantity = event.target.parentNode.querySelector('select[name="quantity"]').value;

                const formData = new FormData();
                formData.append("foodname", foodname);
                formData.append("foodamount", foodamount);
                formData.append("quantity", quantity);

                fetch("update_cart.php", {
                    method: "POST",
                    body: formData
                })
                    .then((response) => response.text())
                    .then((message) => {
                        alert(message); // Display a message (you can customize this)
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
        });
    });
</script>
</body>
</html>