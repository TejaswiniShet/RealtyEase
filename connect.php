<?php
// Database connection parameters
$host = "localhost"; // Change this if your database is hosted elsewhere
$dbname = "home_db"; // Change this to your actual database name
$username = "root"; // Change this to your actual database username
$password = ""; // Change this to your actual database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display error message if connection fails
    die("Connection failed: " . $e->getMessage());
}
?>
