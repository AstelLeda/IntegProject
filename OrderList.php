<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timbertech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all orders from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Order List</h1>
    </header>
    <section>
        <h2>Confirmed Orders</h2>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Order Date</th>
                <th>Arrival Date</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_description']) . "</td>";
                    echo "<td>$" . number_format($row['item_price'], 2) . "</td>";
                    echo "<td>" . htmlspecialchars($row['order_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['arrival_date']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No orders found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div class="back-to-menu">
            <button onclick="window.location.href='MainInterface.php'">Back to Menu</button>
        </div>
    </section>
</body>

</html>
