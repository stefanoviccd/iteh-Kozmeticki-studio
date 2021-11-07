<?php
include "dbBroker.php";
include "TreatmentType.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);
if(isset($_POST['deleteSend'])){
    $delete=$_POST['deleteSend'];

}
    
    $status=TreatmentType::deleteTreatment($conn, $delete);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
?>