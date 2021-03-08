
<?php
include('login.html');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // // Create connection
        // $conn =new mysqli("localhost", "root", "", "employee");

        // //Check connection
        // if ($conn->connect_error){
        //     die("Connection failed:" .$conn->connect_error);
        // }else{
        //     echo "Connected successfully<br>";
        // }


    if(isset($_POST["email"], $_POST["password"])) 
        {     

            $email = $_POST["email"]; 
            $password = $_POST["password"]; 

            if($email === 'tannu@gmail.com' && $password === 'suryatannu'){
                $_SESSION['email'] = $email;
                header('Location: home.php');
            }else if($email === 'surya007@gmail.com' && $password === 'surya007'){
                header('Location: Personal_portfolio/');
            }else{
                echo "Invalid email or password";
            }
            
        //     $sql = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";

        //     $result = $conn->query($sql);

        //     if ($result->num_rows > 0) {
        //         $_SESSION['email'] = $email;
        //         header('Location: home.php');
                
        //     }
        
        // }else {
        //     echo "Invalid email or password";
         }
            

}



