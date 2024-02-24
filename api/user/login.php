<?php
require_once('../config/database.php');

if(isset($_GET['username']) && isset($_GET['access_key'])) {
    $username = test_input($_GET['username']);
    $access_key = test_input_pass($_GET['access_key']);

    $loginqry = "SELECT * FROM `users` WHERE `username`='$username' && `access_key`='$access_key'";
    $qry = mysqli_query($connect, $loginqry);

    if (mysqli_num_rows($qry) > 0) {
        $query = "UPDATE users SET active_session = 1 WHERE username='$username' ";
        $result = mysqli_query($connect, $query);


        $userObj = mysqli_fetch_assoc($qry);
        if($userObj['blocked'] == 1){
            $response['blocked'] = 1;
        }else if($userObj['active_session'] == 1){
            $response['active'] = 1;
        }else if($userObj['valid_subscriber'] == 0){
            $response['valid'] = 0;
        }else{
            $response['status'] = true;
            $response['message'] = "Login successful";
            $response['data'] = $userObj;//showing the database array
        }

    } else {
        $response['status'] = false;
        $response['message'] = "User not found";
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

function test_input_pass($data) {
    $data = md5($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>