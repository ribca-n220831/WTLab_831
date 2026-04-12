<?php
session_start();

// Strict session check to verify auth tracking
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Dashboard - S_CARS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container { padding: 60px 20px; text-align: center; }
        .logout-btn { display: inline-block; margin-top: 20px; text-decoration: none; background: tomato; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;}
        .logout-btn:hover { background: darkred; }
        .dashboard-container h2 { color: teal; font-size: 32px; }
        .dashboard-container p { margin-top: 15px; font-size: 18px; }
    </style>
</head>
<body>
    <header>
        <h1>S_CARS Rental</h1>
        <nav>
            <a href="index.html">HOME</a>
            <a href="uploads.html">UPLOADS</a>
            <a href="dashboard.php">DASHBOARD</a>
            <a href="logout.php">LOGOUT</a>
        </nav>
    </header>

    <div class="dashboard-container">
        <h2>Welcome to your Secured Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You are successfully logged in with the email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
        <p>Your session is currently active and authenticated seamlessly through MongoDB.</p>
        
        <br><br>
        <a href="logout.php" class="logout-btn">Logout of Account</a>
    </div>

    <footer>
        <p>THANK YOU</p>
    </footer>
</body>
</html>
