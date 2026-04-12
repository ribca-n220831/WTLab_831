<?php
require 'vendor/autoload.php';
require 'db.php';
session_start();

// Secure parameters matched synchronously against oauth_login.php configurations
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'http://localhost/WTLab_ribca/oauth_callback.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if(!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Intercept profile information directly from Google natively
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;

        global $collection;

        try {
            // Search MongoDB for document linked logically to the inbound Identity
            $user = $collection->findOne(['email' => $email]);
            
            if (!$user) {
                // Register Secure OAuth User directly in MongoDB cleanly bypassing hash parameters completely
                $insertOneResult = $collection->insertOne([
                    'username' => $name,
                    'email' => $email,
                    'oauth_provider' => 'google'
                ]);
            }
            
            // Map Identity strictly enforcing PHP session mechanics tracking authorization securely
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $name;
            
            // Resolve navigation returning user locally
            header("Location: dashboard.php");
            exit();
        } catch (Exception $e) {
            die("<h2>OAuth Integration Failed: " . $e->getMessage() . "</h2>");
        }
    } else {
         header("Location: login.html");
         exit();
    }
} else {
    // Abort explicitly isolating bad logic
    header("Location: login.html");
    exit();
}
?>
