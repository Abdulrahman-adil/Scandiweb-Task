<?php
include 'functions/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Product {
    private $connection;
    public function __construct($connection) {
        $this->connection = $connection;
    }

    //Display All Products (GET)
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $this->connection->error);
        }

        return $result;
    }

    // Add new Product (PUT)
    public function addProduct($sku, $name, $price, $type, $size, $weight, $height, $width, $length) {
        // if ($type == 'Furniture'){
        //     $dimensions = $height . ' X ' . $width . ' X ' . $length;
        // } else {
        //     $dimensions = '';
        // }
        $stmt = $this->connection->prepare("INSERT INTO products (sku, name, price, product_type, size, weight, height, width, dimensions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssssssss", $sku, $name, $price, $type, $size, $weight, $height, $width, $length);
            $result = $stmt->execute();
            $stmt->close();
            if (!$result) {
                // Handle the error
                $error = mysqli_error($this->connection);
                error_log("Failed to add product: " . $error);
                return false;
            }
            return true;
        }
   

    }
    
    // Delete the product
    public function deleteProducts($ids) {
        $ids_str = implode(',', $ids);
        $sql = "DELETE FROM products WHERE id IN ($ids_str)";
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $this->connection->error);
        }

        return $result;
    }
}