<?php
require '../Db/connection.php';
session_start();

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $database = new connection(); // Create an instance of your Database class

    try {
        $conn = $database->getConnection();

        // Prepare the SQL statement for selecting data
        $select_sql = "SELECT * FROM users WHERE user_name = :user_name";
        $stmt = $conn->prepare($select_sql);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify password
            if (password_verify($user_password, $user['user_hashpassword'])) {
                // Password is correct, create session and redirect
                $_SESSION['user_name'] = $user['user_name']; // You may want to store more data in the session
                header('location: staff_dashboard.php');
                exit();
            } else {
                // Incorrect password
                $_SESSION['error'] = 'Incorrect password.';
                header('location: staff_login.php'); // Redirect to login page
                exit();
            }
        } else {
            // User not found
            $_SESSION['error'] = 'User not found.';
            header('location: staff_login.php'); // Redirect to login page
            exit();
        }
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo 'Error: ' . $e->getMessage();
    }
}
?>