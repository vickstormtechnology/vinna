<?php
session_start();
require('../includes/connect.php');
require('../config/emailConfig.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here

date_default_timezone_set('Africa/Lagos');

//Select the users name to enable report to the admin
$query = "SELECT * FROM register WHERE id='$users_id' LIMIT 1";
@$result12 = mysqli_query($connect, $query);
@$count22 = mysqli_num_rows($result12);
@$row = mysqli_fetch_assoc($result12);
$id = $row ['id'];
$name = $row ['name'];
$email = $row ['email'];
$password = $row ['password'];

//update password
    $p_old = test_input_pass($_POST ['cpass']);
    $p_new = test_input_pass($_POST ['npass']);
    $r_p_new = test_input_pass($_POST ['vpass']);
    $passmail = $_POST ['vpass'];

    if($p_old != "" && $p_new != "" && $r_p_new != "") {
    if ($p_new == $r_p_new) {
        if($p_old == $password){
            $querie = "UPDATE register SET password ='$r_p_new' WHERE id ='$users_id'";
            $resalte = mysqli_query($connect, $querie);
            if ($resalte) {
                include ('mails/changePassMail.php');
                //echo 1;
            } else {
                echo 4;
            }
        }else{
            echo 5;
        }
    } else {
        echo 3;
    }
}else{
    echo 2;
}


function test_input_pass($data) {
    $data = md5($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>