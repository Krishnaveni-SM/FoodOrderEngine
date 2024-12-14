<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Not logged in.";
    exit;
}

$username = $_SESSION['username'];

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "parkingfoodordersystem";

$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['foodname']) && isset($_POST['foodamount']) && isset($_POST['quantity'])) {
    $foodname = $_POST['foodname'];
    $foodamount = $_POST['foodamount'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `addcart`(`username`, `foodname`, `quantity`, `rate`) 
            VALUES ('$username', '$foodname', $quantity, '$foodamount')";
    
    if ($conn->query($sql)) {
        echo "Item added to the cart successfully."; // Send a success message
    } else {
        echo "Error: " . $conn->error; // Handle errors
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
