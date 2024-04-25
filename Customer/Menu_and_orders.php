<?php

include_once '../Db/connection.php';
include './header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Items</title>
    
    <style>
        body{
            background-color:  rgb(220, 196, 182);
        }
        
        h1{
            text-align: center;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 250px;
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .add-to-cart-btn {
            background-color: yellowgreen;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 5px;
            cursor: pointer;
        }

        .cart-container {
            margin-top: 20px;
        }

       
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-bar {
            margin-bottom: 20px;
            text-align: center;
            background-color: aqua;
        }

        .search-bar input[type="text"] {
            padding: 8px;
            width: 250px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <h1>DISHES</h1>
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search products..." onkeyup="searchProducts()">
    </div>

    

    <script>
        
        function pay() {
        
        localStorage.setItem('cartItems', JSON.stringify(cart));
        
        window.location.href = 'checkout.php';
    }
       

        function searchProducts() {
            var input, filter, products, productCards, productName, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            products = document.getElementsByClassName('product-card');

            for (i = 0; i < products.length; i++) {
                productName = products[i].getElementsByTagName('h2')[0];
                txtValue = productName.textContent || productName.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    products[i].style.display = '';
                } else {
                    products[i].style.display = 'none';
                }
            }
        }
    </script>

    <div class="cart-container">
        <h2>Shopping Cart</h2>
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cartBody">
                
            </tbody>
        </table>
        <p>Total Amount: Rs<span id="totalAmount">0.00</span></p>
        <form action="./ceck_out.php" method="POST"><button onclick="pay()" id="payButton">Pay</button></form>
        
    </div>

    <div class="products-container">
        <?php
        $database = new connection(); 
        $conn = $database->getConnection();

        $select_sql = "SELECT product_name, product_category, product_price, product_image FROM product";
        $stmt = $conn->query($select_sql);

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="product-card">';
                echo '<img src="' . htmlspecialchars($row['product_image']) . '" alt="Product Image">';
                echo '<div class="product-details">';
                echo '<h2>' . htmlspecialchars($row['product_name']) . '</h2>';
                echo '<p>Category: ' . htmlspecialchars($row['product_category']) . '</p>';
                echo '<p>Price: $' . htmlspecialchars($row['product_price']) . '</p>';
                echo '<button class="add-to-cart-btn" onclick="addToCart(\'' . htmlspecialchars($row['product_name']) . '\',' . htmlspecialchars($row['product_price']) . ')">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No products found.';
        }
        ?>
    </div>

    <script>
        var cart = []; 
        function addToCart(productName, price) {
            cart.push({ name: productName, price: price }); 
          
            updateCart();
        }

        function deleteFromCart(index) {
            cart.splice(index, 1); 

            
            updateCart();
        }

        function updateCart() {
            var cartBody = document.getElementById('cartBody');
            var totalAmount = document.getElementById('totalAmount');

            
            cartBody.innerHTML = '';

            
            var total = 0;
            cart.forEach(function(item, index) {
                var row = cartBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = item.name;
                cell2.innerHTML = 'Rs' + item.price.toFixed(2);
                cell3.innerHTML = '<button class="delete-btn" onclick="deleteFromCart(' + index + ')">Delete</button>';

                total += item.price;
            });

            
            totalAmount.textContent = total.toFixed(2);
        }
    </script>
</body>

</html>