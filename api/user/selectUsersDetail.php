<?php
require_once('../config/database.php');

if(isset($_GET['username'])) {
    $username = test_input($_GET['username']);

    $loginqry = "SELECT * FROM `users` WHERE `username`='$username'";
    $qry = mysqli_query($connect, $loginqry);
    $userObj = mysqli_fetch_assoc($qry);
    if (mysqli_num_rows($qry) > 0) {
            $response['status'] = true;
            $response['data'] = $userObj;//showing the database array
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

?>