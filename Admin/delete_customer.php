<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require '../Db/connection.php'; // Adjust the path if needed

    $database = new connection();
    $conn = $database->getConnection();

    // Retrieve the register_id from the form
    $register_id = $_POST['register_id'];

    // Prepare and execute the DELETE query
    $query = "DELETE FROM customer_register WHERE register_id = :register_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':register_id', $register_id);

    if ($stmt->execute()) {
        // Redirect to the page where you display the customers
        header("Location: ./show_allcustomers.php");
        exit();
    } else {
        echo "Error deleting customer";
    }

    $conn = null;
} else {
    echo "Invalid request";
}
?>