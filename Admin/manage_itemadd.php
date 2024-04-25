<?php

require '../Db/connection.php';
session_start();

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../uploaded_img/product/'.$product_image;
    $product_discrition = $_POST['product_discrition'];

    $database = new connection(); // Create an instance of your Database class

    try {
        $conn = $database->getConnection();

        // Prepare the SQL statement for inserting data
        $insert_sql = "INSERT INTO product (product_name, product_price, product_category, product_image, product_discrition) VALUES (:product_name, :product_price, :product_category, :product_image, :product_discrition)";
        $stmt = $conn->prepare($insert_sql);

        // Bind parameters and execute the query
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_price', $product_price);
        $stmt->bindParam(':product_category', $product_category);
        $stmt->bindParam(':product_image', $product_image_folder);
        $stmt->bindParam(':product_discrition', $product_discrition);

        // Move uploaded file to desired location
        move_uploaded_file($product_image_tmp_name, $product_image_folder);

        $stmt->execute();

        // Redirect after successful insertion
        $_SESSION['success'] = 'Product added sususfully.';
        header('location: manage_item.php');
        exit();
       
        exit();
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo 'Error: ' . $e->getMessage();
    }
}



?>