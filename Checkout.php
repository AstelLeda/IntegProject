<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>TimberTech Hardware Hub</h1>
    </header>

    <section class="order-panel panel">
        <h2>Checkout</h2>
        <?php
        // Retrieve product information from the URL
        $product = $_GET['product']; // Assuming 'product' is passed as a parameter

        // Display ordered item details based on the product
        switch ($product) {
            case 'item1':
                $itemName = 'Item 1';
                $itemDescription = 'High-quality timber for all your construction needs.';
                $itemPrice = '$50';
                $itemImage = 'timber1.jpg';
                break;
            case 'item2':
                $itemName = 'Item 2';
                $itemDescription = 'Durable and long-lasting hardware essentials.';
                $itemPrice = '$35';
                $itemImage = 'products-services.jpg';
                break;
            case 'item3':
                $itemName = 'Item 3';
                $itemDescription = 'Top-notch lumber, perfect for any project.';
                $itemPrice = '$45';
                $itemImage = 'tools.jpg';
                break;
            default:
                // Handle unknown product
                echo 'Invalid product.';
                exit;
        }
        ?>
        <div class="product" style="width: 60%; margin: 0 auto;">
            <img src="<?php echo $itemImage; ?>" alt="<?php echo $itemName; ?>" style="max-width: 100%; height: auto;">
            <h3><?php echo $itemName; ?></h3>
            <p><?php echo $itemDescription; ?></p>
            <p class="price"><?php echo $itemPrice; ?></p>
        </div>
        <form action="process_order.php" method="POST" class="confirm-order">
            <input type="hidden" name="product" value="<?php echo $product; ?>">
            <button type="submit">Confirm Order</button>
        </form>
    </section>
</body>
</html>
