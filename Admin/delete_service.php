<?php
include '../Db/connection.php';

$database = new connection(); // Create an instance of your Database class

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_service'])) {
    try {
        $conn = $database->getConnection();

        // Get the service ID to be deleted
        $service_id = $_POST['service_id'];

        // Prepare and execute SQL query to delete the service
        $delete_sql = "DELETE FROM service WHERE service_id = :service_id";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(':service_id', $service_id);
        $stmt->execute();

        // Redirect back to the page displaying services after deletion
        header("Location: manage_service.php");
        exit();
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo 'Error: ' . $e->getMessage();
    }
}
?>