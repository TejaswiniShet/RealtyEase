<?php
// Define base URL
$base_url = '';

// Check if the request is secure (HTTPS)
if (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] === 'https') {
    $base_url .= 'https://';
} else {
    $base_url .= 'http://';
}

// Add the server name
if (isset($_SERVER['SERVER_NAME'])) {
    $base_url .= $_SERVER['SERVER_NAME'];
}

// Add the server port if it's not the default port 80 or 443
if (isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] != 80 || $_SERVER['SERVER_PORT'] != 443)) {
    $base_url .= ':' . $_SERVER['SERVER_PORT'];
}

// Output the base URL
echo $base_url;
?>
