<?php
include "dbBroker.php";
include "Treatment.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);
if(isset($_POST['id'])){
$unique=$_POST['id'];

  
    $result=Treatment::getTreatmentById($conn, $unique);
    
    
    $response=array();
    //we want this in array form
    
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);}
    else{
        $response['status']=200;
        $response['message']="Data not found";
    }
