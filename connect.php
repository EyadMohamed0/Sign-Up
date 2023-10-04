<?php

    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if(!empty($username)) {
        if(!empty($email)) {
            if(!empty($password)) {
                $host = "localhost";
                $db_user = "root";
                $db_password = "";
                $dbname = "project2";

                // Create Connection
                $conn = new mysqli($host, $db_user, $db_password, $dbname);

                if(mysqli_connect_error()) {
                    die('Connect Error ('.mysqli_connect_errno().')' .mysqli_connect_error());
                } else {
                    $sql = "INSERT INTO users (username, email, password) values('$username','$email','$password')";
                    if($conn->query($sql)) {
                        echo "You Have Been Signed In Successfully";
                    } else {
                        echo "Error : ". $sql ."<br>". $conn->error;
                    }
                    $conn->close();
                }
            } else {
                echo "Password Should Not Be Empty";
                die();
            }
        } else {
            echo "Email Should Not Be Empty";
            die();
        }
    } else {
        echo "Username Should Not Be Empty";
        die();
    }
?>