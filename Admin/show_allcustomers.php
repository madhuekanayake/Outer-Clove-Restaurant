<?php
require '../Db/connection.php';
include './admin_dashboard.php';

// Fetch all customer data
$database = new connection();
$conn = $database->getConnection();

$query = "SELECT * FROM customer_register";
$stmt = $conn->query($query);

if ($stmt) {
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['register_id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['contact_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <form action="./delete_customer.php" method="post">
                            <input type="hidden" name="register_id" value="<?php echo $row['register_id']; ?>">
                            <button type="submit" name="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No records found";
}

$conn = null;
?>