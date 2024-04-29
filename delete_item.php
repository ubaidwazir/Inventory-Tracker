<!-- delete_item.php -->
<?php
// Connect to Oracle database (replace with your credentials)
$conn = oci_connect('username', 'password', 'db name');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $product_id = $_POST['product_id'];

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE product_id = :product_id";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_execute($stmt);

    echo "Product deleted successfully!";
}

// Display form for selecting product to delete
echo "<h2>Delete Product</h2>";
echo "<form method='post'>";
echo "Product ID: <input type='text' name='product_id'><br>";
echo "<input type='submit' value='Delete'>";
echo "</form>";

oci_free_statement($stmt);
oci_close($conn);
?>
