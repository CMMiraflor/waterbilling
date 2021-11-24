<?php
include('dbcon.php');
$message='';
if(isset($_POST['sendannouncement'])){
    $messageAnnouncement = $_POST['msgannouncement'];
   

    if(empty($messageAnnouncement)){
                $message = '<label class="text-danger">Please input announcements</label>';
            }
           
            else{
            
                
            $database->getReference("Announcements")
               ->set([
                  'Default'=> "Default",
                'Announcement' => $messageAnnouncement,
                
                 
                    
                  ]);
                }
    
        }
   
    ?>