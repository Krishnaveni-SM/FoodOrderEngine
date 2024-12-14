<html>
    <head> <title> feedback </title></head>
    <link rel="stylesheet" type = "text/css" href ="styles/feedback.css">
    <body>

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
            $fullname = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            // Prepare and execute the SQL query to insert data
            $sql = "INSERT INTO feedback (name, email, message) 
                    VALUES ('$fullname', '$email', '$message')";

            $conn->query($sql) 
?>


  <div class="container">
    <div class="icon">✓</div>
    <div class="message">Thanks for Your Feedback</div>
    <p>We appreciate your input.</p>
  </div>
</body>
</html>