<?php
session_start();
require("includes/connect.php");
$error = "";

if (isset($_POST['login'])){
    $username = test_input($_POST ['username']);
    $password = test_input_pass($_POST ['password']);


    //Echoing the name of the user in the nav bar top
        $query = "SELECT * FROM managers WHERE username = '$username' && password = '$password'";
    $result12 = mysqli_query($connect, $query);


    if(mysqli_num_rows($result12) == 1 ){
        $row = mysqli_fetch_assoc($result12);
        $block = $row['blocked'];
        if($block == 0){
            $_SESSION['v_admin_id'] = $row ['id'];
            header('location: index.php');
        }else{
            $error = "Account Suspended!";
        }
    }else{
        $error = "Incorrect Username or Password";
    }
}

function test_input($data){
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input_pass($data) {
    $data = md5($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="assets/img/logo/favicon.png" type="image/x-icon" />
    <title>Vinna (Bot) | Login</title>
    <link rel="apple-touch-icon" href="assets/img/logo/favicon.png" />
    <!-- Core Styles -->
    <link rel="stylesheet" href="assets/css/siqtheme.css">

</head>

<body class="theme-default">

    <div class="login-wrapper">
        <div class="d-flex justify-content-center mt-5">
            <div class="card" id="login-card">
                <div class="card-body text-center">
                    <img class="img-fluid logo-img" style="width: 200px;" src="assets/img/logo/logo.png" alt="logo" />
                </div>
                <div class="card-body">
                    <form method="post">
                        <p style="color: #ff6666"><?= $error; ?></p>
                        <div class="text-center pb-3">
                            <h5 class="text-center bold">Sign-In</h5>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                            </div>
                            <input required type="text" class="form-control" name="username" placeholder="Auth Key">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input required type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="remember">
                                <span class="checkmark"><i class="ti-check"></i></span>
                                Remember
                            </label>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="login" class="btn btn-carolina">Login</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <p><strong>Or login with</strong></p>
                        <button type="button" class="btn btn-outline-primary"><i class="ti-facebook"></i></button>
                        <button type="button" class="btn btn-outline-primary"><i class="ti-twitter"></i></button>
                        <button type="button" class="btn btn-outline-primary"><i class="ti-google"></i></button>
                        <button type="button" class="btn btn-outline-primary"><i class="ti-github"></i></button>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <script src="assets/scripts/siqtheme.js"></script>
    <script src="assets/scripts/pages/pg_login.js" type="text/javascript"></script>
</body>
</html>