<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/admin_order.css">
    <title>Order Management</title>
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
            <h2>Order Management</h2>
            
            <!-- Order List -->
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

            // Query to retrieve data from the placeorder table
            $query = "SELECT * FROM placeorder";
            $result = $conn->query($query);

            // Display retrieved data
            if ($result->num_rows > 0) {
                echo "<h2>Place Order Data</h2>";
                echo "<table>";
                echo "<tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Delivery Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["delivery_date"] . "</td>";
                    echo "<td>" . $row["total_amount"] . "OMR</td>";
                    echo "<td>Processing...</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No data found in the placeorder table.</p>";
            }

            $conn->close();
            ?>
            
        </div>
    </div>
</body>
</html>
