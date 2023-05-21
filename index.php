<?php
include 'functions/Product.php';
session_start();
include 'functions/connection.php';

$product = new Product($connection);

if (isset($_POST['item_delete_multi'])) {
    $ids = $_POST['item_delete_id'];
    $result = $product->deleteProducts($ids);

    if ($result) {
        $_SESSION['status'] = "Data deleted successfully";
    } else {
        $_SESSION['status'] = "Data not deleted successfully";
    }

    header("Location: index.php");
}

$products = $product->getAllProducts();
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
        <form action="index.php " method="POST" class="home_page">
            <div class="title d-flex my-5">
                <h2>Product List</h2>
                 <div class="d-flex gap-2">
                 <a class="btn btn-success" href="./add.php" role="button">Add</a>
                    <button class="btn btn-danger delete-btn" type="submit" name="item_delete_multi">Mass DELETE</button> 
                 </div>

            </div>
            <div class="boxes">
            <?php foreach ($products as $row): ?>
                <div class='card'>
                    <input type='checkbox' 
                            class='form-check-input' 
                            id='exampleCheck1' 
                            name='item_delete_id[]' 
                            value='<?php echo $row['id']; ?>'>
                    <div class='card-body d-flex'>
                        <!-- <span>id  : ?></span> -->
                        <span><?php echo $row['sku']; ?></span>
                        <span><?php echo $row['name']; ?></span>
                        <span>$<?php echo $row['price']; ?></span>
                        <!-- <span><?//php echo $row['product_type']; ?></span> -->
                        <?php if ($row['product_type'] == "DVD-disc"): ?>
                            <span>Size : <?php echo $row['size']; ?> MB</span>
                        <?php elseif ($row['product_type'] == "Book"): ?>
                            <span>Weight : <?php echo $row['weight']; ?> Kg</span>
                        <?php elseif ($row['product_type'] == "Furniture"): ?>
                            <span>Dimensions : 
                            <?php echo $row['dimensions']; ?> X <?php echo $row['height']; ?> X <?php echo $row['width'];?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </form>
        <footer>
            Scandiweb Test Assignment 
        </footer>
    </div>
    <script src="layout/js/script.js"></script>
</body>
</html>