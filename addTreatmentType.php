<?php
require "dbBroker.php";
require "Treatment.php";
require "TreatmentType.php";

if(isset($_POST['nameSend']) && isset($_POST['priceSend']))
{
  if($_POST['nameSend']=="" || $_POST['priceSend']==""){echo "Failed";}
  else{
    $ttype=new TreatmentType(null,$_POST['nameSend'], $_POST['priceSend']);
    
    $status=TreatmentType::saveTreatmentType($ttype, $conn);
    if($status){
       
      echo 'Success';
        
    }else{
        echo $status;
        echo "Failed";
    }
  }
}



?>
