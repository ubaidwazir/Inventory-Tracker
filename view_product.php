<?php 
include 'header.php';

include 'db_config.php';

$dbconn = getOracleConnection();

if ($dbconn) {
    $sql = 'SELECT PRODUCTID, PRODUCTNAME, DESCRIPTION, SKU, PRICE, SUPPLIERID FROM PRODUCT';
    $stmt = oci_parse($dbconn, $sql);

    if (oci_execute($stmt)) {
        echo "<table>";
        echo "<tr><th>Product ID</th><th>Product Name</th><th>Description</th><th>SKU</th><th>Price</th><th>Supplier ID</th></tr>";
        while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : " ") . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        $e = oci_error($stmt);
        echo "Error retrieving products: " . htmlentities($e['message'], ENT_QUOTES);
    }

    oci_free_statement($stmt);
    oci_close($dbconn);
} else {
    echo "Failed to connect to Oracle database.";
}

?>
