<?php
// Connect to MongoDB
require 'vendor/autoload.php';

try {
    // Configure connection to local MongoDB server instance
    $client = new MongoDB\Client("mongodb://localhost:27017");
    
    // Select the target database
    $db = $client->userdb; 
    
    // Select the target collection (equivalent to table)
    $collection = $db->users; 
} catch (Exception $e) {
    die("Error connecting to MongoDB: " . $e->getMessage());
}
?>
