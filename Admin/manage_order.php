<?php

require_once '../Db/connection.php';
include_once './admin_dashboard.php';

try {
    
    $db = new connection();
    $conn = $db->getConnection();
 
    $stmt = $conn->query("SELECT * FROM orders");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $conn = null;
} catch (PDOException $e) {
    
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <style>
        h1{
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Orders</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['id']; ?></td>
            <td><?= $order['name']; ?></td>
            <td><?= $order['email']; ?></td>
            <td><?= $order['phone']; ?></td>
            <td><?= $order['address']; ?></td>
            <td><?= $order['total_amount']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>