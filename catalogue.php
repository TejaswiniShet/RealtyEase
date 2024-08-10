<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .property-card .card-banner img {
            width: 100%;
            height: 250px; /* Adjust the height as needed */
            object-fit: cover;
            background-color: #fff;
        }
    </style>
</head>
<body>
<section class="section property" id="property" aria-label="property">
    <div class="container">
        <p class="section-text">
            A great platform to buy, sell and rent properties.
        </p>
        <ul class="property-list">
            <?php
            // Connect to your database using PDO
            $host = "localhost"; // Change this if your database is hosted elsewhere
            $dbname = "home_db"; // Change this to your actual database name
            $username = "root"; // Change this to your actual database username
            $password = ""; // Change this to your actual database password
            
            try {
                // Create a new PDO instance
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                
                // Set PDO error mode to exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Query to fetch data from the database
                $sql = "SELECT * FROM property";
                $stmt = $pdo->query($sql);

                // Displaying data dynamically
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<li>
                            <div class="property-card">
                                <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
                                    <a href="property_info.php?id=' . $row['id'] . '">
                                        <img src="' . $row['image_01'] . '" loading="lazy" alt="" class="img-cover">
                                    </a>
                                </figure>
                               
                                <div class="card-content">
                                    <h3 class="h3">
                                        <a href="property_info.php?id=' . $row['id'] . '" class="card-title">' . $row['address'] . '</a>
                                    </h3>
                                    <ul class="card-list">
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="cube-outline"></ion-icon>
                                            </div>
                                            <span class="item-text">' . $row['carpet'] . '</span>
                                        </li>
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="bed-outline"></ion-icon>
                                            </div>
                                            <span class="item-text">' . $row['bhk'] . ' BHK</span>
                                        </li>
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                                            </div>
                                            <span class="item-text">' . $row['offer'] . '</span>
                                        </li>
                                    </ul>
                                    <div class="card-meta">
                                        <div>
                                            <span class="meta-title">Price</span>
                                            <span class="meta-text">₹ ' . $row['price'] . '</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>';             
                }
            } catch(PDOException $e) {
                // Display error message if connection or query fails
                echo "Error: " . $e->getMessage();
            }
            ?>
        </ul>
    </div>
</section>
<script src="main.js" defer></script>

<!--=========== ionicon link ==========-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
