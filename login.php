<?php
session_start();
require 'db.php';

function validateLogin() {
    global $collection;
    $message = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? ''; 
        $pwd = $_POST['password'] ?? ''; 
        
        if ($email && $pwd) {
            try {
                // Find document corresponding to the username mapped in NoSQL
                $user = $collection->findOne(['email' => $email]);
                
                if ($user) {
                    if (password_verify($pwd, $user['password'])) {
                        // Handle native Session verification
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['username'] = $user['username'];
                        
                        // Force redirect to secure dashboard successfully
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        $message = "Invalid password.";
                    }
                } else {
                    $message = "Email not found.";
                }
            } catch (Exception $e) {
                die("Database query failed: " . $e->getMessage());
            }
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
        <a href="index.html">Go to Public Dashboard</a>
        <a href="login.html">Back to Login</a>
    </div>
</body>
</html>
