<?php 
if (!empty($_GET['file'])) {
    // Prevent directory traversal attacks
    $filename = basename($_GET['file']);
    $filepath = 'images/' . $filename;

    if (file_exists($filepath)) {
        // Set appropriate headers for file download
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: binary");

        // Output the file to the browser
        readfile($filepath);
        exit;
    } else {
        echo "This file does not exist.";
    }
} else {
    echo "No file specified.";
}
?>
