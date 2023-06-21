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
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $purchasePrice = $_POST['purchasePrice'];
            $quantity = $_POST['quantity'];
            $sql = "UPDATE `product` SET `name`='{$name}',`description`='{$description}',`purchase_price`={$purchasePrice},`quantity`={$quantity} WHERE id={$id}";
            if($conn->query($sql)){
                header("Location: home.php");
            }

        }else{
            $sql = "SELECT * FROM `product` WHERE id = {$_GET['id']}";
            $response = $conn->query($sql);
            $data = $response->fetch_assoc();
        }

    ?>


    <div class="container">
        <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>Update Product</h2>

            <input type="text" hidden name='id' value='<?php echo $data['id']; ?>'>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value='<?php echo $data['name']; ?>'>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description"
                    value='<?php echo $data['description']; ?>'>
            </div>
            <div class="form-group">
                <label for="purchasePrice">Purchase Price:</label>
                <input type="number" class="form-control" id="purchasePrice" name="purchasePrice"
                    value='<?php echo $data['purchase_price']; ?>'>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity"
                    value='<?php echo $data['quantity']; ?>'>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>