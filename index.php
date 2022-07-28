<!DOCTYPE html>
<!--
Allows user to login or register. You can choose to have a separate registration page.
This page is deliberately left blank.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="js/circle.js" type="text/javascript"></script>
        <style>
            header{
                padding: 10px;
                background-color: #f2f2f2;
            }
            form .error {
                color: #ff0000;
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
        </style>
    <div class="col col-lg-14 col-md-12">
       <header><img src="images/icon.png" alt="" id="icon"/>
           Sugar Monitoring App
       
           <form class="form-inline" method="post" action="doLogin.php">
                <input type="text" id="idUsername" name="username" placeholder="Username"/>
                <input type="password" id="idPassword" name="password" placeholder="Password"/>
                <input type="submit" value="Login" name="submit"/>
           </form>
       </header>
</div>
    </head>
    <body>
        <div class="register-page">
            <form class="form-group" method="post" action="doRegister.php">
                <fieldset style="width:500px;">
                    <table>
                        <tr>
                            <td><input type="text" name="username" placeholder="Username"/></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password"/></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="height" placeholder="height in cm"/></td>
                        </tr>
                        <td><input type="number" name="weight" placeholder="weight in kg"/></td>
                    </table>	
                </fieldset>
                <input type="submit" value="Sign Up" name="submit"/>
            </form> 
        </div>
    </body>
</html>
