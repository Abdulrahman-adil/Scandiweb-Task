<!-- // show all items -->
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
            <h2>Product List</h2>
            <div class="buttons">
                <a class="btn btn-success" href="./add.php" role="button">Add</a>
                <a class="btn btn-danger" role="button" href="./delete.php">Delete</a>
            </div>
        </div>
        <div class="boxes d-flex">
            <?php
              // Connect to database  
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "products";
              // stablish connection 
              $connection = new mysqli($servername, $username, $password,$database);

              // Check Connection
              if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
              }

              // read the row from database table
              $sql = "INSERT INTO products (sku, name, price, product_type, size, weight, dimensions) VALUES ('$sku', '$name', '$price', '$type', '$size', '$weight', '$dimensions')";

              if ($connection->query($sql) === TRUE) {
                  $_SESSION['success'] = "Product added successfully";
                  header("Location: home.php");
              } else {
                  $_SESSION['error'] = "Error: " . $sql . "<br>" . $connection->error;
                  header("Location: add.php");
              }
              
              $connection->close();

              // read data of each row
              while($row = $res->fetch_assoc()){
                echo "<div class='card' style='width:18rem'>";
                echo "<input type='checkbox' class='form-check-input' id='exampleCheck1'>";
                echo "<div class='card-body d-flex'>";
                echo "<span>id  : " . $row['id'] . "</span>";
                echo "<span>Sku : " . $row['sku'] . "</span>";
                echo "<span>Name : " . $row['name'] . "</span>";
                echo "<span>Price :  $" . $row['price'] . "</span>";
                echo "<span>Type : " . $row['product_type'] . "</span>";
                if ($row['product_type'] == "DVD-disc") {
                    echo "<span>Size : " . $row['size'] . " MB</span>";
                } else if ($row['product_type'] == "Book") {
                    echo "<span>Weight : " . $row['weight'] . " Kg</span>";
                } else if ($row['product_type'] == "Furniture") {
                    echo "<span>Dimensions : " . $row['dimensions'] . " cm</span>";
                }
                echo "</div>";
            }

            ?>
        
        </div>
        <footer>
            Scandiweb Test Assignment 
        </footer>
    </div>
</body>
</html>