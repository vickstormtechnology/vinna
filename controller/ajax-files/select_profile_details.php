<?php
session_start();
require('../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here

date_default_timezone_set('Africa/Lagos');

    //Echoing the name of the user in the nav bar top
    $query = "SELECT * FROM register WHERE id='$users_id' LIMIT 1";
    @$result12 = mysqli_query($connect, $query);
    @$count22 = mysqli_num_rows($result12);
    @$row = mysqli_fetch_assoc($result12);
    $id = $row ['id'];
    $name = $row ['name'];
    $email = $row ['email'];
    $btc_address = $row['btc_address'];
    $plan = $row['plan'];
    $wallet_type = $row['wallet_type'];


header('Content-type: application/json');
$data = array(
    'id' => $id,
    'name' => $name,
    'email' => $email,
    'wallet_address' => $btc_address,
    'wallet_type' => $wallet_type,
);
echo json_encode($data);
?>