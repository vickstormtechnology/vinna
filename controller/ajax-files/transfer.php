<?php
include ('../../user/config/settings.php');
//Checking account details of user
$url = "https://api.paystack.co/transfer";

//$name = test_input($_POST['name']);
//$account_number = test_input($_POST['account_number']);
//$bank_code = test_input($_POST['bank_code']);

$UUID = vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );

$fields = [
    'source' => "balance",
    'amount' => 37800,
    "reference" => $UUID,
    'recipient' => "RCP_y199prkw76k5shx",
    'reason' => "Holiday Flexing"
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
echo $result;











function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}