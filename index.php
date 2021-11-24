<?php

include('login.php');

?>
<!DOCTYPE html>
<html lang="en">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css'">
    </head>
    <body scroll="no" style="overflow: hidden">
    <div class="background">
    <div class="contain">
         
            <form action ="index.php" method="post">
            <?php if (isset($_GET['error'])){?>
            <p class ="error"><?php echo $_GET['error']; ?></p>
            <br>
            <?php } ?>
            <center>  <div class="logo"><img src="logo.png" width="200" height="200"></div>
                <div class="txt_field">
                <input type="text" name="username" class="uname" placeholder="Username" required>
                <span></span>
  
                </div>
                <div class="txt_field">
                <input type="password" name="password" class="pass" placeholder="Password" required>
                <span></span>
              
                </div>
                 <a class="forgot" href="www.google.com">Forgot Password?</a>
               
                <button name="login" class="loginbtn">Login</button>
                </center>
                </div>
        
            </form>
        
        </div>
       

 

    </body>
    </html>

 
 