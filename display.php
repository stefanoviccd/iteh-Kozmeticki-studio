
<?php
include "dbBroker.php";
include "Treatment.php";
include "TreatmentType.php";
extract($_POST);


$num = 1;
$table = '<table class="table " id="sortTable" style="background-color:#a8edea;  box-shadow: 3px 3px 10px grey;"  id="dtOrderExample" ">
    <thead>
      <tr>
        <th scope="col" >Redni Br</th>
        <th><a class="column_sort" id="clientsName" data-order="desc" href="#">Ime i prezime</a></th>
        <th scope="col" >Kontakt</th>
        <th><a class="column_sort" id="date" data-order="desc" href="#">Datum</a></th>
        <th><a class="column_sort" id="time" data-order="desc" href="#">Vreme</a></th>
        <th scope="col">Vrsta usluge</th>
        <th scope="col" data-order="desc" style="padding-left: 67px;">Operacije</th>
      </tr>
    </thead>';


$result = Treatment::getAllTreatment($conn);



if (isset($_POST['displaySend'])) {
  $search = mysqli_real_escape_string($conn, $_POST['displaySend']);
  $result = Treatment::getByValue($search, $conn);
} else {
  $result = Treatment::getAllTreatment($conn);
}

while ($row = mysqli_fetch_assoc($result)) {
  //concaternation
  $id = $row["id"];
  $name = $row["clientsName"];
  $phone = $row["clientsPhone"];
  $date = $row["date"];
  $time = $row["time"];
  $typeId = $row["treatment_type"];
  $treatment_type = TreatmentType::selectById($typeId, $conn);
  $type_name = mysqli_fetch_assoc($treatment_type)['name'];
  $table .= ' <tr>
        <td scope="row">' . $num . '</td>
        <td>' . $name . '</td>
        <td>' . $phone . '</td>
        <td>' . $date . '</td>
        <td>' . $time . '</td>
        <td>' . $type_name . '</td>
        <td style="padding-left: 20px !important;">
        <button class="btn btn-update"  type="button"  onclick="getDetails(' . $id . ')" style="width:80px !important; height:30px;background-color:#00cec3; margin-top:1px; color:white;">Izmeni</button>
        <button class="btn btn-delete"  style="width:80px !important;height:30px; background-color:#00cec3; margin-top:1px; color:white;" onclick="deleteTreatment(' . $id . ')">Odriši</button>
       </td>
   
        
      </tr>';
  $num++;
}
$table .= "</table>";
echo $table;






?>
