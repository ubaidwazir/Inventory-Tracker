<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to Oracle database (replace with your credentials)
$conn = oci_connect('username', 'password', 'db name');

if (!$conn) {
    $error = oci_error();
    echo "Failed to connect to Oracle: " . $error['message'];
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['PRODUCTNAME'];
    $quantity = $_POST['QUANTITY'];
    $description = $_POST['DESCRIPTION'];
    $sku = $_POST['SKU'];
    $price = $_POST['PRICE'];
    $supplier_id = $_POST['SUPPLIERID'];

    echo "Product Name: " . $product_name . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Description: " . $description . "<br>";
    echo "SKU: " . $sku . "<br>";
    echo "Price: " . $price . "<br>";
    echo "Supplier ID: " . $supplier_id . "<br>";

    // Construct the SQL INSERT statement
    $sql = "INSERT INTO PRODUCTS (PRODUCT_NAME, QUANTITY, DESCRIPTION, SKU, PRICE, SUPPLIER_ID)
            VALUES (:PRODUCTNAME, :QUANTITY, :DESCRIPTION, :SKU, :PRICE, :SUPPLIERID)";
    $stmt = oci_parse($conn, $sql);
    
    if (!$stmt) {
        $error = oci_error($conn);
        echo "Failed to prepare SQL statement: " . $error['message'];
        exit;
    }
    
    // Bind variables
    oci_bind_by_name($stmt, ':PRODUCTNAME', $product_name);
    oci_bind_by_name($stmt, ':QUANTITY', $quantity);
    oci_bind_by_name($stmt, ':DESCRIPTION', $description);
    oci_bind_by_name($stmt, ':SKU', $sku);
    oci_bind_by_name($stmt, ':PRICE', $price);
    oci_bind_by_name($stmt, ':SUPPLIERID', $supplier_id);
    
    // Execute SQL statement
    $result = oci_execute($stmt);
    
    if (!$result) {
        $error = oci_error($stmt);
        echo "Failed to execute SQL statement: " . $error['message'];
        exit;
    }

    echo "Product added successfully!";
    
    oci_free_statement($stmt);
    oci_close($conn);
} else {
    echo "This script should only be accessed via HTTP POST method.";
}
?>
