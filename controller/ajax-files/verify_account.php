<?php
include ('../../user/config/settings.php');
//Checking account details of user
$url = "https://api.paystack.co/transferrecipient";

$name = test_input($_POST['name']);
$account_number = test_input($_POST['account_number']);
$bank_code = test_input($_POST['bank_code']);
//$currency = test_input($_POST['currency']);

$fields = [
    'type' => "nuban",
    'name' => $name,
    'account_number' => $account_number,
    'bank_code' => $bank_code,
    'currency' => "NGN"
];

$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer ".$paystackAPI,
    "Cache-Control: no-cache",
));

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);

$tranx = json_decode($result);
@$acName_resultApi = $tranx->data->details->account_name;
@$recieptCode_result = $tranx->data->details->recipient_code;
if(strlen($acName_resultApi) == 0){
    $acName_resultApi = "Not found!";
}else{
    $acName_result = $acName_resultApi;
}


header('Content-type: application/json');
$data = array(
    'account_name' => $acName_result,
    'recipient_code' => $recieptCode_result
);
echo json_encode($data);



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}