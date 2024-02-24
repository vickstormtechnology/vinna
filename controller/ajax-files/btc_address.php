<?php
session_start();
require('../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');

$f_method = $_POST['method'];



if($f_method != 'bitcoin' && $f_method != 'Bitcoin'){
//    Selecting Unsused btc address from unused_address database
    $query_unused_adress = "SELECT * FROM crypto_wallet WHERE walletType = '$f_method' ORDER BY id LIMIT 1";
    $result_unused_adress = mysqli_query($connect, $query_unused_adress);
    $row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
    @$wallet_address = $row_unused_adress['walletAddress'];
    @$qrCode = $row_unused_adress['qrCode'];

    header('Content-type: application/json');
    $data = array(
        'f_method' => $f_method,
        'wallet_address' => $wallet_address,
        'qrCode' => $qrCode,
    );
    echo json_encode($data);

}
else{
    //Selecting Unsused btc address from unused_address database
    $query_unused_adress = "SELECT * FROM crypto_wallet WHERE walletType = '$f_method' ORDER BY RAND()";
    $result_unused_adress = mysqli_query($connect, $query_unused_adress);
    $row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
    @$wallet_address = $row_unused_adress['walletAddress'];
    @$qrCode = $row_unused_adress['qrCode'];


    header('Content-type: application/json');
    $data = array(
        'f_method' => $f_method,
        'wallet_address' => $wallet_address,
        'qrCode' => $qrCode,
    );
    echo json_encode($data);
}



?>