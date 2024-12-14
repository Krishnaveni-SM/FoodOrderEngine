<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/setting.css">
    <title>Settings</title>
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <h1>Admin Panel</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="user.php">Users</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="admin_order.php">Orders</a></li>
                <li><a href="setting.php">Settings</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Settings</h2>
            
            <!-- General Settings -->
            <h3>General Settings</h3>
            <form>
                <label for="site-title">Site Title:</label>
                <input type="text" id="site-title" name="site-title" value="My Website">
                
                <label for="site-description">Site Description:</label>
                <textarea id="site-description" name="site-description">A description of my website.</textarea>
                
                <input type="submit" value="Save Changes">
            </form>
            
            <!-- Email Settings -->
            <h3>Email Settings</h3>
            <form>
                <label for="email-host">Email Host:</label>
                <input type="text" id="email-host" name="email-host" value="smtp.example.com">
                
                <label for="email-port">Email Port:</label>
                <input type="number" id="email-port" name="email-port" value="587">
                
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>
</body>
</html>
