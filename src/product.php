<?php
// Define the abstract Product class
abstract class Product {
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;

    public function __construct($id, $sku, $name, $price, $productType) {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }

    public function getId() {
        return $this->id;
    }

    public function getSku() {
        return $this->sku;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getProductType() {
        return $this->productType;
    }

    abstract public function getDetails();
}

// Define the DVD class
class DVD extends Product {
    protected $size;

    public function __construct($id, $sku, $name, $price, $size) {
        parent::__construct($id, $sku, $name, $price, 'DVD-disc');
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function getDetails() {
        return "Size: {$this->size} MB";
    }
}

// Define the Book class
class Book extends Product {
    protected $weight;

    public function __construct($id, $sku, $name, $price, $weight) {
        parent::__construct($id, $sku, $name, $price, 'Book');
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getDetails() {
        return "Weight: {$this->weight} Kg";
    }
}

// Define the Furniture class
class Furniture extends Product {
    protected $dimensions;

    public function __construct($id, $sku, $name, $price, $dimensions) {
        parent::__construct($id, $sku, $name, $price, 'Furniture');
        $this->dimensions = $dimensions;
    }

    public function getDimensions() {
        return $this->dimensions;
    }

    public function getDetails() {
        return "Dimensions: {$this->dimensions} cm";
    }
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "products";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Read the products from the database
$sql = "SELECT * FROM products";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

// Create an array to store the products
$products = array();

// Create Product objects for each row in the database
while ($row = $result->fetch_assoc()) {
    if ($row['product_type'] == 'DVD-disc') {
        $product = new DVD($row['id'], $row['sku'], $row['name'], $row['price'], $row['size']);
    } else if ($row['product_type'] == 'Book') {
        $product = new Book($row['id'], $row['sku'], $row['name'], $row['price'], $row['weight']);
    } else if ($row['product_type'] == 'Furniture') {
        $product = new Furniture($row['id'], $row['sku'], $row['name'], $row['price'], $row['dimensions']);
    }

    $products[] = $product;
}

// Close the database connection
$connection->close();

// Display the products
foreach ($products as $product) {
    echo "<div class='card' id='card-{$product->getId()}'>" .
         "<input type='checkbox' class='form-check-input' id='checkbox-{$product->getId()}'>" .
         "<div class='card-body d-flex'>" .
         "<span>id: {$product->getId()}</span>" .
         "<span>Sku: {$product->getSku()}</span>" .
         "<span>Name: {$product->getName()}</span>" .
         "<span>Price: {$product->getPrice()}</span>" .
     "<span>Type: {$product->getProductType()}</span>" .
     "<span>Details: {$product->getDetails()}</span>" .
     "</div>" .
     "</div>";}

     