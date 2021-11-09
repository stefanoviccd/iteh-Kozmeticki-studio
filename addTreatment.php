<?php
require "dbBroker.php";
require "Treatment.php";
require "TreatmentType.php";


if(isset($_POST['nameSend']) && isset($_POST['dateSend']) && isset($_POST['phoneSend']) && isset($_POST['timeSend']) && isset($_POST['ttypeSend'])){
   if($_POST['nameSend']=="" || $_POST['phoneSend']=="" || $_POST['dateSend']=="" || $_POST['timeSend']=="" ){
       echo "Failed";
   }
   else{
    
    $tr=new Treatment(null,$_POST['nameSend'], $_POST['phoneSend'],$_POST['dateSend'],$_POST['timeSend'], $_POST['ttypeSend']);
    $status=Treatment::saveTreatment($tr, $conn);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}
}
