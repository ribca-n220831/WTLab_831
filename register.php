<?php
require 'db.php';

// Function containing static variable
function incrementRegistrationCount() {
    static $registrationCount = 0;
    $registrationCount++;
    return $registrationCount;
}

$message = ""; // Local variable
$isSuccess = false; // boolean datatype
$userId = 0; // integer datatype
$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? ''; // string datatype
    $email = $_POST['email'] ?? ''; 
    $pwd = $_POST['password'] ?? ''; 
    
    $userArr = array($name, $email); // array datatype
    
    if ($name && $email && $pwd) {
        global $conn; // Global variable reference
        
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
    <title>Registration Result</title>
    <style>body { font-family: Arial; text-align: center; padding: 50px; background-color: #f9f9f9; } .container { background: white; padding: 30px; border-radius: 8px; border: 1px solid #ccc; max-width: 500px; margin: auto; } a { display: inline-block; margin-top: 20px; text-decoration: none; background: #222; color: white; padding: 10px 20px; border-radius: 5px; margin-right: 10px; } a:hover { background: #444; }</style>
</head>
<body>
    <div class="container">
        <h2>Registration Status</h2>
        <p><strong><?php echo $message; ?></strong></p>
        <a href="login.html">Proceed to Login</a>
        <a href="register.html">Go Back</a>
    </div>
</body>
</html>
