<?php

require '../Db/connection.php';
session_start();


if (isset($_POST['add_user'])) {
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_type = $_POST['user_type'];
    $user_password =$_POST['user_password'];
    $user_hashpassword = password_hash($user_password, PASSWORD_DEFAULT);

    $database = new connection(); // Create an instance of your Database class

    try {
        $conn = $database->getConnection();
       
        // Prepare the SQL statement for inserting data
        $insert_sql = "INSERT INTO users (user_name,user_email,user_password,user_hashpassword,user_type) VALUES (:user_name,:user_email,:user_password,:user_hashpassword,:user_type)";
        $stmt = $conn->prepare($insert_sql);

        // Bind parameters and execute the query
        $stmt->bindParam(':user_name',$user_name);
        $stmt->bindParam(':user_email',$user_email);
        $stmt->bindParam(':user_password',$user_password);
        $stmt->bindParam(':user_hashpassword',$user_hashpassword);
        $stmt->bindParam(':user_type',$user_type);

        // Move uploaded file to desired location
    

        $stmt->execute();

        // Redirect after successful insertion
        $_SESSION['success'] = 'user added sususfully.';
        header('location:manage_staff.php');
        exit();
       
        exit();
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo 'Error: ' . $e->getMessage();
    }
}



?>