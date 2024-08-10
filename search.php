<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search Results</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .property-card .card-banner img {
            width: 100%;
            height: 300px; /* Adjust the height as needed */
            object-fit: cover;
            background-color: #fff;
        }
    </style>
</head>
<body>
    
    <ul class="property-list">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve user input
            $buy_or_rent = $_POST['buy_or_rent'];
            $category = $_POST['category'];
            $location = $_POST['location'];
            $min_price = $_POST['min_price'];
            $max_price = $_POST['max_price'];

            

            // Establish a database connection
            $db_host = 'localhost'; // Your database host
            $db_name = 'home_db';   // Your database name
            $db_user = 'root';      // Your database username
            $db_pass = '';          // Your database password

            try {
                // Connect to the database using PDO
                $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                // Set PDO error mode to exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Construct SQL query based on user input
                $sql = "SELECT * FROM property WHERE offer = :buy_or_rent AND type = :category AND address LIKE :location AND price BETWEEN :min_price AND :max_price";

                // Prepare the SQL statement
                $stmt = $pdo->prepare($sql);

                // Bind parameters
                $stmt->bindParam(':buy_or_rent', $buy_or_rent);
                $stmt->bindParam(':category', $category);
                $stmt->bindValue(':location', '%' . $location . '%');
                $stmt->bindParam(':min_price', $min_price);
                $stmt->bindParam(':max_price', $max_price);

                // Execute the query
                $stmt->execute();

                // Check if any results were returned
                if ($stmt->rowCount() > 0) {
                    // Output the results
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Output HTML markup for each property listing
                        echo '<li>
                                <div class="property-card">
                                    <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
                                        <img src="' . $row['image_01'] . '" loading="lazy" alt="" class="img-cover">
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
                } else {
                    echo "<li>No properties found matching the search criteria.</li>";
                }
            } catch (PDOException $e) {
                // Handle database connection errors
                echo "<li>Connection failed: " . $e->getMessage() . "</li>";
            }

            // Close the database connection
            unset($pdo);
        } else {
            // Handle case where form is not submitted via POST method
            echo "<li>Form not submitted.</li>";
        }
        ?>
 <script src="main.js" defer></script>

<!--=========== ionicon link ==========-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>   </ul>
</body>
</html>
