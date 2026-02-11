<?php

/**
 * MVsoft Front Controller / Router
 */

// 1. Get the requested path
$request = urldecode($_SERVER['REQUEST_URI']);
$base_path = '/Mvsoft/MVsoft (2)/Mvsoft/';
$path = str_ireplace($base_path, '', $request);
$path = trim($path, '/');

// 2. Parse query string if present
$path = explode('?', $path)[0];

// 3. Routing Logic
if ($path === '' || $path === 'home') {
    $page = 'home';
} else {
    $page = $path;
}

// 4. File Mapping
$file = __DIR__ . "/pages/{$page}.php";

// 5. Load the page or 404
if (file_exists($file)) {
    require_once $file;
} else {
    // If it's a direct file access attempt to includes or assets, let the server handle it?
    // But usually .htaccess handles that. 
    // basic 404 for now
    http_response_code(404);
    include 'includes/header.php';
    echo '<section class="py-5 text-center"><div class="container"><h1>404 - Page Not Found</h1><p>The page you are looking for does not exist.</p><a href="home" class="btn btn-primary">Back to Home</a></div></section>';
    include 'includes/footer.php';
}
