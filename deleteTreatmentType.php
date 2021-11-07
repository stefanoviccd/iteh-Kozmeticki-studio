<?php
include "dbBroker.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);
if(isset($_POST['deleteSend'])){
    $sql="DELETE  FROM `treatment_type` WHERE id=$deleteSend;";
    $result=mysqli_query($conn, $sql);
}

?>