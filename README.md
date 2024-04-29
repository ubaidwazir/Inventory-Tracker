# Inventory Tracker

The **Inventory Tracker** is a simple web-based application for managing product inventory. It allows users to add new products, view existing items, and track inventory details. This README provides an overview of the project, installation instructions, and usage guidelines.

## Features

- **Add New Product**:
  - Users can input product details (such as name, quantity, description, SKU, price, and supplier ID) via a form.
  - The data is then inserted into the Oracle database.

- **View Items**:
  - Users can view a list of existing products in the inventory.
  - The list displays essential information about each product.

## Installation

1. **Prerequisites**:
   - Ensure you have PHP and an Oracle database set up.
   - Install the necessary PHP extensions (e.g., `oci8`) for Oracle connectivity.

2. **Clone the Repository**:
   ```
   git clone https://github.com/ubaidwazir/inventory-tracker.git
   cd inventory-tracker
   ```

3. **Database Configuration**:
   - Update the database connection details in `add_item.php` and `view_items.php`.

4. **Web Server Setup**:
   - Configure your web server (e.g., Apache, Nginx) to serve PHP files.
   - Set up virtual hosts or use the built-in PHP server for testing.

5. **Access the Application**:
   - Open the application in your web browser.
   - Use the provided buttons to add new products or view existing items.

## Usage

1. **Add New Product**:
   - Click the "Add Item" button on the home page.
   - Fill in the product details (name, quantity, description, etc.).
   - Submit the form to add the product to the inventory.

2. **View Items**:
   - Click the "View Items" button on the home page.
   - The list of products will be displayed, showing relevant information.

## Contributing

Contributions are welcome! Feel free to submit pull requests or report issues.
