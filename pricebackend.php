<?php

include('dbcon.php');
$reference = $database->getReference('Price');
if(isset($_POST['update'])){
    $price = $_POST['price'];
    $database->getReference("Price" )
    ->set([
        
        'Regular_Price' => $price,
        
         
         
         
       ]);
     
}

?>