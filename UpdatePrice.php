<?php
include('pricebackend.php');
?>
<html>
<head>
   
    <title>Update Price</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/updateprice.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">

</div>

<div class="buttondiv">
        <a href ="Home.php">
        <button class="button"><b>HOME<b></button><br>
        </a>
        
        <a href ="cashier.php">
        <button class="button"><b>CASHIER<b></button><br>
        </a>
        <a href ="UserManagement.php">
        <button class="button" ><b>USER MANAGEMENT</button><br>
        </a>
        <a href ="MemberManagement.php">
        <button class="button"><b>MEMBER
        <BR>MANAGEMENT<b></button><br>
         </a>
         
        <a href ="MemberInfo.php">
        <button class="button"><b>MEMBER INFO</button><br>
        </a>
        <a href ="UpdatePrice.php">
        <button class="button"><b>UPDATE PRICE</button><br>
        </a>
        <a href ="Reports.php">
        <button class="button"><b>REPORTS</button><br>
        </a>
        <a href ="index.php">
        <button name="logout" class="button"><b>LOG OUT<b></button><br>
        </a>    
       
</div>

<div class ="inputs">
<form action ="UpdatePrice.php" method="post">
<div class="wrapf">
Price: <input type = "number" name="price" id="price" class="searchTerm" placeholder="Price">
</div>
<div class="wrapinsert">
   <input type = "submit" name="update" class="insertbtn" value="UPDATE PRICE">
</div> 
</form> 
</div>


</body>
</html>