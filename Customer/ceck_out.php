<?php
include_once './header.php';
?>
<style>

    body{
        background-color:  rgb(220, 196, 182);
    }
 
    h2{
        text-align: center;
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
        background-color: aquamarine;
    }

    #customerDetailsForm {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: calc(100% - 12px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<h2>Order Summary</h2>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody id="checkoutCartBody">
      
    </tbody>
</table>
<p>Total Amount: Rs<span id="checkoutTotalAmount">.00</span></p>


<form id="customerDetailsForm" action="./process_order.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required><br><br>
    
    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea><br><br>
    
    <input type="submit" name="submit" value="Place Order">
  
<input type="hidden" id="totalAmount" name="totalAmount" value="0.00">
</form>


<script>
    var storedCart = localStorage.getItem('cartItems');
    var cartItems = storedCart ? JSON.parse(storedCart) : [];

    
    function displayCart() {
    var checkoutCartBody = document.getElementById('checkoutCartBody');
    var checkoutTotalAmount = document.getElementById('checkoutTotalAmount');
    var total = 0;

    checkoutTotalAmount.textContent = total.toFixed(2);
    document.getElementById('totalAmount').value = total.toFixed(2);

    checkoutCartBody.innerHTML = '';

    cartItems.forEach(function(item) {
        var row = checkoutCartBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        cell1.innerHTML = item.name;
        cell2.innerHTML = '$' + item.price.toFixed(2);

        total += item.price;
    });

    checkoutTotalAmount.textContent = total.toFixed(2);
    document.getElementById('totalAmount').value = total.toFixed(2); // Update hidden input

    // Update the hidden input field with the total amount
    document.getElementById('totalAmount').value = total.toFixed(2);
}

    displayCart();
</script>