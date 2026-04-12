<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';

// Create Google OAuth client
$client = new Google\Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);

if (isset($_GET['code'])) {

    // Exchange authorization code for access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Get user details from Google
        $google_oauth = new Google\Service\Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Local variables — string datatype
        $user_id = $google_account_info->id;
        $name    = $google_account_info->name;
        $email   = $google_account_info->email;
        $picture = $google_account_info->picture;

        // Boolean flag
        $loginSuccess = false;

        // Store user details in session
        if ($user_id) {
            $_SESSION['user_id']      = $user_id;
            $_SESSION['user_name']    = $name;
            $_SESSION['user_email']   = $email;
            $_SESSION['user_picture'] = $picture;
            $loginSuccess = true;
        }

        if ($loginSuccess) {
            header('Location: dashboard.php');
            exit;
        } else {
            die('<p style="color:red;">Login failed.
                 <a href="index.php">Try again</a></p>');
        }

    } else {
        die('<p style="color:red;">OAuth Error: ' .
            $token['error'] . '
            <a href="index.php">Try again</a></p>');
    }

} else {
    die('<p style="color:red;">No authorization code received.
         <a href="index.php">Try again</a></p>');
}
?>
