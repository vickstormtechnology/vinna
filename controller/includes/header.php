<?php
    session_start();
    require('includes/connect.php');
    require('../user/config/settings.php');

if(!isset ($_SESSION['admin_id'])){
    header('location:../manage/login.php');
    //echo "<SCRIPT LANGUAGE='JavaScript'>window.location.href='login.php';</SCRIPT>";
}

$admin_id = $_SESSION['admin_id'];

//Echoing Admin
$queryAdmin = "SELECT * FROM managers WHERE id = '$admin_id' LIMIT 1";
@$resultAdmin = mysqli_query($connect, $queryAdmin);
@$rowAdmin = mysqli_fetch_assoc($resultAdmin);
@$rowAdminUsers = mysqli_num_rows($resultAdmin);
$nameAdmin = $rowAdmin ['names'];


if(@basename($_SERVER['PHP_SELF']) == "planOne.php"){
    require ('../user/config/planOneSetting.php');
}elseif (@basename($_SERVER['PHP_SELF']) == "planTwo.php"){
    require ('../user/config/planTwoSetting.php');
}elseif (@basename($_SERVER['PHP_SELF']) == "planThree.php"){
    require ('../user/config/planThreeSetting.php');
}elseif (@basename($_SERVER['PHP_SELF']) == "planFour.php"){
    require ('../user/config/planFourSetting.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vinenature | Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../<?= $favIcon; ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link href="../sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Full calendar -->
    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/list/main.css' rel='stylesheet' />

    <link rel="stylesheet" href="css/flatpickr.min.css">
    <script src="js/ckeditor/ckeditor.js"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
