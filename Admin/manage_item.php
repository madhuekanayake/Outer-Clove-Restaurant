<?php
include './admin_dashboard.php';
include '../Db/connection.php';

$database = new connection(); 
try {
   $conn = $database->getConnection();


   $select_sql = "SELECT * FROM product";
   $stmt = $conn->prepare($select_sql);
   $stmt->execute();

  
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

   echo 'Error: ' . $e->getMessage();
}

?>

<section class="add_product">
   <form action="./manage_itemadd.php" method="post" class="add-product-form" enctype="multipart/form-data">
      <div class="aleart">
         <?php

       
         if (isset($_SESSION['success'])) {
            echo '<div class="login-status-message-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']); 
         }

         ?>
      </div>
      <h3>ADD A NEW PRODUCT</h3>
      <input type="text" name="product_name" placeholder="Enter the product name" class="box" required>
      <input type="number" name="product_price" min="0" placeholder="Enter the product price" class="box" required>
      <select name="product_category" class="box" required>
         <option value="Burger">Burgers & Sandwiches</option>
         <option value="Pizza">Pizza</option>
         <option value="Rice">Rice</option>
         <option value="Noodles">Noodles</option>
         <option value="Kottu">Kottu</option>
         <option value="Desserts">Desserts</option>
         <option value="Beverages">Beverages</option>
         <option value="Soups and Salads">Soups and Salads</option>
      </select>
      <input type="file" name="product_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
      <input type="text" name="product_discrition" placeholder="Enter the product description" class="box" required>
      <input type="submit" value="Add the product" name="add_product" class="btn">
   </form>

</section>

<section class="view-products">
   <div class="product-cards">
      <?php
      
      foreach ($products as $product) {
         echo '<div class="product-card">';
         if (!empty($product['Product_image'])) {
            echo '<img style="height:155px;" src="' . $product['Product_image'] . '">';
         } else {
            echo '<img style="height: 155px; width: auto; max-width: 100%;" src="../uploaded_img/no_img.jpg">';
            
         }
         echo '<h4>' . $product['Product_name'] . '</h4>';
         echo '<p><strong>Price:</strong> RS.' . $product['Product_price'] . '</p>';
         echo '<p><strong>Category:</strong> ' . $product['Product_category'] . '</p>';
         echo '<p>' . $product['product_discrition'] . '</p>';
    
         echo '<div class="card-footer">';
         echo '<button class="edit-btn" data-product-id="' . $product['Product_id'] . '">Edit</button>';
         echo '<form action="./delete_product.php" method="post" class=a"card_form">';
         echo '<input type="hidden" name="product_id" value="' . $product['Product_id'] . '">';
         echo '<input type="hidden" name="delete_product" value="true">';
         echo '<button type="submit" class="delete-btn">Delete</button>';
         echo '</form>';
        
         echo '</div>'; 
         echo '</div>'; 
      }
      ?>
   
   </div>
</section>

</body>

</html>