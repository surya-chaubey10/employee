<?php
session_start();
if($_SESSION['email']){
    include('add_photo.html');

    if($_FILES){
        // echo '<pre>';
        // var_dump($_FILES['pic_name']);
        // echo '</pre>';
        // exit();

        // Create connection
        $conn =new mysqli("localhost", "root", "", "employee");

        //Check connection
        if ($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }else{
            echo "Connected successfully<br>";
            
        }
        $target_dir = "images/surya/";
        $target_file = $target_dir . basename($_FILES["pic_name"]["name"]);

        $file_name = basename($_FILES["pic_name"]["name"]);

        //temporary file location name
        $temp_name = $_FILES['pic_name']['tmp_name'];
        
        if (move_uploaded_file($_FILES["pic_name"]["tmp_name"], $target_file)) {
            echo "The file has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $sql = "INSERT INTO photo (pic_name) VALUES ('$file_name')";

        if ($conn->query($sql) === TRUE) {
            header("Location: home.php");
        }else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
    }

}else{
    header('Location: index.php');
}
