<?php
session_start();
$page = "create-admin";
include ("includes/connect.php");

$error = "";
$errorSuccess = "";
if (isset($_POST['register'])) {
    $username = test_input($_POST['username']);
    $pass = test_input_pass($_POST['password']);
    if(empty($username)){
        $error = 'Enter your username.';
    }else if(empty($pass)){
        $error = 'Enter your password.';
    }else {
        $queri = "SELECT * FROM managers WHERE username = '$username' ";
        $resultu = mysqli_query($connect, $queri);
        $counts = mysqli_num_rows($resultu);

        if($counts < 1){
            $paid_query1wApp = "INSERT INTO managers (username, password, date) VALUES ('$username','$pass', NOW())";
            $paidResult = mysqli_query($connect, $paid_query1wApp);

            if ($paidResult) {
                $errorSuccess = "Account Created Successfully";
            }else{
                $error = 'Error creating admin.';
            }
        }else{
            $error = 'Username Already Exist';
        }

    }
}

function test_input($data){
    $data = trim($data);
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
    <title>Vinna (Bot) | Register</title>
    <link rel="apple-touch-icon" href="assets/img/logo/favicon.png" />

    <!-- Core Styles -->
    <link rel="stylesheet" href="assets/css/siqtheme.css">

</head>

<body class="theme-default">

    <div class="login-wrapper">
        <div class="d-flex justify-content-center mt-5">
            <div class="card" id="login-card">

                <div class="card-body">
                    <p style="color: #ff6666"><?= $error; ?></p>
                    <p style="color: #6cb73b"><?= $errorSuccess; ?></p>
                    <form method="post">
                        <div class="text-center pb-3">
                            <h5 class="text-center bold">Create Account</h5>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                            </div>
                            <input required type="text" class="form-control" name="username" placeholder="username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input required type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div>
                            <a href="login.php">Login Admin</a>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-carolina" name="register">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/scripts/jquery.2.2.3.min.js"></script>
    <script src="assets/scripts/siqtheme.js"></script>
    <script src="assets/scripts/pages/pg_login.js" type="text/javascript"></script>
    <?php if(!isset($_SESSION['auth'])) { ?>
    <script>
        let promptValue = prompt('Enter Server Token');
        $(document).ready(function() {
            if(promptValue){
                $.ajax({
                    method:"POST",
                    data: {prompt: promptValue},
                    url: "includes/super-admin.php",
                    success: function(data) {
                        // alert(data);
                        if(data == 1){
                            window.location.reload();
                        }else if(data == 2){
                            alert('Wrong server token, SELF DESTRUCT started...');
                            window.location.href="https://www.google.com/search?q=self+destruction&rlz=1C1RLNS_enNG965NG965&ei=NISUZN_sEISEgAbTi4VI&ved=0ahUKEwjf1prystf_AhUEAsAKHdNFAQkQ4dUDCGs&uact=5&oq=self+destruction&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIHCAAQigUQQzIHCAAQigUQQzIGCAAQBxAeMgYIABAHEB4yBggAEAcQHjIHCAAQigUQQzIGCAAQBxAeMgYIABAHEB4yBggAEAcQHjIGCAAQBxAeOgoIABBHENYEELADSgQIQRgAUP0BWP0BYJ4EaAFwAXgAgAFYiAFYkgEBMZgBAKABAcABAcgBCA&sclient=gws-wiz-serp";
                        }
                    }
                });
            }else{
                alert('Access denied, SELF DESTRUCT started...');
                window.location.href="https://www.google.com/search?q=self+destruction&rlz=1C1RLNS_enNG965NG965&ei=NISUZN_sEISEgAbTi4VI&ved=0ahUKEwjf1prystf_AhUEAsAKHdNFAQkQ4dUDCGs&uact=5&oq=self+destruction&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIHCAAQigUQQzIHCAAQigUQQzIGCAAQBxAeMgYIABAHEB4yBggAEAcQHjIHCAAQigUQQzIGCAAQBxAeMgYIABAHEB4yBggAEAcQHjIGCAAQBxAeOgoIABBHENYEELADSgQIQRgAUP0BWP0BYJ4EaAFwAXgAgAFYiAFYkgEBMZgBAKABAcABAcgBCA&sclient=gws-wiz-serp";
            }
        });
    </script>
    <?php } ?>
</body>
</html>