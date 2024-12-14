<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FoodCourt</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
</head>
<?php 
    session_start(); 
    $username = $_SESSION['username'];
?>
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
<!-- Menu bar code section End -->

<?php
// Your database connection parameters
$servername = "localhost";
$user = "root";
$password = "";
$database = "parkingfoodordersystem";

// Create a connection
$conn = new mysqli($servername, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['remove_order'])) {
    $order_id = $_POST['order_id'];
    // Query to remove the order from the placeorder table
    $delete_query = "DELETE FROM placeorder WHERE username = '$username' AND id = $order_id";
    
    if ($conn->query($delete_query)) {
        $statusMessage = "Order removed successfully.";
    } else {
        $statusMessage = "Error removing order: " . $conn->error;
    }
}

// Query to retrieve data from the placeorder table
$query = "SELECT * FROM placeorder WHERE username = '$username'";
$result = $conn->query($query);

// Display retrieved data
if ($result->num_rows > 0) {
    echo "<h2>Place Order Data</h2>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Address</th>
            <th>Delivery Date</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["delivery_date"] . "</td>";
        echo "<td>" . $row["total_amount"] . "OMR</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='order_id' value='" . $row["id"] . "'>
                    <button type='submit' name='remove_order' value='Remove Order'>Cancel Order</button>
                </form>
              </td>";
        echo "</tr>";
        echo "<tr>
            <td colspan='5'><a href='payment.php?total_amount=" . $row["total_amount"] . "'>Proceed to Payment</a></td>
          </tr>";
    }

    echo "</table>";
    
    if (isset($statusMessage)) {
        echo "<p id='statusMessage'>$statusMessage</p>";
    }
} else {
    echo "<p>No data found in the placeorder table.</p>";
}

$conn->close();
?>

<script>
// JavaScript to remove the status message after a few seconds
setTimeout(function() {
    var statusMessage = document.getElementById('statusMessage');
    if (statusMessage) {
        statusMessage.style.display = 'none';
    }
}, 3000); // Adjust the timeout (in milliseconds) as needed
</script>

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
