<?php

include 'header.php';

// Include your database connection code here
include 'db_config.php';

$dbconn = getOracleConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $dbconn) {
    $productId = $_POST['productId'];

    $sql = 'DELETE FROM PRODUCT WHERE PRODUCTID = :productId';
    $stmt = oci_parse($dbconn, $sql);

    oci_bind_by_name($stmt, ':productId', $productId);

    if (oci_execute($stmt)) {
        echo "Product deleted successfully.";
    } else {
        $e = oci_error($stmt);
        echo "Error deleting product: " . htmlentities($e['message'], ENT_QUOTES);
    }

    oci_free_statement($stmt);
    oci_close($dbconn);
} else {
    echo "Failed to connect to Oracle database.";
}
?>

