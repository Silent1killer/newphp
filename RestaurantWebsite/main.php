<?php
// This file serves as an entry point for the PHP application

// Determine which page to load
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Remove trailing slash
$path = rtrim($path, '/');

// Default to index.php
if ($path == '' || $path == '/') {
    include 'index.php';
    exit;
}

// Detect file extension
$extension = pathinfo($path, PATHINFO_EXTENSION);

// If no extension, add .php
if (empty($extension)) {
    $php_file = $path . '.php';
    // Check if the PHP file exists
    if (file_exists('.' . $php_file)) {
        include '.' . $php_file;
        exit;
    }
}

// Check if the exact file exists
if (file_exists('.' . $path)) {
    // Determine content type based on extension
    $content_type = '';
    switch ($extension) {
        case 'css':
            $content_type = 'text/css';
            break;
        case 'js':
            $content_type = 'application/javascript';
            break;
        case 'svg':
            $content_type = 'image/svg+xml';
            break;
        case 'json':
            $content_type = 'application/json';
            break;
        default:
            // Let the server determine content type
            break;
    }
    
    if (!empty($content_type)) {
        header('Content-Type: ' . $content_type);
    }
    
    // Output the file content
    readfile('.' . $path);
    exit;
}

// If we get here, the file doesn't exist
http_response_code(404);
echo '<h1>404 Not Found</h1>';
echo '<p>The requested file could not be found.</p>';
?>