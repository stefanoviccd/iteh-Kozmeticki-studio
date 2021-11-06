<?php
include "dbBroker.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);

if(isset($_POST['idSend']) && isset($_POST['nameSend']) && isset($_POST['datSend']) && isset($_POST['telSend']) && isset($_POST['timeSend']) &&isset($_POST['typeIDSend'])){
    $sql="update treatment set clientsName='$nameSend', clientsPhone='$telSend', date='$datSend', time='$timeSend', treatment_type=$typeIDSend WHERE id=$idSend";
    $result=mysqli_query($conn, $sql);
}
else {
    echo "Failed";
}



?>