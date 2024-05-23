<?php
// Database connection settings
$servername = "localhost"; // Replace with your MySQL server hostname or IP address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "timbertech"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product is set in POST data
if (isset($_POST['product'])) {
    // Retrieve product information from the POST data
    $product = $_POST['product'];

    // Get the current date and time
    $orderDate = date('Y-m-d H:i:s');

    // Calculate a random arrival date within 1-3 days
    $arrivalDays = rand(1, 3);
    $arrivalDate = date('Y-m-d', strtotime("+$arrivalDays days"));

    // Initialize order details based on the product
    switch ($product) {
        case 'item1':
            $itemName = 'Item 1';
            $itemDescription = 'High-quality timber for all your construction needs.';
            $itemPrice = 50.00;
            break;
        case 'item2':
            $itemName = 'Item 2';
            $itemDescription = 'Durable and long-lasting hardware essentials.';
            $itemPrice = 35.00;
            break;
        case 'item3':
            $itemName = 'Item 3';
            $itemDescription = 'Top-notch lumber, perfect for any project.';
            $itemPrice = 45.00;
            break;
        default:
            // Handle unknown product
            echo 'Invalid product.';
            exit;
    }

    // Insert order into the database
    $sql = "INSERT INTO orders (item_name, item_description, item_price, order_date, arrival_date) VALUES ('$itemName', '$itemDescription', '$itemPrice', '$orderDate', '$arrivalDate')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to OrderList.php
        header("Location: OrderList.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid product.";
}

$conn->close();
?>
