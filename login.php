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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - S_CARS Rental</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .auth { padding: 60px 20px; text-align: center; }
        .auth-message { color: teal; font-weight: bold; margin-bottom: 20px; }
        .register-link { margin-top: 15px; display: block; color: teal; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <h1>S_CARS Rental</h1>
        <nav>
            <a href="index.html">HOME</a>
            <a href="#">VEHICLES</a>
            <a href="#">SERVICES</a>
            <a href="#">CONTACT</a>
            <a href="login.php">LOGIN</a>
        </nav>
    </header>

    <section class="auth">
        <h2>Login to Your Account</h2>
        <?php if ($message): ?>
            <!-- Output & Control: print for login status message -->
            <p class="auth-message"><?php print $message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST" class="auth-form">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="register.php" class="register-link">Don't have an account? Register here.</a>
    </section>

    <footer>
        <p>THANK YOU</p>
    </footer>
</body>
</html>
