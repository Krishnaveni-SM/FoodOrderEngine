<?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "parkingfoodordersystem";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["emailid"];
    $phoneNumber = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Prepare and execute the SQL query to insert data
    $sql = "INSERT INTO login (fullname, username, emailid, contact, address, password) 
            VALUES ('$fullname', '$username', '$email', '$phoneNumber', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();
        
        // Redirect to login.php
        header("Location: login.php");
        exit(); // Important to exit after the header() redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
