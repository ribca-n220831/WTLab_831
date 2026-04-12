<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "Something went wrong.";

    if (isset($_POST['book'])) {
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $vehicle = htmlspecialchars($_POST['vehicle'] ?? '');
        $start_date = htmlspecialchars($_POST['start_date'] ?? '');
        $end_date = htmlspecialchars($_POST['end_date'] ?? '');
        
        $message = "Thank you, <strong>$name</strong>! Your booking for a <strong>$vehicle</strong> from $start_date to $end_date is confirmed.<br>A confirmation email has been sent to $email.";
    } elseif (isset($_POST['submit_feedback'])) {
        $feedback = htmlspecialchars($_POST['feedback'] ?? '');
        $message = "Thank you for your valuable feedback: <br><em>\"$feedback\"</em>";
    }

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Submission Result</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background-color: #f9f9f9; }
            .container { background: white; padding: 30px; border-radius: 8px; border: 1px solid #ccc; max-width: 500px; margin: auto; }
            a { display: inline-block; margin-top: 20px; text-decoration: none; background: #222; color: white; padding: 10px 20px; border-radius: 5px; }
            a:hover { background: #444; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Submission Result</h2>
            <p>' . $message . '</p>
            <a href="index.html">Go Back</a>
        </div>
    </body>
    </html>';
} else {
    // Redirect back to home if accessed directly
    header("Location: index.html");
    exit();
}
?>
