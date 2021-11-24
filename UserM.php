
<?php
include('dbcon.php');
$message='';
$reference = $database->getReference('Users');
$numchild = $database->getReference('Users')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Users')->getChildKeys();
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
    $uID = $_POST['user_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $as = $_POST['as'];
   
    $Contact = $_POST['contacts'];
    $username = strtolower($Fname);
    $new_username = str_replace(' ', '', $username);
    
    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];

    if(empty($idM2script)){
        if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
        empty($_POST['address2']) ||empty($_POST['contacts2'])){
    
           
            if(empty($_POST['user_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['contacts'])){
                $message = '<label class="text-danger">Fill up all the fields</label>';
            }
            else if($as == "---Select---"){
              
                $message = '<label class="text-danger">Please select position</label>';
               
                
               } 
            else{
            
                
            $database->getReference("Users/" . $uID )
               ->set([
                   
                'Firstname' => $Fname,
                'Lastname' => $Lname,
                'Username' => $new_username,
                'as'=> $as, 
                
                 'Contacts'=> $Contact,
                
                 
                    
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
$newgetkey = $database->getReference('Users')->getChildKeys();
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
    $uID = $_POST['user_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $as = $_POST['as'];
    $Contact = $_POST['contacts'];
    $username = strtolower($Fname);
    $new_username = str_replace(' ', '', $username);

    if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
    empty($_POST['address2']) ||empty($_POST['contacts2'])){

       
        if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['contacts'])){
            $message = '<label class="text-danger">Fill up all the fields or Search User_ID</label>';
        }
        else if($as == "---Select---"){
          
            $message = '<label class="text-danger">Please select position</label>';
           
            
           } 
        else{
        
            
        $database->getReference("Users/" . $uID )
           ->set([
               
               'Firstname' => $Fname,
               'Lastname' => $Lname,
               'Username' => $new_username,
               'as'=> $as, 

               'Address' =>$Address,
                'Contacts'=> $Contact,
                
                
                
                
              ]);
            }

    }
}
if(isset($_POST['delete'])){
    $idM2script2 = $_POST['IDM2script'];
    if(empty($idM2script2)){
        $message = '<label class="text-danger">Please click the search user_id/click the table!</label>';
      
     
    }
    else{
        
        $referenceMemberToDelete = $database->getReference('Users')->getChild($idM2script2);

        $referenceMemberToDelete->remove();
        $newgetkey = $database->getReference('Users')->getChildKeys();
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