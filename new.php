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
            <h2>Product Add</h2>
            <div class="buttons">
                <a class="btn btn-success" href="./index.php" role="button">Save</a>
                <!-- <button class="btn btn-danger">Delete</button> -->
            </div>
        </div>
        <div class="form">
        <form>
                <div class="mb-3 same">
                    <label for="SUK" class="form-label">SUK</label>
                    <input type="text" class="form-control" id="SUK">
                </div>
                <div class="mb-3 same">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3 same">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" class="price" id="number">
                </div>
                <div class="mb-3 same">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control">
                        <option value="">test</option>
                    </select>
                </div>
        </form> 
        </div>
        <footer>
            Scandiweb Test Assignment
        </footer>
    </div>
</body>
</html>