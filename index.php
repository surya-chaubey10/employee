
<?php
include('login.html');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Create connection
        $conn =new mysqli("localhost", "root", "", "employee");

        //Check connection
        if ($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }else{
            echo "Connected successfully<br>";
        }


    if(isset($_POST["email"], $_POST["password"])) 
        {     

            $email = $_POST["email"]; 
            $password = $_POST["password"]; 

            $sql = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION['email'] = $email;
                header('Location: home.php');
            }
        
        }else {
            echo "Invalid email or password";
        }
            

}



