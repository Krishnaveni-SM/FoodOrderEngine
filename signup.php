<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
</head>
<br><br>
<body style="background-color: #333;">
    <div class="signup-container">
        <div class="signup-box">
            <h2>Create an Account</h2>
            <form method="POST" action="signup_submit.php">
                <div class="textbox">
                    <input type="text" placeholder="Full Name" name="fullname" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="textbox">
                    <input type="email" placeholder="Email" name="emailid" required>
                </div>
                <div class="textbox">
                    <input type="tel" placeholder="Phone Number" name="phone"  required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Address" name="address"  required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password"  required>
                </div>
                <input type="submit" class="btn" value="Signup">
            </form>
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>