<!DOCTYPE html>
<html>
<head>
    <title>Project TimberTech</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style> 
        .product-collection a {
            text-decoration: none;
            color: lawngreen; /* Updated color */
        }
    </style>
</head>
<body>
    <header>
        <h1>TimberTech Hardware Hub</h1>
        <nav>
            <ul>
                <li><a href="Feedback.php">Feedback</a></li>
                <li><a href="OrderList.php">Order List</a></li>
            </ul>
            <form class="search-form" action="/search" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </nav>
    </header>

    <section class="product-collection">
        <h2>Items on Sale</h2>
        <a href="Checkout.php?product=item1" class="product" onclick="addToCart('Item 1')">
            <img src="timber1.jpg" alt="Item 1">
            <h3>Item 1</h3>
            <p>High-quality timber for all your construction needs.</p>
            <p class="price">$50</p>
        </a>
        <a href="Checkout.php?product=item2" class="product" onclick="addToCart('Item 2')">
            <img src="products-services.jpg" alt="Item 2">
            <h3>Item 2</h3>
            <p>Durable and long-lasting hardware essentials.</p>
            <p class="price">$35</p>
        </a>
        <a href="Checkout.php?product=item3" class="product" onclick="addToCart('Item 3')">
            <img src="tools.jpg" alt="Item 3">
            <h3>Item 3</h3>
            <p>Top-notch lumber, perfect for any project.</p>
            <p class="price">$45</p>
        </a>
    </section>
</body>
</html>
