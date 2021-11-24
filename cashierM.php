
<?php
include('dbcon.php');
$message='';
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

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $turntoIntID+1;
$strID ="SWA-";
$memberID = $strID . $turntoIntID;
}


if(isset($_POST['pay'])){
    $ID = $_POST['consumer_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $add = $_POST['address'];
    $cont = $_POST['contacts'];
    $balance = $_POST['balance'];
    $sitio = $_POST['sitio'];
    $prev = $_POST['prev_reading'];
    $curr = $_POST['curr_reading'];
    $total = $_POST['total'];
    $mfee = $_POST['mfee'];
    $penalty = $_POST['penalty'];
    $cash = $_POST['cash'];
    $newprev_reading = $_POST['curr_reading'];
    if(empty($Fname) || empty($balance)){
        $message = '<label class="text-danger">Please search ID and click the table!</label>';
    }else{
   if(empty($cash)){
    $message = '<label class="text-danger">Please input cash!</label>';
   }
   else{
       if($cash < $total ){
        $message = '<label class="text-danger">Invalid cash!</label>';
       }else{

    $database->getReference("Members/" . $ID )
    ->set([
    
        'Firstname' => $Fname,
        'Lastname' => $Lname,
        'Sitio'=> $sitio, 
        'Address' =>$add,
         'Contacts'=> $cont,
         'Previous_Reading' => $newprev_reading,
         'Current_Reading' => "0",
         'Balance' => "0",
         'Membership_Fee' => "0",
         'Payment_Status' => "Paid",
         'Member_Status' => "Active",
         'Penalty' => "0",
         
      
      
         
       ]);
    }
    }
    }
}
?>