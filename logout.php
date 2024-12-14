<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a login or home page
header("Location: login.php"); // Replace with the appropriate page
exit;
?>
