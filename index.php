<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Inventory Tracker</h1>
    <div class="container">
        <p>Welcome to the Inventory Tracker system. Use the buttons below:</p>
        <a href="view_items.php" class="btn">View Items</a>
        <a href="add_item.php" class="btn">Add Item</a>

        <!-- New fields for adding a product -->
        <form action="add_item.php" method="post">
            <label for="PRODUCTNAME">Product Name:</label>
            <input type="text" id="PRODUCTNAME" name="PRODUCTNAME" required><br>

            <label for="QUANTITY">Quantity:</label>
            <input type="number" id="QUANTITY" name="QUANTITY" required><br>

            <label for="DESCRIPTION">Description:</label>
            <textarea id="DESCRIPTION" name="DESCRIPTION" rows="4" required></textarea><br>

            <label for="SKU">SKU (Stock Keeping Unit):</label>
            <input type="text" id="SKU" name="SKU" required><br>

            <label for="PRICE">Price:</label>
            <input type="number" id="PRICE" name="PRICE" step="0.01" required><br>

            <label for="SUPPLIERID">Supplier ID:</label>
            <input type="text" id="SUPPLIERID" name="SUPPLIERID" required><br>

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>
