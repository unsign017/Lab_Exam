<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Form Example</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <?php include("header.php"); ?>




    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $purchasePrice = $_POST['purchasePrice'];
            $quantity = $_POST['quantity'];


            $sql = "INSERT INTO `product`(`name`, `description`, `purchase_price`, `quantity`) VALUES ('{$name}','{$description}',{$purchasePrice}, {$quantity})";

            if($conn->query($sql)){
                header("Location: home.php");
            }
        }
    ?>



    <div class="container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>Add Product to Database</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="purchasePrice">Purchase Price:</label>
                <input type="number" class="form-control" id="purchasePrice" name="purchasePrice">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>