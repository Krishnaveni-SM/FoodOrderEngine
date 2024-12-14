<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "parkingfoodordersystem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $foodname = $_POST['product-name'];
    $foodamount = $_POST['product-price'];

    // File upload handling
    $targetDirectory = "food/"; // Directory where the uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["foodimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["foodimage"]["tmp_name"]);
    if ($check !== false) {
        // It's an image
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust to your needs)
    if ($_FILES["foodimage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can add more if needed)
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["foodimage"]["tmp_name"], $targetFile)) {
            // The file has been uploaded successfully
            $imageLocation = $targetFile;

            // Insert the product into the "foods" table
            $insert_query = "INSERT INTO foods (foodname, foodamount, foodimagelocation) VALUES ('$foodname', '$foodamount', '$imageLocation')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Product inserted successfully.";
            } else {
                echo "Error inserting product: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close(); // Close the database connection
?>
