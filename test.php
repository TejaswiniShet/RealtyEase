<?php
// Connect to your database
$host = 'localhost';
$dbname = 'home_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Retrieve URLs from the database
$stmt = $conn->query("SELECT image_01 FROM property");
$urls = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Check URL accessibility
foreach ($urls as $url) {
    $content = @file_get_contents($url);
    if ($content !== false) {
        echo "URL $url is accessible.<br>";
    } else {
        echo "URL $url is not accessible.<br>";
    }
}

// Close the database connection
$conn = null;
?>
