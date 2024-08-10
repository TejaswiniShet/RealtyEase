<?php
// Connect to your database
$db_host = 'localhost'; // Your database host
$db_user = 'root'; // Your database username
$db_pass = ''; // Your database password
$db_name = 'home_db'; // Your database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if property ID is passed through URL
if(isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Query to fetch property information
    $sql = "SELECT * FROM property WHERE id = $property_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display property information
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Property Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .property-info {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .property-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .property-image {
            flex: 1 1 50%;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .property-image img {
            width: 100%;
            border-radius: 5px;
        }

        .property-content {
            flex: 1 1 40%;
        }

        .h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .property-list {
            padding: 0;
            list-style: none;
        }

        .meta-title {
            font-weight: bold;
            margin-right: 10px;
        }

        .meta-text {
            color: #666;
        }

        .finalize-deal-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .finalize-deal-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <section class="section property-info" id="property-info" aria-label="property-info">
        <div class="property-details">
            <figure class="property-image">
                <img src="' . $row['image_01'] . '" alt="Property Image">
            </figure>
            <div class="property-content">
                <h2 class="h2">' . $row['address'] . '</h2>
                <ul class="property-list">
                    <li>
                        <span class="meta-title">Property Name:</span>
                        <span class="meta-text">' . $row['property_name'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Price:</span>
                        <span class="meta-text">₹ ' . $row['price'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Type:</span>
                        <span class="meta-text">' . $row['type'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Offer:</span>
                        <span class="meta-text">' . $row['offer'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Status:</span>
                        <span class="meta-text">' . $row['status'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Furnished:</span>
                        <span class="meta-text">' . $row['furnished'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">BHK:</span>
                        <span class="meta-text">' . $row['bhk'] . ' BHK</span>
                    </li>
                    <li>
                        <span class="meta-title">Deposit:</span>
                        <span class="meta-text">₹ ' . $row['deposite'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Bathroom:</span>
                        <span class="meta-text">' . $row['bathroom'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Carpet Area:</span>
                        <span class="meta-text">' . $row['carpet'] . ' sqft</span>
                    </li>
                    <li>
                        <span class="meta-title">Lift:</span>
                        <span class="meta-text">' . $row['lift'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Security Guard:</span>
                        <span class="meta-text">' . $row['security_guard'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Play Ground:</span>
                        <span class="meta-text">' . $row['play_ground'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Garden:</span>
                        <span class="meta-text">' . $row['garden'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Water Supply:</span>
                        <span class="meta-text">' . $row['water_supply'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Power Backup:</span>
                        <span class="meta-text">' . $row['power_backup'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Parking Area:</span>
                        <span class="meta-text">' . $row['parking_area'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Gym:</span>
                        <span class="meta-text">' . $row['gym'] . '</span>
                    </li>
                    <li>
                        <span class="meta-title">Description:</span>
                        <span class="meta-text">' . $row['description'] . '</span>
                    </li>
                </ul>
                <a href="payment.php?id=' . $row['id'] . '">
                 Finalize Deal
            </a>

            </div>
        </div>
    </section>
</div>

<script src="main.js" defer></script>

<!--=========== ionicon link ==========-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>';
    } else {
        echo "Property not found.";
    }
} else {
    echo "Property ID not provided.";
}

mysqli_close($conn);
?>
