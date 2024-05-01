<?php 
include 'header.php';

require_once 'db_config.php';
require_once 'Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// Fetch the product
$product->productId = isset($_GET['productId']) ? $_GET['productId'] : die();
$product->readOne();

// ... Output product details
?>
