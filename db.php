<?php
// Database connection file (db.php)

// Global variables for database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Connect to MySQL using global variables
$conn = new mysqli($servername, $username, $password, $dbname);

// Identify connection failure and terminate execution using die()
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>
