
<?php
require "dbBroker.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="logIn.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="view.css">
    <title>Document</title>
</head>
<body>
<div class="container center">
          <h1 id="naslov">Cosmetic Studio Mystic</h1>
          <h2 id="podnaslov">Feel the beauty</h2>
      </div>
    <div class="container main-div">
        <div class="div-table">
            <div class="container usluge"><h2>Sve usluge</h2></div>
            <br>
            <div id="displayTypeTable" style="margin-left: 7px; margin-right: 15px;"> 
            <table class="table" style="background-color: #fed6e3; border-radius: 10px;">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Delete</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
          $query="SELECT * FROM `treatment_type`";
          $result=mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result))
          // Add a new option to the combo-box
          echo "<tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td> <button class=' btn btn-delete' onclick='deleteTreatmentType($row[id]);' style='width:80px !important;height:30px; background-color:#fc578b; margin-top:1px; color:white;'>Obriši</button></td>
          </tr>
          ";?>
    
  </tbody> 
        </table></div>
           
        </div>
        <div class="div-stat">
        <div class="usluge">
          
      
    </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
   function  deleteTreatmentType(id){
        $.ajax({
        url: "deleteTreatmentType.php",
        type: 'post',
        data: {
            'deleteSend': id
        },
        success: function(data, status){
            // we want to display data in our html
          
        }
    });
   }
</script>
</body>

</html>