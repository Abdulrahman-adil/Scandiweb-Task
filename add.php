<?php
session_start();
include 'functions/Product.php';
include 'functions/connection.php';

// the connection
$product = new Product($connection);

$sku = '';
$name = '';
$price = '';
$type = '';
$size = '';
$weight = '';
$height = '';
$width = '';
$length = '';

if (isset($_POST['submit'])) {
    // echo "Form Submitted";
    // var_dump($_POST);
    $sku = $_POST['sku'];
    // echo $sku;
    $name = $_POST['name'];
    // echo $name;
    $price = $_POST['price'];
    $type = $_POST['type'];

    if ($type == 'DVD-disc') {
        $size = $_POST['size'];
    } elseif ($type == 'Book') {
        $weight = $_POST['weight'];
    } elseif ($type == 'Furniture') {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
    }

    $result = $product->addProduct($sku, $name, $price, $type, $size, $weight, $height, $width, $length);

    if ($result) {
        $_SESSION['status'] = "Data added successfully";
        header("Location: index.php");
    } else {
        $_SESSION['status'] = "Data not added successfully";
    }
}
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
        <form action="add.php" method="POST" id="product-form" class="add_page" novalidate>
            <div class="title d-flex my-5">
                <h2>Product Add</h2>
                <div class="buttons">
                    <button onclick="submitForm()" class="btn btn-success" type="submit" name="submit">Save</button>
                    <a class="btn btn-danger" href="./index.php">Cancel</a>
                </div>
            </div>

            <div class="form" >
                <div class="mb-3 same">
                    <!-- <label for="sku" class="form-label">SKU</label> -->
                    <input type="text" class="form-control" id="sku" name="sku" data-error="Pleas enter a valid SKU." required placeholder="Enter SKU" value="<?php echo $sku?>">
                    <div class="alert alert-danger invalid-feedback">Pleas enter SKU.</div>
                </div>
                <div class="mb-3 same">
                    <!-- <label for="name" class="form-label">Name</label> -->
                    <input type="text" class="form-control" id="name" name="name" data-error="Pleas enter a valid name." required placeholder="Enter Name"  value="<?php echo $name?>">
                    <div class="alert alert-danger invalid-feedback">Pleas enter name.</div>
                </div>
                <div class="mb-3 same">
                    <!-- <label for="price" class="form-label">Price</label> -->
                    <input type="number" class="form-control" name="price" id="price" data-error="Pleas enter a valid Price." required placeholder="Enter Price"  value="<?php echo $price?>">
                    <div class="alert alert-danger invalid-feedback">Pleas enter Price.</div>

                </div>
                <div class="mb-3 same">
                    <!-- <label for="ProductType" class="form-label">Type Switcher</label> -->
                    <select class="form-control" id="ProductType" name="type" required data-error="Please select type.">
                        <option value="">Select Product Type</option>
                        <option value="DVD-disc">DVD-disc</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                    <div class="alert alert-danger invalid-feedback">Select Type.</div>

                </div>
                <div class="mb-3 same" id="size-field" style="display:none;">
                    <label for="size" class="form-label"> Size (in MB)</label>
                    <input type="number" class="form-control" name="size" id="size" value="<?php echo $size?>">
                    <span>Please Provide : Size</span>
                </div>

                <div class="mb-3 same" id="weight-field" style="display:none;">
                    <label for="weight" class="form-label">Weight (in Kg)</label>
                    <input type="number" class="form-control" name="weight" id="weight" value="<?php echo $weight?>">
                    <span>Please Provide : Weight</span>
                </div>

                <div class="mb-3 same" id="dimensions-field" style="display:none;">
                    <label for="height" class="form-label">Height (in cm)</label>
                    <input type="number" class="form-control" name="height" id="height" value="<?php echo $height?>">
                    <label for="width" class="form-label">Width (in cm)</label>
                    <input type="number" class="form-control" name="width" id="width" value="<?php echo $width?>">
                    <label for="length" class="form-label">Length (in cm)</label>
                    <input type="number" class="form-control" name="length" id="length" value="<?php echo $length?>">
                    <span>Please Provide : Dimensions</span>
                </div>
            </div>
            <div class="alert alert-danger mt-3" id="validation-errors" style="display: none;"></div>

        </form>
        <footer>
            Scandiweb Test Assignment
        </footer>
    </div>
    <script src="layout/js/script.js"></script>
</body>
</html> 