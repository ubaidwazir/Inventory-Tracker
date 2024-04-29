<!-- update_item.php -->
<?php
// Connect to Oracle database (replace with your credentials)
$conn = oci_connect('username', 'password', 'db name');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $product_id = $_POST['product_id'];
    $new_price = $_POST['new_price'];

    // Update the product price in the database
    $sql = "UPDATE products SET price = :new_price WHERE product_id = :product_id";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':new_price', $new_price);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_execute($stmt);

    echo "Product updated successfully!";
}

// Display form for updating product price
echo "<h2>Update Product Price</h2>";
echo "<form method='post'>";
echo "Product ID: <input type='text' name='product_id'><br>";
echo "New Price: <input type='number' name='new_price'><br>";
echo "<input type='submit' value='Update'>";
echo "</form>";

oci_free_statement($stmt);
oci_close($conn);
?>
