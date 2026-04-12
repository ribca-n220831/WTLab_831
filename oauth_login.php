<?php
require 'vendor/autoload.php';
session_start();

// Google OAuth Configuration placeholders (Must be filled internally via Google Cloud Console)
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'http://localhost/WTLab_ribca/oauth_callback.php';

// Native Google Client initialization
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);

// Setup required profile scopes natively accessing third proxy metadata
$client->addScope("email");
$client->addScope("profile");

// Generate and securely redirect user to OAuth Provider natively avoiding manual credentials
$authUrl = $client->createAuthUrl();
header("Location: " . filter_var($authUrl, FILTER_SANITIZE_URL));
exit();
?>
