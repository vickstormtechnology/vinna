<?php
session_start();
require('../connect.php');
require('../config/sendDepositToHome.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');

//    $availiableBalance = $_POST['depositBalanceHidden'];
    $cPackage = $_POST['upgradePackage'];
    $investmentAmount = $_POST['investmentAmount'];
    @$fromAccount = $_POST['fromAccount'];
//    @$investOnlyProfitToggler = $_POST['fromAccount'];


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
    $query_unused_adress = "SELECT * FROM plan_setup WHERE planName = '$cPackage' ORDER BY id LIMIT 1";
    $result_unused_adress = mysqli_query($connect, $query_unused_adress);
    $row_unused_adress = mysqli_fetch_assoc($result_unused_adress);
    $dashRCount = mysqli_num_rows($result_unused_adress);
    @$minAmountDB = $row_unused_adress['minInvstAmt'];
    @$maxAmountDB = $row_unused_adress['maxInvstAmt'];
    @$profitMaturityDay = $row_unused_adress['profitMaturityDay'];
    @$planContractTerm = $row_unused_adress['planContractTerm'];
    @$dailyReturnPercentage = $row_unused_adress['dailyReturnPercentage'];
    @$refBonusReturn = $row_unused_adress['refBonusReturn'];



    $query_paid2 = "SELECT * FROM paid WHERE user_id = '$users_id' ";
    @$result_paid2 = mysqli_query($connect, $query_paid2);
    @$paidBefore = mysqli_num_rows($result_paid2);
    @$row_paid2 = mysqli_fetch_assoc($result_paid2);
    $paidPlan = $row_paid2['plan'];
    $dailyIncome = $row_paid2['amount_paid_increment'];
    $amount_paidDB= $row_paid2['amount_paid'];
    $date_of_paymentBD = $row_paid2['date_of_payment'];


    $totalAsset = $amount_paidDB + $depoAmount; //All my assets, both my deposit balance and profit

    if($fromAccount == "Deposit Account"){
        require ("orderScripts/orderFromDeposit.php");
    }
    elseif ($fromAccount == "Profit Account"){
        require ("orderScripts/orderFromProfit.php");
    }
    elseif ($fromAccount == "Compounding"){
        require ("orderScripts/orderFromCompunding.php");
    }
    ?>