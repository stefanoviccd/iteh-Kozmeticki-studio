<?php
require "dbBroker.php";
require "Treatment.php";
require "TreatmentType.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);
if(isset($_POST['nameSend']) && isset($_POST['priceSend']))
    
    $ttype=new TreatmentType(null,$_POST['nameSend'], $_POST['priceSend']);
    
    $status=TreatmentType::saveTreatmentType($ttype, $conn);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }


?>
