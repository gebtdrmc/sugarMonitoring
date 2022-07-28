<?php
/*
This page checks user's login credentials before directing user
to sugarMonitoring.php
This page is deliberately left blank.

*/ 
session_start();
include "dbFunction.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM user
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    
    $_SESSION['user_id'] = $row['userid'];
    $_SESSION['username'] = $row['username'];
   
            
    header("location: sugarMonitoring.php");
} else 
{
    $msg = "<p> You have entered wrong username or password <a href='index.php'>login again</a> </p>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>doLogin</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="js/circle.js" type="text/javascript"></script>
        <style>
        
            header{
                
                background-color: #f2f2f2;
            }
            form .error {
                color: #ff0000;
            }
            body{
                padding: 10px;
            }
            #icon{
                width: 50px;
                height: 50px;
            }
            .form-inline{
                float: right;
                
            }
            input{
                margin: 7px;
            }
            input[type = submit]{
                border-color: green;
            }
            .register-page{
                border-style: outset;
                margin: 50px;
            }
            .form-group{
                padding: 20px;
            }
            h3{
                padding: 20px;
            }
            form:last{
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <header><img src="images/icon.png" alt="" id="icon"/>
           Sugar Monitoring App
           
      
           
     
       </header>
        <?php
        echo $msg;
        ?>
    </body>
</html>