<?php
// Retrieve the design filename from the query parameter
$design = $_GET['design'];

// Assuming the designs are stored in a 'designs' directory
$designsDirectory = 'designs/';

// Path to the design file
$filePath = $designsDirectory . $design;

// Check if the file exists
if (file_exists($filePath)) {
    // Set the appropriate headers for file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    // Read the file and output its contents
    readfile($filePath);
    exit;
} else {
    // File not found
    echo 'File not found.';
}
?>
