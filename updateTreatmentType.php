<?php
include "dbBroker.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);

if(isset($_POST['idSend']) && isset($_POST['nameSend']) && isset($_POST['priceSend'])){
    $nameSend=$_POST['nameSend'];

    $priceSend=$_POST['priceSend'];
    
    $sql="update treatment_type set name='$nameSend', price=$priceSend WHERE id=$idSend";
    $status=mysqli_query($conn, $sql);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}




?>