<?php

include "dbFunction.php";

$user = $_POST['username'];
$pass = $_POST['password'];
$hei = $_POST['height'];
$wei = $_POST['weight'];

$query = "INSERT INTO user
          (username,height,weight,password) 
          VALUES 
          ('$user',
           '$hei','$wei',SHA1('$pass'))";

$status = mysqli_query($link, $query);

if ($status) {
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='index.php'>login</a>.</p>";
}
else {
    $message = "account creation failed";
}


mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>doRegister page</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
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
           
      
           <form class="form-inline" method="post" action="doLogOut.php">
                
                <input type="submit" id="btnsignout" value="Sign Out"/>
           </form>
     
       </header>
        <?php
        echo $message;
        ?>
    </body>
</html>