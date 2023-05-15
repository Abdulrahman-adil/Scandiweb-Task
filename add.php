<?php 
$suk = "";
$name = "";
$price = "";
if(isset($_POST['type'])) {
    $type = $_POST['type'];
} else {
    $type = "";
}
if(isset($_POST['sku'])) {
    $sku = $_POST['sku'];
} else {
    $sku = "";
}

if ($type == "DVD-disc") {
    $size = $_POST['size'];
    $sql = "INSERT INTO products (sku, name, price, product_type, size) VALUES ('$sku', '$name', '$price', '$type', '$size')";
} else if ($type == "Book") {
    $weight = $_POST['weight'];
    $sql = "INSERT INTO products (sku, name, price, product_type, weight) VALUES ('$sku', '$name', '$price', '$type', '$weight')";
} else if ($type == "Furniture") {
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $dimensions = "$height x $width x $length";
    $sql = "INSERT INTO products (sku, name, price, product_type, dimensions) VALUES ('$sku', '$name', '$price', '$type', '$dimensions')";
} else {
    $sql = "SELECT id, sku, name, price, product_type, size, weight, dimensions FROM products ORDER BY id ASC";}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="layout/css/style.css">
    <title>Assignment</title>
</head>
<body>
    <div class="container"> 
        <div class="title d-flex my-5">
            <h2>Product Add</h2>
            <div class="buttons">
                <button onclick="submitForm()" class="btn btn-success" type="button">Save</button>
                <a class="btn btn-danger" href="./home.php">Cancel</a>
            </div>
        </div>
        <div class="form" >
        <form method="post" id="product-form">
                <div class="mb-3 same">
                    <label for="suk" class="form-label">SUK</label>
                    <input type="text" class="form-control" id="suk" name="suk" value="<?php echo $suk?>">
                </div>
                <div class="mb-3 same">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">
                </div>
                <div class="mb-3 same">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="number" value="<?php echo $price?>">
                </div>
                <div class="mb-3 same">
                    <label for="type" class="form-label">Type Switcher</label>
                    <select class="form-control" id="ProductType" name="type">
                        <option value="">Select Product Type</option>
                        <option value="DVD-disc">DVD-disc</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
                <div class="mb-3 same" id="size-field" style="display:none;">
                    <label for="size" class="form-label">Size (in MB)</label>
                    <input type="number" class="form-control" name="size" id="size" value="<?php echo $size?>">
                </div>

                <div class="mb-3 same" id="weight-field" style="display:none;">
                    <label for="weight" class="form-label">Weight (in Kg)</label>
                    <input type="number" class="form-control" name="weight" id="weight" value="<?php echo $weight?>">
                </div>

                <div class="mb-3 same" id="dimensions-field" style="display:none;">
                    <label for="height" class="form-label">Height (in cm)</label>
                    <input type="number" class="form-control" name="height" id="height" value="<?php echo $height?>">
                    <label for="width" class="form-label">Width (in cm)</label>
                    <input type="number" class="form-control" name="width" id="width" value="<?php echo $width?>">
                    <label for="length" class="form-label">Length (in cm)</label>
                    <input type="number" class="form-control" name="length" id="length" value="<?php echo $length?>">
                </div>
        </form> 
        </div>
        <footer>
            Scandiweb Test Assignment
        </footer>
    </div>
    <script src="layout/js/script.js"></script>
</body>
</html>