<?php
include('Homebackend.php');
?>
<html>
<head>
   
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/stylehome.css">
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

<div class ="info">
<div class ="memcount">
<?php
include('dbcon.php');

$reference = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class="echoI"><?php echo $i; ?></h4>
<h4>MEMBER COUNT</h4>
</div>

</div>
<div class = "wrapper">
<form action ="Home.php" method="post">
  <h3>Send Notification</h3>
  <textarea name="msgannouncement" id="" cols="60" rows="10"></textarea>
  <br>
  <br>
  <input type = "submit" name = "sendannouncement" class="searchTermCash" value="SEND ANNOUNCEMENT">
  </form>
</div>

<div class = "defmeter">
<?php
include('dbcon.php');

$reference = $database->getReference('Defective_Meter');
$numchild = $database->getReference('Defective_Meter')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Defective_Meter')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class = "echoI"><?php echo $i; ?></h4>
<h4 class="defmeterh4">DEFECTIVE METERS</h4>
</div>
<div class = "defQR">

<?php
include('dbcon.php');

$reference = $database->getReference('Defective_QR');
$numchild = $database->getReference('Defective_QR')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Defective_QR')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class = "echoI"><?php echo $i; ?></h4>
<h4>DEFECTIVE QR</h4>
</div>
<div class="paid">
<?php 
include('dbcon.php');
$reference1 = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
$numberofpaid=0;
$numpaid = 0;
$Idchar = "SWA-";
  while($numpaid != $i){
    $numpaid = $numpaid+1;
    $newnumpaid = strval($numpaid);
    $newIdchar = $Idchar.$newnumpaid;
$referenceMember = $database->getReference('Members')->getChild($newIdchar);
$paymentstat = $referenceMember->getChild('Payment_Status')->getValue();
if($paymentstat == "Paid"){
$numberofpaid = $numberofpaid + 1;
}
}

}

?>
<h4 class = "echoI"><?php echo $numberofpaid; ?></h4>
<h4>NUMBER OF PAID</h4>
</div>
<div class="unpaid">
<?php 
include('dbcon.php');
$reference1 = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
$numberofpaid=0;
$numpaid = 0;
$Idchar = "SWA-";
  while($numpaid != $i){
    $numpaid = $numpaid+1;
    $newnumpaid = strval($numpaid);
    $newIdchar = $Idchar.$newnumpaid;
$referenceMember = $database->getReference('Members')->getChild($newIdchar);
$paymentstat = $referenceMember->getChild('Payment_Status')->getValue();
if($paymentstat == "Unpaid"){
$numberofpaid = $numberofpaid + 1;
}
}

}

?>
<h4 class = "echoI"><?php echo $numberofpaid; ?></h4>
<h4>NUMBER OF UNPAID</h4>
</div>
<div class ="due">
<?php
include('dbcon.php');
$referencedue = $database->getReference('Due_Date');
$Due = $referencedue->getChild('Due')->getValue();

?>
<h4><?php echo $Due; ?></h3>
</div>

</div>


</body>
</html>