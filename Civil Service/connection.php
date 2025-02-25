<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "data_management";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if(!$conn){
        die ("connection failed" . mysqli_connect_error);
    }
    else {
        echo "Connected successfully";
    }
?>