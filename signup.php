<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? ''); 
    $pwd = $_POST['password'] ?? ''; 
    
    if ($name && $email && $pwd) {
        global $collection;
        
        try {
            // Check if email already exists locally in MongoDB NoSQL
            $existingUser = $collection->findOne(['email' => $email]);
            
            if ($existingUser) {
                $message = "Email already registered!";
            } else {
                $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $insertOneResult = $collection->insertOne([
                    'username' => $name,
                    'email' => $email,
                    'password' => $hashed_pwd
                ]);
                
                if ($insertOneResult->getInsertedCount() == 1) {
                    $message = "Signup successful for " . $name . "!";
                } else {
                    $message = "Error signing up user in MongoDB.";
                }
            }
        } catch (Exception $e) {
            die("Database operation failed: " . $e->getMessage());
        }
    } else {
        $message = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup Result</title>
    <style>body { font-family: Arial; text-align: center; padding: 50px; background-color: #f9f9f9; } .container { background: white; padding: 30px; border-radius: 8px; border: 1px solid #ccc; max-width: 500px; margin: auto; } a { display: inline-block; margin-top: 20px; text-decoration: none; background: #222; color: white; padding: 10px 20px; border-radius: 5px; margin-right: 10px; } a:hover { background: #444; }</style>
</head>
<body>
    <div class="container">
        <h2>Signup Status</h2>
        <p><strong><?php echo $message; ?></strong></p>
        <a href="login.html">Proceed to Login</a>
        <a href="signup.html">Go Back</a>
    </div>
</body>
</html>
