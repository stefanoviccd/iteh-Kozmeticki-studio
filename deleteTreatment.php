<?php
include "dbBroker.php";
include "Treatment.php";

if(isset($_POST['deleteSend'])){
   $treatment =new Treatment($_POST['deleteSend']);
    $result=Treatment::deleteTreatment($conn, $treatment);
    if($result){
        echo "Success";
    }
    else echo "Failed";
}

?>