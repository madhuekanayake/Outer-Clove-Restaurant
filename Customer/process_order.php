<?php
require_once '../Db/connection.php';

if (isset($_POST['submit'])) {
    var_dump($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $totalAmount = $_POST['totalAmount'];

    try {
        $db = new connection();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO orders (name, email, phone, address, total_amount) VALUES (:name, :email, :phone, :address, :totalAmount)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindValue(':totalAmount', $totalAmount);

        $stmt->execute();

        $lastInsertedId = $conn->lastInsertId();

        header('location: process_order.php'); 
        exit();
    } catch (PDOException $e) {
        error_log('Error message: ' . $e->getMessage(), 0); // Log the error message to a file
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Handle invalid request method
    http_response_code(405); // Set a proper HTTP status code for method not allowed
    echo 'Invalid request method!';
}
?>