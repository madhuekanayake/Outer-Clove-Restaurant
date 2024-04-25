<?php
// Include the connection class
include_once '../Db/connection.php';
include './header.php';

if (isset($_POST['submit'])) {
    // Create a new connection instance
    $connection = new connection();
    $conn = $connection->getConnection();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table_bookings (name, email, date, time, guests, special_request) VALUES (:name, :email, :date, :time, :guests, :specialRequest)");

    // Bind parameters from the form
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':date', $_POST['date']);
    $stmt->bindParam(':time', $_POST['time']);
    $stmt->bindParam(':guests', $_POST['guests']);
    $stmt->bindParam(':specialRequest', $_POST['specialRequest']);

    // Execute the query
    try {
        $stmt->execute();
        echo "Table booked successfully!";
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    // Close the connection
    $conn = null;
}
?>