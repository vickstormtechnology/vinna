<?php
session_start();
require('../connect.php');
require('../config/sendDepositToHome.php');
require('../config/emailConfig.php');

if(!isset($_SESSION['users_id'])){
    header('location:../../');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');


$nft_id = $_POST['idNFT'];
$investAmountInput = $_POST['NFTinvestmentAmount'];
$currrencyInput = $_POST['currencyM'];
$fromAccount = $_POST['fromAccount'];
$today = date("Y-m-d H:i:s");
$b = strtotime($today);

$investAmount = preg_replace('/[^a-zA-Z0-9.]/', '', $investAmountInput);

$getrate = "https://api.alternative.me/v2/ticker/?convert=USD";

$price = file_get_contents($getrate);
$result = json_decode($price, true);
$resultETH = json_decode($price, true);

// BTC in USD
$result = $result['data'][1]['quotes']['USD']['price'];

//ETH in USD
$resultETH = $resultETH['data'][1027]['quotes']['USD']['price'];



$query_check = "SELECT * FROM register WHERE id = '$users_id' ";
$resul_check = mysqli_query($connect, $query_check);
$ass_check = mysqli_fetch_assoc($resul_check);
$whoReferredMeId = $ass_check['referrer'];
$n = $ass_check['name'];
$ToEmail = $ass_check['email'];
$userCountry = $ass_check['country'];
$waitTimeForNextInvestment = $ass_check['waitTimeForNextInvestment'];
$lockInvestingViaProfit = $ass_check['lockInvestingViaProfit'];
$lockInvestingViaCompounding = $ass_check['lockInvestingViaCompounding'];

//Deposit
$queryDepo = "SELECT * FROM deposits WHERE user_id = '$users_id' LIMIT 1";
$resultDepo = mysqli_query($connect, $queryDepo);
$row_depo = mysqli_fetch_assoc($resultDepo);
$depoAmount = $row_depo['amount'];
$depoAmountApproved = $row_depo['approved'];


//Plan Setup
$query_unused_adress = "SELECT * FROM nft WHERE id = '$nft_id'";
$result_unused_adress = mysqli_query($connect, $query_unused_adress);
$row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
$dashRCount = mysqli_num_rows($result_unused_adress);
@$priceDB = $row_unused_adress['price'];
@$currencyDB = $row_unused_adress['currency'];
@$nftNameDB = $row_unused_adress['name'];

    $convertCurrency = $currencyDB == "BTC" ? $priceDB * $result :  $priceDB * $resultETH;




$query_paid2 = "SELECT * FROM paid WHERE user_id = '$users_id'";
@$result_paid2 = mysqli_query($connect, $query_paid2);
@$paidBefore = mysqli_num_rows($result_paid2);
@$row_paid2 = mysqli_fetch_assoc($result_paid2);
$dailyIncome = $row_paid2['amount_paid_increment'];
$amount_paidDB= $row_paid2['amount_paid'];
$date_of_paymentBD = $row_paid2['date_of_payment'];



//this will make the investor delay for 7 days in other to b able to invest again
$aTIme = strtotime($date_of_paymentBD);


if($investAmount <= $depoAmount){
    if($dashRCount < 1){
        echo 3; //Invalid investment package, contact support.
    }elseif ($depoAmountApproved == 0){
        echo 2; //say the same thing as the other argument
    }elseif (!is_numeric($investAmount)){
        echo 4; //Only numeric value is allowed
    }elseif ($fromAccount == ""){
        echo 6; //Select an account
    }elseif ($investAmount < $convertCurrency){
        echo 5; //Investment Amount too low for this package.
    }else {
        /**Debiting the deposit amount**/
        $depositBalanceDebit = $depoAmount - @$investAmount;
//        $increaseAmountInvested = $amount_paidDB + $investAmount;//add amount paid in database  to investment amount

        /**Calculating investment percentage**/
        @$amt_paid_percentage1 = ($investAmount / 100) * 0.005; //25 percent of your investment adding 0.83% daily


//        if ($paidBefore < 1) {

            $paid_dep = "UPDATE deposits SET amount = '$depositBalanceDebit' WHERE user_id = '$users_id'";
            $paid_dep = mysqli_query($connect, $paid_dep);

            $paid_query1 = "INSERT INTO nft_collectibles (user_id, art_id, plan, approved, fund_method, amount_paid, amount_paid_increment, amt_percentage, date_of_payment, last_withdrawal_date, date_increment) VALUES ('$users_id','$nft_id','$nftNameDB','1','Investment Deposit','$investAmount','0','$amt_paid_percentage1', NOW(), NOW(), NOW())";
            $paid_result1 = mysqli_query($connect, $paid_query1);

            $paid_query1wApp11 = "INSERT INTO history (user_id, name, type, plan, amount, date_of_cashout) VALUES ('$users_id','$n','Investment Deposit','$nftNameDB','$investAmount', NOW())";
            $paid_result1wApp11 = mysqli_query($connect, $paid_query1wApp11);
//
//            $paid_reg1 = "UPDATE register SET plan = '$cPackage' WHERE id ='$users_id'";
//            $paid_reg1 = mysqli_query($connect, $paid_reg1);
//
//            /**Home History**/
            if ($send_to_home == 'on') {
                $paid_query1wApp = "INSERT INTO home_transaction_history (name, time, amount, type, flag, deposit_medium) VALUES ('$n', NOW(),'$investmentAmount','deposit','$userCountry.png','$fromAccount')";
                $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
            }
//
//            /***Including referral logic if the person has any referrer in his register database****/
//            if ($whoReferredMeId != 0) {
//                //include('../includes/user_referral_logic.php');
//            }
            if ($paid_result1) {
//                echo 1;
                include('mailingSuccessfulNFTInvestment.php');
            }
//        } else {
            //if a user have clicked invest button before
//            $paid_dep = "UPDATE deposits SET amount = '$depositBalanceDebit' WHERE user_id = '$users_id'";
//            $paid_dep = mysqli_query($connect, $paid_dep);
//
//            $paid_query1 = "UPDATE paid SET approved = '1', fund_method = '$fromAccount', amount_paid = '$increaseAmountInvested', amt_percentage = '$amt_paid_percentage1', date_of_payment = NOW(), last_withdrawal_date = NOW(), date_increment = NOW() WHERE user_id='$users_id'";
//            $paid_result1 = mysqli_query($connect, $paid_query1);
//
//            $paid_query1wApp11 = "INSERT INTO history (user_id, approved, name, type, plan, amount, date_of_cashout) VALUES ('$users_id','1','$n','Investment Deposit','$cPackage','$investmentAmount', NOW())";
//            $paid_result1wApp11 = mysqli_query($connect, $paid_query1wApp11);
//
//            $paid_reg1 = "UPDATE register SET plan = '$cPackage' WHERE id ='$users_id'";
//            $paid_reg1 = mysqli_query($connect, $paid_reg1);
//
//            /**Home History**/
//            if ($send_to_home == 'on') {
//                $paid_query1wApp = "INSERT INTO home_transaction_history (name, time, amount, type, flag, deposit_medium) VALUES ('$n', NOW(),'$investmentAmount','deposit','$userCountry.png','Deposit Account')";
//                $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
//            }
//
//            /***Including referral logic if the person has any referrer in his register database****/
//            if ($whoReferredMeId != 0) {
//                //include('../includes/user_referral_logic.php');
//            }
//            if ($paid_result1) {
//                echo 1;
////                include('mailingSuccessfulInvestment.php');
//            }
//        }
    }
}else{
    echo 2;
}
?>