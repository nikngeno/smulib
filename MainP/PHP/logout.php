<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to sign-in page
header("Location: ../sign_in.html");
exit();
?>
