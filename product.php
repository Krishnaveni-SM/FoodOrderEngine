<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/products.css">
    <title>Product Management</title>
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
            <h2>Product Management</h2>

            <h3>Add/Edit Product</h3>
            <form id="product-form" enctype="multipart/form-data">
                <label for="product-name">Name:</label>
                <input type="text" id="product-name" name="product-name" required>

                <label for="product-price">Price:</label>
                <input type="text" id="product-price" name="product-price" required>

                <!-- Add a file input for the image upload with a name attribute -->
                <label for="foodimage">Image:</label>
                <input type="file" id="foodimage" name="foodimage" accept=".jpg, .jpeg, .png, .gif" required>

                <input type="button" value="Save Product" id="submit-button">
            </form>

            <div id="response-message"></div>
        </div>
    </div>

        <script>
    const form = document.getElementById('product-form');
    const submitButton = document.getElementById('submit-button');
    const responseMessage = document.getElementById('response-message');

    submitButton.addEventListener('click', () => {
        const formData = new FormData(form);

        fetch('insert_product.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Display the message using an alert
            if (data === 'Product inserted successfully.') {
                // Clear the form input fields
                form.reset();
                responseMessage.textContent = ''; // Clear the response message
            }
        })
        .catch(error => {
            responseMessage.textContent = 'Error: ' + error;
        });
    });

    </script>
</body>
</html>
