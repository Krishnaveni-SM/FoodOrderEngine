<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body style="background-color: #333;">

    <div class="login-container">
        <div class="login-box">
            <h2>Welcome Back!</h2>
            <form method="POST" action="login_submit.php">
                <div class="textbox">
                    <input type="text" placeholder="Username" name = "username" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name = "password" required>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>

</body>
</html>
