<?php

include('db.php');


if(isset($_SESSION['name'])){
    header("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $encrypted_pass = md5($password);

    $sql = "SELECT id FROM register WHERE name = '{$name}' AND password = '{$encrypted_pass}'";
    
    $response = $conn->query($sql);

    if($response->num_rows == 1){
        $_SESSION['name'] = $name;
        header("Location: http://localhost/shams_sir_project/product/");
    }
}


?>





<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Log In</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="register.php" type="submit" class="btn btn-danger">Dont have
                                    account? Register</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>