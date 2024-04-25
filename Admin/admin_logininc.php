<?php
require '../Db/connection.php';

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new connection(); // Create an instance of your Database class

    try {
        $conn = $database->getConnection();

        $login_sql = "SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1";
        $stmt = $conn->prepare($login_sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['user_id'] = $row['user_id']; // Store user_id in the session
            header('location: admin_dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = 'Invalid username or password.';
            header('location: admin_login.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Internal server error.';
        header('location: login.php');
        exit();
    }
}
?>
