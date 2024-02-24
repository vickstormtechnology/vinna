<?php
require_once('../config/database.php');
if(isset($_POST['username'])) {
    $username = test_input($_POST['username']);
//$password = $_POST['password'];
    $email 	  = $_POST['email'];
//$mobile   = $_POST['mobile'];

    $error;
   if (empty($username)) {
        $error = "Username is required";
    } else {

        $alreadyExistVal = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username'");
        if (mysqli_num_rows($alreadyExistVal) == 0) {

            $insertQry = "INSERT INTO `users`(`username`,`email`,`date`) 
	VALUES ('$username','$email', NOW())";

            $qry = mysqli_query($connect, $insertQry);

            if ($qry) {
                $userId = mysqli_insert_id($connect);
                $response['status'] = true;
                $response['message'] = "Registration successful, contact support for authorization key to login.";
//                $response['userId'] = $userId;
            } else {
                $response['status'] = false;
                $response['message'] = "Registration failed";
            }
        } else {
            $response['status'] = false;
            $response['message'] = "Username exist. Please login";
        }

    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response);
}else{
    echo "<h1><center>Unauthorized Gateway</center></h1>";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>