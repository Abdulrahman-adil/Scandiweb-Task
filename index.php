<!-- // show all items -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Assignment</title>
</head>
<body>
    <div class="container"> 
        <div class="title d-flex my-5">
            <h2>Product List</h2>
            <div class="buttons">
                <a class="btn btn-success" href="./new.php" role="button">Add</a>
                <a class="btn btn-danger" role="button" href="./delete.php">Delete</a>
            </div>
        </div>
        <div class="boxes d-flex">
            <?php
              // Connect to database  
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "mytask";
              // stablish connection 
              $connection = new mysqli($servername, $username, $password,$database);

              // Check Connection
              if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
              }

              // read the row from database table
              $sql = "SELECT * FROM products";
              $res = $connection->query($sql);

              if (!$res) {
                die("Invalid query: " . $connection->error);
              }

              // read data of each row
              while($row = $res->fetch_assoc()){
                print <<<"box"
                    <div class="card" style="width:18rem">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <div class="card-body d-flex">
                        <span>id  : $row[id]</span>
                        <span>Sku : $row[sku]</span>
                        <span>Name : $row[name]</span>
                        <span>Price :  $row[price]$</span>
                        <span>Type : $row[product_type]</span>
                        </div>
                    </div>
                box;
              }
            ?>
        
        </div>
        <footer>
            Scandiweb Test Assignment 
        </footer>
    </div>
</body>
</html>