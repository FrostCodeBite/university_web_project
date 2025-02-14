<?php

    $hostURL = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "haruharu";

    $connection = mysqli_connect($hostURL, $db_username, $db_password, $db_name);

    // if(mysqli_connect_errno()) {
    //     echo "Failed to connect to database with error: ";
    // } else {
    //     echo "Connection successful";
    // }

?>