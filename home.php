<?php
session_start();
if($_SESSION['email']){
            // // Create connection
            // $conn =new mysqli("localhost", "root", "", "employee");

            // // //Check connection
            // // if ($conn->connect_error){
            // //     die("Connection failed:" .$conn->connect_error);
            // // }

            // $sql = "SELECT * FROM photo ";
            // $obj = $conn->query($sql);

            $obj = array("1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg","11.jpg","12.jpg","13.jpg");
            $arrlen = count($obj);
            
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="home_css.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>

    <!-- Header -->
    <div class="header">
    <h1>Hello Baby
        
        <button id="add_photo" type="button" class="btn btn-outline-dark" >Add Photo</button>
        <script type="text/javascript">
            document.getElementById("add_photo").onclick = function () {
                location.href = "add_photo.php";
            };
        </script>
        <button id="delete_photo" type="button" class="btn btn-outline-dark" >Delete Photo</button>
        <script type="text/javascript">
            document.getElementById("delete_photo").onclick = function () {
                location.href = "delete.php";
            };
        </script>
        <button id="logout" type="button" class="btn btn-outline-dark" >Logout</button>
        <script type="text/javascript">
                document.getElementById("logout").onclick = function () {
                    location.href = "logout.php";
                };
        </script>
    </h1>

    <!-- <p>Resize the browser window to see the responsive effect.</p> -->
    </div>

    <div>
        <!-- Photo Grid -->
        <div class="container container-fluid">
            <div class="row">
                <?php
                    for($x = 0; $x < $arrlen; $x++)
                    {
                    ?>

                <div class="col-md-3 col-sm-6 col-xs-12 mt-5 mr-5">
                    <img style="width:100%;height:300px;border-radius:5%;" src="images/surya/<?php echo $obj[$x];?>" alt="">
                </div>

                <?php
                    }
                ?>
            </div>
        </div>

    </div>
    </body>
    </html>


<?php
    
}else{
    header('Location: index.php');
}
?>
