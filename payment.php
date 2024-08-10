<?php
include 'connect.php'; // Include the script that establishes the database connection

// Check if payment is successful (you can simulate this with a form submission or JavaScript)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Process the payment (dummy logic)
    // Assuming payment is successful
    $property_id = $_GET['id'];

    try {
        // Prepare SQL statement to delete the property tuple from the database
        $stmt = $pdo->prepare("DELETE FROM property WHERE id = :id");
        $stmt->bindParam(':id', $property_id);
        
        // Execute the SQL statement
        $stmt->execute();

        // Redirect back to property listing page after successful payment
        header("Location: property_listing.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
<!-- Your payment form -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .payment-form {
            text-align: center;
        }
        .payment-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .pay-now-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .pay-now-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Form</h2>
        <form class="payment-form" method="POST" action="">
            <!-- Payment form fields -->
            <!-- You can include fields for payment information (e.g., card number, CVV, etc.) -->
            <!-- Hidden input field to pass property ID -->
            <input type="hidden" name="property_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="text" name="card_number" class="payment-input" placeholder="Card Number" required>
            <input type="text" name="expiry_date" class="payment-input" placeholder="Expiry Date (MM/YYYY)" required>
            <input type="text" name="cvv" class="payment-input" placeholder="CVV" required>
            <input type="submit" name="submit" value="Pay Now" class="pay-now-button">
        </form>
    </div>
</body>
</html>
