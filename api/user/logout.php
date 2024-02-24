<?php
require_once('../config/database.php');

if(isset($_GET['username'])) {
    $username = test_input($_GET['username']);

    $loginqry = "SELECT * FROM `users` WHERE `username`='$username'";
    $qry = mysqli_query($connect, $loginqry);

    if (mysqli_num_rows($qry) > 0) {
        $query = "UPDATE users SET active_session = 0 WHERE username='$username' ";
        $result = mysqli_query($connect, $query);
            $response['status'] = true;
            $response['message'] = "Logout Successful";
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