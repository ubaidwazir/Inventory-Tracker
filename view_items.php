<!-- view_items.php -->
<?php
// Connect to Oracle database (replace with your credentials)
$conn = oci_connect('username', 'password', 'db name');

// Query to retrieve all products
$sql = "SELECT * FROM products";
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);

echo "<h2>Inventory Items</h2>";
echo "<table border='1'>";
echo "<tr><th>Product ID</th><th>Product Name</th><th>Price</th></tr>";

while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . $row['PRODUCT_ID'] . "</td>";
    echo "<td>" . $row['PRODUCT_NAME'] . "</td>";
    echo "<td>" . $row['PRICE'] . "</td>";
    echo "</tr>";
}

echo "</table>";

oci_free_statement($stmt);
oci_close($conn);
?>
