<?php
session_start();
require '../Db/connection.php';

if (isset($_POST['submit'])) {
    $database = new connection();
    $conn = $database->getConnection();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer_register WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Password is correct, log in user
            $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the primary key of users table
            header("location:customer_home.php"); // Redirect to the dashboard
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Invalid password. Please try again.');</script>";
            echo "<script>window.location.href='customer_login.php?error=password';</script>";
            exit();
        }
    } else {
        // User not found
        echo "<script>alert('User with this email doesn\'t exist.');</script>";
        echo "<script>window.location.href='customer_login.php?error=email';</script>";
        exit();
    }

    $conn = null;
}
?>