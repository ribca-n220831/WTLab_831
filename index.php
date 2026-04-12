<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

require_once 'vendor/autoload.php';
require_once 'config.php';

// Create Google OAuth client
$client = new Google\Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope('email');
$client->addScope('profile');

// Generate Google login URL
$loginUrl = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Vehicle Rental</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f9ff;
           display: flex; justify-content: center;
           align-items: center; min-height: 100vh; margin: 0; }
    .box { background: #fff; padding: 2rem; border-radius: 10px;
           box-shadow: 0 2px 10px rgba(0,0,0,0.1);
           width: 380px; text-align: center; }
    h2 { color: #e67e22; }
    p { color: #555; }
    .google-btn {
           display: inline-block; padding: 12px 24px;
           background: #4285F4; color: white; border-radius: 6px;
           text-decoration: none; font-size: 15px;
           font-weight: bold; margin-top: 20px; }
    .google-btn:hover { background: #357ae8; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Vehicle Rental</h2>
    <p>Sign in securely with your Google account to access
       our vehicle rental services.</p>
    <a class="google-btn" href="<?php echo htmlspecialchars($loginUrl); ?>">
      Sign in with Google
    </a>
  </div>
</body>
</html>
