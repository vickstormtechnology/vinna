<?php
    session_start();
    $pass = "4151342234Vickstorm";
    $adminInput = test_input($_POST['prompt']);

        if($adminInput == $pass){
            $_SESSION['auth'] = 110;
            echo 1;
        }else{
            echo 2;
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
