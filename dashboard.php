<?php
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

// Query to count the number of users
$userCountQuery = "SELECT COUNT(*) as userCount FROM login";
$userResult = $conn->query($userCountQuery);
$userCount = $userResult->fetch_assoc()['userCount'];

// Query to count the number of products
$productCountQuery = "SELECT COUNT(*) as productCount FROM foods";
$productResult = $conn->query($productCountQuery);
$productCount = $productResult->fetch_assoc()['productCount'];

// Query to count the number of orders
$orderCountQuery = "SELECT COUNT(*) as orderCount FROM placeorder";
$orderResult = $conn->query($orderCountQuery);
$orderCount = $orderResult->fetch_assoc()['orderCount'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <h1>Admin Panel</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="admin_order.php">Orders</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Dashboard</h2>
            
            <!-- Quick Stats -->
            <div class="quick-stats">
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p><?php echo $userCount; ?></p>
                </div>
                <div class="stat-box">
                    <h3>Total Products</h3>
                    <p><?php echo $productCount; ?></p>
                </div>
                <div class="stat-box">
                    <h3>Total Orders</h3>
                    <p><?php echo $orderCount; ?></p>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <h3>Recent Activity</h3>
            <ul>
                <li>User John Doe registered.</li>
                <li>New product added: Product A.</li>
                <li>Order #123 placed by User Jane Smith.</li>
                <!-- Add more activity items as needed -->
            </ul>
        </div>
    </div>
</body>
</html>
