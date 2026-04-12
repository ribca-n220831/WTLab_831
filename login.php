<?php
require 'db.php';

function validateLogin() {
    global $conn; // Global variable use via global keyword
    $message = ""; // Local string variable
    $isValid = false; // Local boolean variable
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? ''; 
        $pwd = $_POST['password'] ?? ''; 
        
        if ($email && $pwd) {
            $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
            if (!$stmt) {
                die("Query preparation failed: " . $conn->error); // Output & control: die()
            }
            
            $stmt->bind_param("s", $email);
            if (!$stmt->execute()) {
                die("Query execution failed: " . $stmt->error); // Output & control: die()
            }
            
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                if (password_verify($pwd, $row['password'])) {
                    $isValid = true;
                    // string concatenation
                    $message = "Welcome back, " . $row['username'] . "!";
                } else {
                    $message = "Invalid password.";
                }
            } else {
                $message = "Email not found.";
            }
            $stmt->close();
        } else {
            $message = "Please enter both email and password.";
        }
    }
    return $message;
}

$message = validateLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Result</title>
    <style>body { font-family: Arial; text-align: center; padding: 50px; background-color: #f9f9f9; } .container { background: white; padding: 30px; border-radius: 8px; border: 1px solid #ccc; max-width: 500px; margin: auto; } a { display: inline-block; margin-top: 20px; text-decoration: none; background: #222; color: white; padding: 10px 20px; border-radius: 5px; margin-right: 10px; } a:hover { background: #444; }</style>
</head>
<body>
    <div class="container">
        <h2>Login Status</h2>
        <p><strong><?php print $message; ?></strong></p>
        <a href="index.html">Go to Dashboard</a>
        <a href="login.html">Back to Login</a>
    </div>
</body>
</html>
