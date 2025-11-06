<?php

$uri = $_GET["uri"] ?? '';

ob_clean(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (str_starts_with($uri, needle: "public/") || str_starts_with($uri, "app/views/") || preg_match('/\.(css|js|jpg|png|jpeg|gif|svg|json)$/', $uri)) {
    $fileExtension = strtolower(pathinfo($uri, PATHINFO_EXTENSION));
    
    if (!file_exists($uri) || is_dir($uri)) {
        http_response_code(404);
        die("404 - Arquivo não DJAISDJSAID.");
    }

    if ($fileExtension == 'css') {
        header('Content-Type: text/css');
    }

    if ($fileExtension == 'php' || $fileExtension == 'html' || $fileExtension == 'css' || $fileExtension == 'js' || $fileExtension == 'json') {
        require $uri;
    } else {
        ob_clean();
        readfile($uri);
    }
} else {
    http_response_code(404);
    echo "404 - Arquivo não BBBBBBB";
}

