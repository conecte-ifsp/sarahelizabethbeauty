<?php
$uri = $_GET["uri"] ?? '';
echo $uri;

ob_clean();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Rota principal vazia
if (empty($uri)) {
    require './public/index.html'; 
    exit;
}

// Rotas para arquivos públicos
if (str_starts_with($uri, "./public/") || str_starts_with($uri, "./app/views/") || preg_match('/\.(css|js|jpg|png|jpeg|gif|svg|json)$/', $uri)) {
    $fileExtension = strtolower(pathinfo($uri, PATHINFO_EXTENSION));
    
    if (!file_exists($uri) || is_dir($uri)) {
        http_response_code(404);
        die("404 - Arquivo não encontrado.");
    }

    if ($fileExtension == 'css') {
        header('Content-Type: text/css');
    }
    // Adicione outros headers conforme necessário
    
    if (in_array($fileExtension, ['php', 'html', 'css', 'js', 'json'])) {
        require $uri;
    } else {
        ob_clean();
        readfile($uri);
    }
} else {
    // Aqui você pode implementar seu roteador para outras URLs
    http_response_code(404);
    echo "404 - Página não Encontrada";
}






