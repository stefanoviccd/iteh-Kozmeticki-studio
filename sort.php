
<?php
include "dbBroker.php";
include "Treatment.php";
include "TreatmentType.php";
extract($_POST);

 
 
    $order=$_POST["order"];
    if($order=="asc"){
        $order="desc";
    }
    else{
        $order="asc";
    }
    $query = "SELECT * FROM treatment ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
    $result=$conn->query($query);

  
 $num=1;
    $table='<table class="table " id="sortTable" style="background-color:#a8edea;"  id="dtOrderExample">
    <thead>
      <tr>
        <th scope="col" >Sl no</th>
        <th><a class="column_sort" id="clientsName" data-order="'.$order.'" href="#">Name</a></th>
        <th scope="col" >Phone</th>
        <th><a class="column_sort" id="date" data-order="'.$order.'" href="#">Date</a></th>
        <th><a class="column_sort" id="time" data-order="'.$order.'" href="#">Time</a></th>
        <th scope="col">Treatment type</th>
        <th scope="col" data-order="desc" style="padding-left: 67px;">Operations</th>
        <th scope="col" data-order="desc">Done</th>
      </tr>
    </thead>'; 
    
  
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
        <button class="btn btn-update"  type="button"  onclick="getDetails('.$id.')" style="width:80px !important; height:30px;background-color:#00cec3; margin-top:1px; color:white;">Izmeni</button>
        <button class="btn btn-delete"  style="width:80px !important;height:30px; background-color:#00cec3; margin-top:1px; color:white;" onclick="deleteTreatment('.$id.')">Odriši</button>
       </td>
       <td> <button class="btn btn-delete" onclick="deleteUser('.$id.')" style="width:80px !important;height:30px; background-color:#fc578b; margin-top:1px; color:white;">Postavi</button></td>
        
      </tr>';
      $num++;
    }
    $table.="</table>";
    echo $table;
    
    


  

?>
