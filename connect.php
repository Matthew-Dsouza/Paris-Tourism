<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];


    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');    
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, userEmail, userPassword)
        values(?, ?, ?, ?)");

        $stmt->bind_param("ssss", $firstName, $lastName, $userEmail, $userPassword);

        $stmt->execute();

        echo "Registration Successful!";

        $stmt->close(); //close the prepare statement

        $stmt->close(); //close the connection

    }

?>