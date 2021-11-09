<?php
include "dbBroker.php";
include "TreatmentType.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);

if(isset($_POST['idSend']) && isset($_POST['nameSend']) && isset($_POST['priceSend'])){
    $nameSend=$_POST['nameSend'];

    $priceSend=$_POST['priceSend'];
    
    
    $status=TreatmentType::updateTreatmentType($conn, $idSend, $nameSend, $priceSend);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}




?>