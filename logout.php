<?php
session_start();

// Unset all active native session variables uniquely
session_unset();

// Completely destroy the session on the backend natively
session_destroy();

// Force user redirection natively handling auth invalidation 
header("Location: login.html");
exit();
?>
