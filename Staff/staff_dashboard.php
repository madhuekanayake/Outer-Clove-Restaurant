<?php
include './Staff_header.php';

require '../Db/connection.php';

$database = new connection(); // Create an instance of your Database class

try {
    $conn = $database->getConnection();
    
    // Prepare the SQL statement to fetch all users
    $select_sql = "SELECT * FROM users";
    $stmt = $conn->query($select_sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle any potential database errors
    echo 'Error: ' . $e->getMessage();
}

?>