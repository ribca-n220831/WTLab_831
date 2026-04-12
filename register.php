<?php
require 'db.php';

// Function containing static variable
function incrementRegistrationCount() {
    // Static Variable
    static $registrationCount = 0;
    $registrationCount++;
    return $registrationCount;
}

$message = ""; // Local variable
$isSuccess = false; // boolean datatype
$userId = 0; // integer datatype
$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Local scope inside conditional block
    $name = $_POST['name'] ?? ''; // string datatype
    $email = $_POST['email'] ?? ''; 
    $pwd = $_POST['password'] ?? ''; 
    
    $userArr = array($name, $email); // array datatype
    
    if ($name && $email && $pwd) {
        global $conn; // Global variable reference
        
        // Output & control block
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error); // control: die()
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $message = "Email already registered!";
        } else {
            $stmt->close();
            
            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if (!$stmt) {
                die("Query preparation failed: " . $conn->error); // control: die()
            }
            $stmt->bind_param("sss", $userArr[0], $userArr[1], $hashed_pwd);
            
            if ($stmt->execute()) {
                $userId = $stmt->insert_id; // integer datatype assignment
                $isSuccess = true;
                $count = incrementRegistrationCount(); // static variable call
            } else {
                die("Query execution failed: " . $stmt->error); // control: die()
            }
        }
        $stmt->close();
        
        if ($isSuccess) {
            $message = "Registration successful for " . htmlspecialchars($userArr[0]) . "! Your ID is: " . $userId . " (Processed Count: $count)";
        }
    } else {
        $message = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - S_CARS Rental</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .auth { padding: 60px 20px; text-align: center; }
        .auth-message { font-weight: bold; margin-bottom: 20px; padding: 15px; border-radius: 5px;}
        .auth-success { color: #155724; background-color: #d4edda; }
        .auth-error { color: #721c24; background-color: #f8d7da; }
        .login-link { margin-top: 15px; display: block; color: teal; text-decoration: none; }
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
        <h2>Create an Account</h2>
        <?php if ($message): ?>
            <!-- Output & Control: echo for registration status message -->
            <div class="auth-message <?php echo $isSuccess ? 'auth-success' : 'auth-error'; ?>">
                <?php echo $message; // Utilizing echo ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST" class="auth-form">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <a href="login.php" class="login-link">Already have an account? Login here.</a>
    </section>

    <footer>
        <p>THANK YOU</p>
    </footer>
</body>
</html>
