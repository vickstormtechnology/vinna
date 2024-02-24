<?php
session_start();
require('../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');

$cPackage = $_POST['package'];



//    Selecting Unsused btc address from unused_address database
    $query_unused_adress = "SELECT * FROM plan_setup WHERE planName = '$cPackage' ORDER BY id LIMIT 1";
    $result_unused_adress = mysqli_query($connect, $query_unused_adress);
    $row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
    @$minAmount = $row_unused_adress['minInvstAmt'];
    @$maxAmount = $row_unused_adress['maxInvstAmt'];

    function minDepo($minAmount) {
        return '$' . number_format($minAmount, 0);
    }
    function maxDepo($maxAmount) {
        return '$' . number_format($maxAmount, 0);
    }

    header('Content-type: application/json');
    $data = array(
        'minAmount' => minDepo($minAmount),
        'maxAmount' => maxDepo($maxAmount),

        'minAmount2' => $minAmount,
        'maxAmount2' => $maxAmount,
        'package' => $cPackage,
    );
    echo json_encode($data);




?>