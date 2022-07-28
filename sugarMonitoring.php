<?php
/*
This page is the main page. It allows user to enter sugar level readings, and view previous entries entered.
This page is deliberately left blank.

*/ 
session_start();

$msg = "";

if(!isset($_SESSION['username']))
{
    header("location: index.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sugar Monitoring</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>
        <script src="js/circle.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/skilltest/getReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var message = "<thread><tr><th>Date</th><th>After-Meals Readings</th><th>Reading</th></tr></thread>";
                        for (i = 0; i < response.length; i++) {
                            message += "<tr><td>" + response[i].readingDate + "</td>"
                                    + "<td>" + response[i].readingTimes + "</td>"
                                    + "<td>" + response[i].readingLvl + "</td></tr>";
                        }
                        $("#readingTable").html(message);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
                
                $("#formReading").submit(function() {                     
                     // complete the code here
                    var time = $("#idSelectedTime").val();
                    var reading = $("#bloodsugarreading").val();
                    var message = "";
                    var readingRes = "";
                    
                    if(reading <= 7.8){
                        readingRes = "normal";
                    } else if (reading <= 11.0){
                        readingRes = "Elevated";
                    } else {
                        readingRes = "High";
                    }
                    
                    message += "Your Reading Entered after " + time + " is " + reading + " mmol/L\n";
                    message += "Sugar Level is: " + readingRes + "\n";
                    message += "Proceed to submit Readings?";
                    
                    
                    
                    confirm(message);
                         
                    return true;
            });
            });
        </script>
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
       <?php if (isset($_SESSION['username'])) { ?>
        <div class="col  col-lg-14 col-md-12">
       <header><img src="images/icon.png" alt="" id="icon"/>
           Sugar Monitoring App
           
      
           <form class="form-inline" method="post" action="doLogOut.php">
                
                <input type="submit" id="btnsignout" value="Sign Out"/>
           </form>
     
       </header>
</div>
        <form id="formReading" method="post" action="insertReading.php">
            <div class="row">
            <div class="col col-2">
            <h2>Blood Sugar Level Readings</h2>
            <hr>
            <b>Reading Taken after:</b><br/>
            <select id="idSelectedTime" name="selecttime">
                <option value="breakfast" selected="">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
            </select><br/>
            Readings are to be taken 2 hours after each meal<br/>
            <b>Blood Sugar Level Readings (in mmol/L):</b>
            <input type="text" id="bloodsugarreading" name="readinglvl"/>
            <input name="enter" type="submit" value="Enter"/>
            
        </form>
        </div>
        <div class="col col-8">
            <table id="readingTable" class="table table-striped table-sm table-bordered">
            </table>
        </div>
        
        </div>
        <?php } ?>
    </body>
</html>
