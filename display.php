<?php
include "dbBroker.php";
include "Treatment.php";
include "TreatmentType.php";
extract($_POST);

 
  $num=1;
    $table='<table class="table" style="background-color:#a8edea;">
    <thead>
      <tr>
      <th scope="col">Sl no</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Treatment type</th>
        <th scope="col" style="padding-left: 67px;">Operations</th>
        <th scope="col">Done</th>
      </tr>
    </thead>';
    if(isset($_POST['displaySend'])){
      $search=mysqli_real_escape_string($conn, $_POST['displaySend']);
     $result=Treatment::getByValue($search, $conn);
    }
    else{$result=Treatment::getAllTreatment($conn);}
   
    

   
    while($row=mysqli_fetch_assoc($result)){
        //concaternation
        $id=$row["id"];
        $name=$row["clientsName"];
        $phone=$row["clientsPhone"];
        $date=$row["date"];
        $time=$row["time"];
        $typeId=$row["treatment_type"];
        $treatment_type=TreatmentType::selectById($typeId, $conn);
        $type_name=mysqli_fetch_assoc($treatment_type)['name'];
        $table.=' <tr>
        <td scope="row">'.$num.'</td>
        <td>'.$name.'</td>
        <td>'.$phone.'</td>
        <td>'.$date.'</td>
        <td>'.$time.'</td>
        <td>'.$type_name.'</td>
        <td style="padding-left: 20px !important;">
        <button class="btn-update" onclick="getDetails('.$id.')" style="width:80px !important; height:30px;background-color:#00cec3; margin-top:1px; color:white;">Update</button>
        <button class="btn-delete" onclick="deleteUser('.$id.')" style="width:80px !important;height:30px; background-color:#00cec3; margin-top:1px; color:white;">Delete</button>
       </td>
       <td> <button class="btn-delete" onclick="deleteUser('.$id.')" style="width:80px !important;height:30px; background-color:#fc578b; margin-top:1px; color:white;">Mark</button></td>
        
      </tr>';
      $num++;
    }
    $table.="</table>";
    echo $table;
    




?>