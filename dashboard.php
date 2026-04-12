<?php
session_start();

// Redirect to login if session not set
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Local variables from session
$name    = $_SESSION['user_name'];
$email   = $_SESSION['user_email'];
$picture = $_SESSION['user_picture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Vehicle Rental</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f9ff; }
    .box { width: 520px; margin: 40px auto; padding: 24px;
           background: #fff; border-radius: 10px;
           box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { color: #e67e22; }
    img { border-radius: 50%; width: 80px;
          height: 80px; margin-bottom: 10px; }
    a { display: inline-block; margin: 6px 0; color: #e67e22; }
    .info { background: #f9f9f9; padding: 12px;
            border-radius: 6px; margin: 10px 0; }
  </style>
</head>
<body>
  <div class="box">
    <img src="<?php echo htmlspecialchars($picture); ?>"
         alt="Profile Picture">
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    <div class="info">
      <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>
      <p><b>Login Method:</b> Google OAuth</p>
    </div>
    <p>Your login is active. Explore vehicle rental services:</p>
    <a href="index.html">Vehicle Rental Home</a><br>
    <a href="uploads.html">Upload Driving Licence</a><br>
    <a href="logout.php">Log Out</a>
  </div>
</body>
</html>
