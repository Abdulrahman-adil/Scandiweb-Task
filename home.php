<!-- // show all items -->
<?php
var_dump($_POST)
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
            <h2>Product List</h2>
            <div class="buttons">
                <a class="btn btn-success" href="./add.php" role="button">Add</a>
                <button class="btn btn-danger delete-btn" type="button">Delete</button>
            </div>
        </div>
        <div class="boxes">
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
              $sql = "SELECT * FROM products";
            //   var_dump($sql);
 
              $result = $connection->query($sql);
               
                // var_dump($result);
 
            //   var_dump($result);
             if(!$result){
                die("Invalid query : " . $connection->error);
             }
              
              // read data of each row
              while($row = $result->fetch_assoc()){
                echo "<div class='card' style=''>" .
                     "<input type='checkbox' class='form-check-input' id='exampleCheck1'>" .
                     "<div class='card-body d-flex'>" .
                     "<span>id  : " . $row['id'] . "</span>" .
                     "<span>Sku : " . $row['sku'] . "</span>" .
                     "<span>Name : " . $row['name'] . "</span>" .
                     "<span>Price :  $" . $row['price'] . "</span>" .
                     "<span>Type : " . $row['product_type'] . "</span>";
            
                if ($row['product_type'] == "DVD-disc") {
                    echo "<span>Size : " . $row['size'] . " MB</span>";
                } else if ($row['product_type'] == "Book") {
                    echo "<span>Weight : " . $row['weight'] . " Kg</span>";
                } else if ($row['product_type'] == "Furniture") {
                    echo "<span>Dimensions : " . $row['dimensions'] . " cm</span>";
                }
            
                echo "</div></div>";
            }
             // Close the database connection
          $connection->close();

            ?>
        
        </div>
        <footer>
            Scandiweb Test Assignment 
        </footer>
    </div>
    <script src="layout/js/script.js"></script>
</body>
</html>