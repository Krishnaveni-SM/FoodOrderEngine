<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
  .message {
    color: green;
    font-size: 24px;
  }
</style>
</head>
<body>
<?php

session_start();
$_SESSION['username'] = $_POST['username'];

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

// Data to check
$username = $_POST["username"];
$password = $_POST["password"];


if ($username === "admin" && $password === "Toastada") {
  header("Location: admin.php"); 
}

// Prepare the query
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Data exists in the database
        // Redirect to the index page
    header("Location: index.php"); // Replace with the actual index page URL
    exit(); // Ensure the script stops executing after the redirect
} else {
    // Data does not exist in the database
    echo "<div class='message'>Login failed</div>";
}

// Close the connection
$conn->close();
?>
</body>
</html>
