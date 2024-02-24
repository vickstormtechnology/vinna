<?php
session_start();
require('../includes/connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}

$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
date_default_timezone_set('Africa/Lagos');

    $my_name = test_input($_POST ['name']);
    $phone = test_input($_POST ['phone']);
    $username = test_input($_POST ['username']);
    $email = test_input($_POST ['email']);
    $country = test_input($_POST ['country']);
    @$gender = test_input($_POST ['gender']);
    $dob = test_input($_POST ['dob']);
    $bankName = test_input($_POST ['bankName']);
    $accountNumber = test_input($_POST ['accountNumber']);
    $accountName = test_input($_POST ['accountName']);
    $routing = test_input($_POST ['routing']);


    //updating database infos

$allowTypes = array('gif', 'jpg', 'png', 'jpeg');
@$extension = end(explode(".", $_FILES["file"]["name"]));

$uploadDir = '../images/profile_pictures/';
@$fileName = basename($_FILES["file"]["name"]);
//$targetFilePath = $uploadDir . $file_name;
@$name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
@$fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if($phone == "" || $username =="" || $email =="" || $country ==""){
    echo 6;
}else{
    if($_FILES["file"]["name"] != ""){
        $file_name = $_FILES["file"]["name"];
        if (empty($_FILES["file"]["name"])) {
            echo 3;//image is empty
        }else if ($_FILES["file"]["size"] > 3000000) {
            echo 4;//Image size cannot be greater than 3MB
        }else{
            if (in_array($fileType, $allowTypes)) {
                $increment = 0;
                $file_name = $name . '.' . $extension;
                while (is_file($uploadDir . '/' . $file_name)) {
                    $increment++;
                    $file_name = $name . $increment . '.' . $fileType;
                }
                // Upload file to the server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $file_name)) {
                    $queri = "UPDATE register SET name ='$my_name', phone ='$phone', country ='$country', gender ='$gender', dob ='$dob', bankName ='$bankName', accountName ='$accountName', accountNumber ='$accountNumber', routingNo ='$routing', profile_picture ='$file_name' WHERE id='$users_id' ";
                    $result = mysqli_query($connect, $queri);
                    if ($result) {
                        echo 1;
                    } else {
                        echo 2;
                    }
                }
            }else{
                echo 5;
            }
        }
    }else {
        $queri = "UPDATE register SET name ='$my_name', phone ='$phone', country ='$country', gender ='$gender', dob ='$dob', bankName ='$bankName', accountName ='$accountName', accountNumber ='$accountNumber', routingNo ='$routing' WHERE id='$users_id' ";
        $result = mysqli_query($connect, $queri);
        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }

}
//password function
function test_input_pass($data) {
    $data = md5($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>