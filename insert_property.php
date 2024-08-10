<?php
// insert_property.php

// Include database connection code (connect.php)
include 'connect.php';

// Define the base URL of your project
$base_url = 'http://localhost:80/WP/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $property_name = $_POST['property_name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $offer = $_POST['offer'];
    $status = $_POST['status'];
    $furnished = $_POST['furnished'];
    $bhk = $_POST['bhk'];
    $deposite = $_POST['deposite'];
    $bathroom = $_POST['bathroom'];
    $carpet = $_POST['carpet'];
    $lift = isset($_POST['lift']) ? $_POST['lift'] : 'no';
    $security_guard = isset($_POST['security_guard']) ? $_POST['security_guard'] : 'no';
    $play_ground = isset($_POST['play_ground']) ? $_POST['play_ground'] : 'no';
    $garden = isset($_POST['garden']) ? $_POST['garden'] : 'no';
    $water_supply = isset($_POST['water_supply']) ? $_POST['water_supply'] : 'no';
    $power_backup = isset($_POST['power_backup']) ? $_POST['power_backup'] : 'no';
    $parking_area = isset($_POST['parking_area']) ? $_POST['parking_area'] : 'no';
    $gym = isset($_POST['gym']) ? $_POST['gym'] : 'no';
    $description = $_POST['description'];
    
    // Prepare SQL statement to insert data into property table
    $sql = "INSERT INTO property (property_name, address, price, type, offer, status, furnished, bhk, deposite, bathroom, carpet, lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, description) 
            VALUES (:property_name, :address, :price, :type, :offer, :status, :furnished, :bhk, :deposite,:bathroom, :carpet, :lift, :security_guard, :play_ground, :garden, :water_supply, :power_backup, :parking_area, :gym, :description)";

    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':property_name', $property_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':offer', $offer);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':furnished', $furnished);
    $stmt->bindParam(':bhk', $bhk);
    $stmt->bindParam(':deposite', $deposite);
    $stmt->bindParam(':bathroom', $bathroom);
    $stmt->bindParam(':carpet', $carpet);
    $stmt->bindParam(':lift', $lift);
    $stmt->bindParam(':security_guard', $security_guard);
    $stmt->bindParam(':play_ground', $play_ground);
    $stmt->bindParam(':garden', $garden);
    $stmt->bindParam(':water_supply', $water_supply);
    $stmt->bindParam(':power_backup', $power_backup);
    $stmt->bindParam(':parking_area', $parking_area);
    $stmt->bindParam(':gym', $gym);
    $stmt->bindParam(':description', $description);

    // Execute the statement
    $stmt->execute();

    // Get the last inserted property ID
    $property_id = $pdo->lastInsertId();

    // Handle image uploads
    $target_dir = "image/";
    $image_fields = ['image_01', 'image_02', 'image_03', 'image_04', 'image_05'];
    
    foreach ($image_fields as $field) {
        $target_file = $target_dir . basename($_FILES[$field]["name"]);
        move_uploaded_file($_FILES[$field]["tmp_name"], $target_file);
        
        // Constructing the URL based on the base URL and the target file path
        $image_url = $base_url . $target_file;

        // Update the property table with image URLs
        $image_sql = "UPDATE property SET $field = :image WHERE id = :id";
        $image_stmt = $pdo->prepare($image_sql);
        $image_stmt->bindParam(':image', $image_url);
        $image_stmt->bindParam(':id', $property_id);
        $image_stmt->execute();
    }

    // Close the connection
    $pdo = null;
    echo "<script>alert('Property posted successfully');</script>";

    // Redirect back to post_property.php or any other page
    header("Location: index.php");
    exit();
}
?>
