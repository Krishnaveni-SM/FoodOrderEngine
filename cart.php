<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <style>
        .logo img {
            width: 150px;
            height: auto;
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<?php
session_start();
$username = $_SESSION["username"];
?>

<body>
<header class="header">
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

<?php
$servername = "localhost";
$user = "root";
$password = "";
$database = "parkingfoodordersystem";

// Create connection
$conn = new mysqli($servername, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['foodname']) && isset($_POST['quantity']) && isset($_POST['id'])) {
        // Handle item removal based on ID
        if (isset($_POST['action']) && $_POST['action'] === "Remove") {
            $foodname = $_POST['foodname'];
            $quantity = $_POST['quantity'];
            $id = $_POST['id'];

            // Delete the item from the cart in the database
            $delete_query = "DELETE FROM addcart WHERE username = '$username' AND id = $id";

            if ($conn->query($delete_query)) {
                echo "Item removed from the cart successfully.";
            } else {
                echo "Error removing item from the cart: " . $conn->error;
            }
        }

        if (isset($_POST['action']) && $_POST['action'] === "RemoveAll") {
            // Remove all items from the cart
            $delete_query = "DELETE FROM addcart WHERE username = '$username'";

            if ($conn->query($delete_query)) {
                echo "All items removed from the cart.";
            } else {
                echo "Error removing items from the cart: " . $conn->error;
            }
        }

        if (isset($_POST['place_order'])) {
            // Retrieve user's address
            $query = "SELECT * FROM login WHERE username = '$username'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $delivery_address = $row['address'];
            } else {
                $delivery_address = "N/A"; // Handle the case where the address is not found
            }

            // Get the current date and time
            $delivery_date = date("Y-m-d H:i:s");

            // Calculate the total amount
            $total = 0;
            $query = "SELECT * FROM addcart WHERE username = '$username'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                $totalAmount = $row['quantity'] * $row['rate'];
                $total += $totalAmount;
            }

            // Insert order details into the placeorder table
            $insert_query = "INSERT INTO placeorder (address, delivery_date, total_amount, username) VALUES ('$delivery_address', '$delivery_date', '$total', '$username')";

            if ($conn->query($insert_query) === TRUE) {
                // Clear the cart here or perform any other necessary actions.
                $orderSuccessMessage = "Order placed successfully.";
            } else {
                $orderSuccessMessage = "Error placing order: " . $conn->error;

            }
        }
    }
}

// Retrieve items from the cart
$query = "SELECT * FROM addcart WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h2>Your Shopping Cart</h2>";
    echo "<form method='post'>"; // Open the form tag
    echo "<table>";
    echo "<tr>
        <th>ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Total Amount</th>
        <th>Action</th>
    </tr>";

    $total = 0;

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['foodname'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['rate'] . "</td>";
        $totalAmount = $row['quantity'] * $row['rate'];
        $total += $totalAmount;
        echo "<td>" . $totalAmount . "</td>";
        echo "<td>
            <input type='hidden' name='foodname' value='" . $row['foodname'] . "'>
            <input type='hidden' name='quantity' value='" . $row['quantity'] . "'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            <button>Remove</button>
        </td>";
        echo "</tr>";
    }

    echo "<tr>
        <th colspan='4'>TOTAL</th>
        <th class='total-amount'>" . $total . " OMR</th>
        <th></th>
    </tr>";

    echo "</table>";
    echo "<center><button type='submit' name='action' value='RemoveAll'>Remove All</button>";
    echo "<button type='submit' name='place_order'>Place Order</button></center>"; // Close the form tag
    echo "</form>";
} else {
    echo "<p>No items found in the cart.</p>";
}
?>

<script>
    // Display order success message
    const orderSuccessMessage = "<?php echo $orderSuccessMessage; ?>";
    if (orderSuccessMessage !== "") {
        alert(orderSuccessMessage);
    }
</script>

<div id="order-success-message" style="display: none;">
    Order placed successfully.
</div>

<div class="container">
    <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodlist.php">order now.</a></p>
    </div>
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
