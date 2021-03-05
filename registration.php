<?php
session_start();
if($_SESSION['email']){
    include('registration.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Create connection
        $conn =new mysqli("localhost", "root", "", "employee");

        //Check connection
        if ($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }else{
            echo "Connected successfully<br>";
            
        }

        $name = $_POST['name'];  
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            
            echo "New record created successfully!";
            header("Location: home.php");
        }else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
    }
}else{
    header('Location: index.php');
}


