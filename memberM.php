
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
if(isset($_POST['add'])){
    $mID = $_POST['member_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Sitio = $_POST['sitio'];
   
    $Address = $_POST['address'];
    $Contact = $_POST['contacts'];
 
    
    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];

    if(empty($idM2script)){
        if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
        empty($_POST['address2']) ||empty($_POST['contacts2'])){
    
           
            if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||
            empty($_POST['address']) ||empty($_POST['contacts'])){
                $message = '<label class="text-danger">Fill up all the fields</label>';
            }
            else if($Sitio == "---Select---"){
              
                $message = '<label class="text-danger">Please select sitio</label>';
               
                
               } 
            else{
            
                
            $database->getReference("Members/" . $mID )
               ->set([
                   
                'Firstname' => $Fname,
                'Lastname' => $Lname,
                'Sitio'=> $Sitio, 
                'Address' =>$Address,
                 'Contacts'=> $Contact,
                 'Previous_Reading' => "0",
                 'Current_Reading' => "0",
                 'Balance' => "0",
                 'Membership_Fee' => "250",
                 'Payment_Status' => "Unpaid",
                 'Member_Status' => "Active",
                 'Meter_Status' => "Working",
                 'Penalty' => "0",
                 
                    
                  ]);
                }
    
        }
    }
    else{
        if($idM2 != $idM2script){
            $message = '<label class="text-danger">Please use the edit button!</label>';
        }
    }
 
    }
$newgetkey = $database->getReference('Members')->getChildKeys();
    $newi = 0;
    
    foreach ($newgetkey as $newkey){
       
        $i++;
      
    }
    
    $newnumID = preg_replace('/[^0-9.]+/', '', $newkey);
    $newturntoIntID = (int)$newnumID;
    $newturntoIntID = $newturntoIntID+1;
    $newstrID ="SWA-";
    $newmemberID = $newstrID . $newturntoIntID;

    
if(isset($_POST['edit'])){
    $mID = $_POST['member_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Sitio = $_POST['sitio'];
    $Address = $_POST['address'];
    $Stat = $_POST['stat'];
    $MStat = $_POST['meterstat'];
    $Contact = $_POST['contacts'];
    $Balance = $_POST['balance'];
    $Prev = $_POST['prev'];
    $Cur = $_POST['cur'];
    $Memfee = $_POST['memfee'];
    $PayStat = $_POST['paystat'];
    $Penalty = $_POST['penalty'];
    if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
    empty($_POST['address2']) ||empty($_POST['contacts2'])){

       
        if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||
        empty($_POST['address']) ||empty($_POST['contacts'])){
            $message = '<label class="text-danger">Fill up all the fields</label>';
        }
        else if($Sitio == "---Select---"){
          
            $message = '<label class="text-danger">Please select sitio</label>';
           
            
           } 
        else{
        
            
        $database->getReference("Members/" . $mID )
           ->set([
               
               'Firstname' => $Fname,
               'Lastname' => $Lname,
               'Sitio'=> $Sitio, 
               'Address' =>$Address,
                'Contacts'=> $Contact,
                'Balance' =>$Balance,
                'Previous_Reading'=> $Prev,
                'Current_Reading'=> $Cur,
                'Membership_Fee'=> $Memfee,
                'Payment_Status'=> $PayStat,
                'Penalty'=> $Penalty,
                'Member_Status'=> $Stat,
                'Meter_Status'=> $MStat,
                
                
                
              ]);
            }

    }
}
if(isset($_POST['delete'])){
    $idM2script2 = $_POST['IDM2script'];
    if(empty($idM2script2)){
     
        echo "Please click the search member_id/click the table!";
     
    }
    else{
        
        $referenceMemberToDelete = $database->getReference('Members')->getChild($idM2script2);

        $referenceMemberToDelete->remove();
        $newgetkey = $database->getReference('Members')->getChildKeys();
    $newi = 0;
    
    foreach ($newgetkey as $newkey){
       
        $i++;
      
    }
    
    $newnumID = preg_replace('/[^0-9.]+/', '', $newkey);
    $newturntoIntID = (int)$newnumID;
    $newturntoIntID = $newturntoIntID+1;
    $newstrID ="SWA-";
    $newmemberID = $newstrID . $newturntoIntID;

    }
   

}
?>