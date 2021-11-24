
<?php
include('UserM.php');
?>
<html>
<head>
   
    <title>User Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/user.css">
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
        <a href ="../index.php">
        <button name="logout" class="button"><b>LOG OUT<b></button><br>
        </a>    
       
</div>
<div class ="inputs">
        <form action ="UserManagement.php" method="post">
        <input type = "hidden" name="IDM2" id = "IDM2" value="<?php echo $newmemberID ?>">
           <input type = "hidden" name = "IDM2script" id= "IDM2script">
          
        <div class="wrapsearchtxt">
             <input type = "text" name="searchIDtxt" class="searchtxt" placeholder="User_ID">
             
            <input type = "submit" name="searchbtn" class="searchbtn" value="Search">
            </div>
            
          
                <br>
                <br>
                <div class="wrapc">
             User_ID:   <input type = "text" name="user_ID" class="searchTerm" id="consumer_id" value="<?php echo $newmemberID ?>" readonly>
             </div>
             <br>
             <div class="wrapf">
             Firstname:     <input type = "text" name="fname" id="fname" class="searchTerm" placeholder="Firstname">
            </div>
             <br>
             <div class="wrapl">
             Lastname:      <input type = "text" name="lname" id="lname" class="searchTerm" placeholder="Lastname">
             <br>
             </div>
             <div class="wraps">
             As:   <select id="as" onchange="" name="as">
                        <option value="---Select---">---Select---</option>
                        <option name="as" value="Reader">Reader</option>
                  
                        <option  name="as" value="Repairman">Repairman</option>
                        </select>
            <br>
            </div>
           
         
        <div class="wrapcontact">
             Contact #: <input type = "text" onkeyup="numbersOnly(this)" name="contacts" id="contacts" maxlength="11" class="searchTerm" placeholder="Contact">
            </div>

    <br>
    <script>
function numbersOnly(input) {
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
    
   <div class="wrapinsert">
   <input type = "submit" name="add" class="insertbtn" value="ADD" data-toggle="modal" data-target="#Adduser">
</div>  

<div class="wrapedit">
   <input type = "submit" name="edit" class="editbtn" value="EDIT">
</div>
<div class="wrapdelete">
   <input type = "submit" name="delete" class="deletebtn" value="DELETE">
   
  
</div>

          
           <div class="wraperror">
        <?php echo $message; ?>
        </div>
            
        </form>
        

          
      
<div class="wraptable">
        

   <div class="table-responsive">
   <table class="content-table" id = "table" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Position</th>
      <th>Address</th>
      <th>Contact</th>
     
     </tr>
     <thead>
     <?php
     if(isset($_POST['searchbtn'])){
      $reference1 = $database->getReference('Users');
      $count=0;
      $forexist = 0;
      $Search_ID = $_POST['searchIDtxt'];
      if(empty($Search_ID)){
         ?>
       
         <?php
         echo "Input User_ID!";
      }
      else{
      foreach ($getkey as $key){
  
         $count++;
      
      if($Search_ID == $key){
         $forexist = $forexist+1;
         $newkey = $key;
         } 
        
     }
    
     if($forexist == 1){
     
$referenceMember = $database->getReference('Users')->getChild($newkey);
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$as = $referenceMember->getChild('as')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();

      
         ?>
         <tr>
         <td><?php echo $newkey; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>

         <td><?php echo $as; ?></td>
       
         <td><?php echo $contactsT; ?></td>
   
       
      
         </tr>
         <script>
    var table = document.getElementById('table');
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            document.getElementById("consumer_id").value = this.cells[0].innerHTML;
            document.getElementById("fname").value = this.cells[1].innerHTML;
            document.getElementById("lname").value = this.cells[2].innerHTML;
            document.getElementById("as").value = this.cells[3].innerHTML;
            document.getElementById("contacts").value = this.cells[4].innerHTML;
           
            document.getElementById("IDM2script").value = this.cells[0].innerHTML;
            
   
        };
    }
  
    </script>
         <?php
         

     }else{
        echo "User_ID doesn't exist!";
     }
   }
}


?>

    </table>
   
   </div>
 
   </div>
    </div>
    </div>

</body> 
<div class="modal fade" id="Adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLabel">Add User</h2>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="" method="POST">
    
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit"  name="newhousehold" class="btn btn-primary">Save changes</button>
    </div>
    </form>
<!-- Form sa loob ng POP UP  -->


  </div>
</div>
</div>



</html>
