<?php
session_start();
session_unset();       // Unset all session variables
session_destroy();     // Destroy the session

// Prevent session fixation
if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Regenerate session ID to avoid fixation
session_regenerate_id(true);

// Redirect to login page
header("Location: ../login.php");
exit();
?>
