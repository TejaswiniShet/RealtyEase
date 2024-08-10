<?php
// Database connection parameters
$host = "localhost"; // Change this if your database is hosted elsewhere
$dbname = "home_db"; // Change this to your actual database name
$username = "root"; // Change this to your actual database username
$password = ""; // Change this to your actual database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to fetch all tuples from the property table
    $sql = "SELECT * FROM property";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Check if there are any results
    if ($stmt->rowCount() > 0) {
        // Output data of each row
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Display the property information
            echo "Property Name: " . htmlspecialchars($row["property_name"]). "<br>";
            echo "Address: " . htmlspecialchars($row["address"]). "<br>";
            echo "Price: " . htmlspecialchars($row["price"]). "<br>";
            echo "Type: " . htmlspecialchars($row["type"]). "<br>";
            // Display other relevant fields similarly
            
            // Display images if they exist
            for ($i = 1; $i <= 5; $i++) {
                $image_column = "image_0$i";
                if (!empty($row[$image_column])) {
                    echo "<img src='images/" . htmlspecialchars($row[$image_column]) . "' alt='Image $i'><br>";
                }
            }
            
            echo "<hr>";
        }
    } else {
        echo "0 results found";
    }
} catch(PDOException $e) {
    // Display error message if connection or query fails
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
