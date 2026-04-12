<?php
// Functionality to securely download files from the uploads directory

if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    $filepath = __DIR__ . '/uploads/' . $filename;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        
        // Clear system output buffer and read file to output stream
        flush();
        readfile($filepath);
        exit();
    } else {
        echo "<h2>Error: File does not exist or has been deleted.</h2>";
    }
} else {
    echo "<h2>Error: No file specified.</h2>";
}
?>
