<?php
include "dbBroker.php";
include "TreatmentType.php";
// TO EXTRACT ALL SEND VARIABLES
extract($_POST);

if (isset($_POST['idSend']) && isset($_POST['nameSend']) && isset($_POST['priceSend'])) {
    if ($_POST['nameSend'] == "" || $_POST['priceSend'] == "") {
        echo "Failed";
    } else {
        $nameSend = $_POST['nameSend'];

        $priceSend = $_POST['priceSend'];

$ttype=new TreatmentType($idSend, $nameSend, $priceSend);
        $status = TreatmentType::updateTreatmentType($conn, $ttype);
        if ($status) {
            echo 'Success';
        } else {
            echo $status;
            echo "Failed";
        }
    }
}
