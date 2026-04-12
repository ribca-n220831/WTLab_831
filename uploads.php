<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "Something went wrong.";

    if (isset($_POST['book'])) {
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $vehicle = htmlspecialchars($_POST['vehicle'] ?? '');
        $start_date = htmlspecialchars($_POST['start_date'] ?? '');
        $end_date = htmlspecialchars($_POST['end_date'] ?? '');
        
        $uploadedFile = '';
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Handle file parsing and uploading via $_FILES structure natively
        if (isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === UPLOAD_ERR_OK) {
            $originalName = $_FILES['fileupload']['name'];
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName);
            $ext = strtolower(pathinfo($safeName, PATHINFO_EXTENSION));
            $allowed = ['pdf', 'jpg', 'jpeg', 'png', 'txt'];

            if (in_array($ext, $allowed, true) && $_FILES['fileupload']['size'] <= 5 * 1024 * 1024) {
                $newName = time() . '_' . $safeName;
                $targetPath = $uploadDir . $newName;
                
                if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $targetPath)) {
                    $uploadedFile = $newName; 
                }
            } else {
                $message = "File validation failed. Invalid extension or size over 5MB.";
            }
        }
        
        // Emulating DB log behavior
        $data = "$name | $email | $vehicle | $start_date | $end_date | $uploadedFile\n";
        file_put_contents('bookings.txt', $data, FILE_APPEND);

        $message = "Thank you, <strong>$name</strong>! Your document for the <strong>$vehicle</strong> booking from $start_date to $end_date has been processed.<br>A confirmation email is on route to $email.";
        
        if ($uploadedFile) {
            $message .= "<br><br><strong>File Upload Verified:</strong> <br><a style='display:inline-block; margin-top:10px; background:#4CAF50; padding:10px; color:white; text-decoration:none; border-radius:4px;' href='download.php?file=" . urlencode($uploadedFile) . "'>Download Submitted File</a>";
        } else {
             $message .= "<br><br><strong>Note:</strong> File upload detected a failure point.";
        }
    }

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Result</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background-color: #f9f9f9; }
            .container { background: white; padding: 30px; border-radius: 8px; border: 1px solid #ccc; max-width: 500px; margin: auto; }
            .back-btn { display: inline-block; margin-top: 20px; text-decoration: none; background: #222; color: white; padding: 10px 20px; border-radius: 5px; }
            .back-btn:hover { background: #444; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Upload Status</h2>
            <p>' . $message . '</p>
            <a href="uploads.html" class="back-btn">Go Back</a>
        </div>
    </body>
    </html>';
} else {
    // Redirect direct GET requests securely
    header("Location: uploads.html");
    exit();
}
?>
