<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Handle user not being logged in, e.g., redirect to a login page
    header("Location: login.php");
    exit;
}

if (isset($_POST['add_to_cart'])) {
    $foodname = $_POST['foodname'];
    $foodamount = $_POST['foodamount'];
    $quantity = $_POST['quantity'];

    // Connect to your database (same code as in menucart.php)

    // For example, insert data into the addcart table
    $sql = "INSERT INTO addcart (username, foodname, quantity, rate) VALUES ('$username', '$foodname', $quantity, '$foodamount')";
    $conn->query($sql);

    // Redirect back to the menu page to avoid form resubmission
    header("Location: menucart.php");
    exit;
} else {
    // Handle the case where the form wasn't submitted properly
    echo "Form submission error.";
}
?>
