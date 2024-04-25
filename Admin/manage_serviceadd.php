<?php

require '../Db/connection.php';
session_start();


if (isset($_POST['add_service'])) {
    
    $service_name = $_POST['service_name'];
    $service_image = $_FILES['service_image']['name'];
    $service_image_tmp_name = $_FILES['service_image']['tmp_name'];
    $service_image_folder = '../uploaded_img/'.$service_image;
    $service_description = $_POST['service_description'];


    $database = new connection(); // Create an instance of your Database class

    try {
        $conn = $database->getConnection();

        // Prepare the SQL statement for inserting data
        $insert_sql = "INSERT INTO service (service_name, service_image,service_description) VALUES (:service_name,:service_image, :service_description)";
        $stmt = $conn->prepare($insert_sql);

        // Bind parameters and execute the query
        $stmt->bindParam(':service_name', $service_name);
        $stmt->bindParam(':service_image', $service_image_folder);
        $stmt->bindParam(':service_description', $service_description);

        // Move uploaded file to desired location
        move_uploaded_file($service_image_tmp_name, $service_image_folder);

        $stmt->execute();

        // Redirect after successful insertion
        $_SESSION['success'] = 'image added sususfully.';
        header('location: manage_service.php');
        exit();
       
        exit();
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo 'Error: ' . $e->getMessage();
    }
}



?>