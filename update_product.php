<?php
 
include 'header.php';

// Include your database connection code (e.g., db_config.php) here
include 'db_config.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the product ID and other fields from the form
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $supplierId = $_POST['supplierId'];
    $quantity = $_POST['quantity']; // New QUANTITY field

    // Construct the SQL UPDATE statement
    $sql = 'UPDATE PRODUCT SET PRODUCTNAME = :productName, DESCRIPTION = :description, SKU = :sku, PRICE = :price, SUPPLIERID = :supplierId, QUANTITY = :quantity WHERE PRODUCTID = :productId';

    // Prepare the statement
    $stmt = oci_parse($dbconn, $sql);

    // Bind the parameters
    oci_bind_by_name($stmt, ':productId', $productId);
    oci_bind_by_name($stmt, ':productName', $productName);
    oci_bind_by_name($stmt, ':description', $description);
    oci_bind_by_name($stmt, ':sku', $sku);
    oci_bind_by_name($stmt, ':price', $price);
    oci_bind_by_name($stmt, ':supplierId', $supplierId);
    oci_bind_by_name($stmt, ':quantity', $quantity); // Bind the new QUANTITY parameter

    // Execute the statement
    if (oci_execute($stmt)) {
        echo "Product updated successfully.";
    } else {
        $e = oci_error($stmt);
        echo "Error updating product: " . htmlentities($e['message'], ENT_QUOTES);
    }

    // Clean up
    oci_free_statement($stmt);
    oci_close($dbconn);
} else {
    echo "Invalid request.";
}
?>
