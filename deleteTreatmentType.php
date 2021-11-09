<?php
include "dbBroker.php";
include "TreatmentType.php";

if(isset($_POST['deleteSend'])){
    $delete=$_POST['deleteSend'];
    $ttype=new TreatmentType($_POST['deleteSend']);

}
    
    $status=TreatmentType::deleteTreatmentType($conn, $ttype);
    if($status){
        echo 'Success';
        
    }else{
        echo $status;
        echo "Failed";
    }
?>