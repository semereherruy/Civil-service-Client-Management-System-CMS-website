<?php
 
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['username'];
    $password =$_POST['password'];

    $sql = "INSERT INTO login (username, password) VALUES (?,?,?)";

    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("ss", username, password);

    if($stmt->execute()){
        echo "new record added";
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} 

?>