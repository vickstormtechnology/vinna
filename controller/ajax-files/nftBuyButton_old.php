<?php
session_start();
require('../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');

$identity = $_POST['id'];



$getrate = "https://api.alternative.me/v2/ticker/?convert=USD";

$price = file_get_contents($getrate);
$result = json_decode($price, true);
$resultETH = json_decode($price, true);

// BTC in USD
$result = $result['data'][1]['quotes']['USD']['price'];

//ETH in USD
$resultETH = $resultETH['data'][1027]['quotes']['USD']['price'];




//    Selecting Unsused btc address from unused_address database
    $query_unused_adress = "SELECT * FROM nft WHERE id = '$identity'";
    $result_unused_adress = mysqli_query($connect, $query_unused_adress);
    $row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
    @$price = $row_unused_adress['price'];
    @$name = $row_unused_adress['name'];
    @$owner = $row_unused_adress['owner'];
    @$currency = $row_unused_adress['currency'];

//echo $price;
    $btc = $currency == "BTC" ? $price * $result : $price * $resultETH;


    header('Content-type: application/json');
    $data = array(
        'id' => $identity,
        'name' => $name,
        'price' => $btc,
        'priceBTC' => $price,
        'currency' => $currency,
        'owner' => $owner
    );
    echo json_encode($data);




?>