<?php

include 'header.php';
 
// Include the database connection function directly
include 'db_config.php';

$dbconn = getOracleConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $dbconn) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $supplierId = $_POST['supplierId'];
    $quantity = $_POST['quantity'];

    $sql = 'INSERT INTO PRODUCT (PRODUCTID, PRODUCTNAME, DESCRIPTION, SKU, PRICE, SUPPLIERID, QUANTITY) VALUES (:productId, :productName, :description, :sku, :price, :supplierId, :quantity)';
    $stmt = oci_parse($dbconn, $sql);

    oci_bind_by_name($stmt, ':productId', $productId);
    oci_bind_by_name($stmt, ':productName', $productName);
    oci_bind_by_name($stmt, ':description', $description);
    oci_bind_by_name($stmt, ':sku', $sku);
    oci_bind_by_name($stmt, ':price', $price);
    oci_bind_by_name($stmt, ':supplierId', $supplierId);
    oci_bind_by_name($stmt, ':quantity', $quantity);

    if (oci_execute($stmt)) {
        echo "Product added successfully.";
    } else {
        $e = oci_error($stmt);
        echo "Error adding product: " . htmlentities($e['message'], ENT_QUOTES);
    }

    oci_free_statement($stmt);
    oci_close($dbconn);
} else {
    echo "Failed to connect to Oracle database.";
}
?>
