<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/user.css">
    <title>User Management</title>
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
            <h2>User Management</h2>
            
            <!-- User List -->
            <h3>User List</h3>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>Admin</td>
                        <td>
                            <a href="#">Edit</a> |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <!-- Add more user rows as needed -->
                </tbody>
            </table>
            
            <!-- Add User Form -->
            <h3>Add User</h3>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                
                <input type="submit" value="Add User">
            </form>
        </div>
    </div>
</body>
</html>
