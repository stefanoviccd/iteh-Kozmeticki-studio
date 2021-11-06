<?php
require "dbBroker.php";
require "Treatment.php";
require "TreatmentType.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);
if(isset($_POST['nameSend']))
    
    $ttype=new TreatmentType(null,$_POST['nameSend']);
    $status=TreatmentType::saveTreatmentType($ttype, $conn);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }


?>
