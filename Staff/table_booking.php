<?php

include_once '../Db/connection.php';
include_once './staff_header.php';


$connection = new connection();
$conn = $connection->getConnection();

$stmt = $conn->query("SELECT * FROM table_bookings");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);


$conn = null;
?>
<h2>Restaurant Table Bookings</h2>
    <table class="bookings-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Special Requests</th>
            </tr>
        </thead>
        <tbody>
        <style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    text-align: center;
}

.bookings-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.bookings-table th, .bookings-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.bookings-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.bookings-table tr:nth-child(even) {
    background-color: #f9f9f9;
}
</style>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?= $booking['id'] ?></td>
                    <td><?= $booking['name'] ?></td>
                    <td><?= $booking['email'] ?></td>
                    <td><?= $booking['date'] ?></td>
                    <td><?= $booking['time'] ?></td>
                    <td><?= $booking['guests'] ?></td>
                    <td><?= $booking['special_request'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>