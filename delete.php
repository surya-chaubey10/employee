<?php
session_start();

if($_SESSION['email']){
    // Create connection
    $conn =new mysqli("localhost", "root", "", "employee");

    //Check connection
    if ($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
    }
    
    if($_POST){
        $pic_del = $_POST['pic_name'];
        $file_loc = "images/surya/" . $pic_del;
        echo $pic_del;
        unlink($file_loc);        
        $sql = "DELETE FROM photo where pic_name = '$pic_del' ";
        $conn->query($sql);
        header('Location: home.php');
        
    }

    $sql = "SELECT * FROM photo";
    $result = $conn->query($sql);

    
}else{
    header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr><?php
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td>
                        <div class="col-md-3 col-sm-6 col-xs-12 mt-5 mr-5">
                            <img style="width:100%;height:300px;border-radius:5%;" src="images/surya/<?php echo $row['pic_name'];?>" alt="">
                        </div>
                    </td>
                    <td>
                    <form action="" method="post" >
                        <input type="hidden" name="pic_name" value="<?php echo $row['pic_name'] ?>" >
                        <button class="btn btn-primary" >Delete</button>
                    </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tr>
        </tbody>
        
    </table>
</body>
</html>