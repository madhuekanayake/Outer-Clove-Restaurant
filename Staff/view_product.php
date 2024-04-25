<?php
require '../Db/connection.php';
include_once './staff_header.php';
session_start();

$database = new connection();

try {
    $conn = $database->getConnection();

   
    $select_sql = "SELECT * FROM product";
    $stmt = $conn->query($select_sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  
    echo 'Error: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>

    <style>
        body{
            background-color:  rgb(220, 196, 182);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Product List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['Product_id']; ?></td>
                <td><?php echo $product['Product_name']; ?></td>
                <td><?php echo $product['Product_price']; ?></td>
                <td><?php echo $product['Product_category']; ?></td>
                <td>
                    <img src="<?php echo $product['Product_image']; ?>" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                </td>
                <td><?php echo $product['product_discrition']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>