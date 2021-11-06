<?php
include 'dbBroker.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="overlay">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="logIn.css">
        <link rel="stylesheet" href="index.css">
       
    <title>Mystic studio</title>
</head>
<body>
<div class="modal fade" id="dodajTerminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Zakaži tretman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="form-group">
         <div class="mb-3">
      <label for="imeprezime" class="form-label">Ime i prezime klijenta:</label>
      <input type="text" class="form-control" id="imeprezime" placeholder="Unesite ime i prezime" >
          </div>
         
          <div class="mb-3">
      <label for="telefon" class="form-label">Kontakt telefon: </label>
      <input type="text" class="form-control" id="telefon" placeholder="Unesite kontakt telefon" >
          </div>
          <div class="mb-3">
      <label for="datum" class="form-label">Datum:</label>
      <input type="date" class="form-control" id="datum" placeholder="Unesite datum" >
          </div>
          <div class="mb-3">
            <label for="vreme" class="form-label">Vreme:</label>
            <input type="time" class="form-control" id="vreme" placeholder="Unesite vreme" >
                </div>
         </div>
         <div class="mb-3 sel">
      <label for="email" class="form-label">Tretman:</label>
      <select name="trmn" id="trmn">
          <?php
          $query="SELECT * FROM `treatment_type`";
          $result=mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result))
          // Add a new option to the combo-box
          echo "<option value='$row[id]'>$row[name]</option>";?>
     
</select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Otkazi</button>
          <button type="button" class="btn btn-add" onclick="addTreatment()">Sacuvaj tretman</button>
        </div>
      </div>
    </div>
  </div> 
  <!--kraj modala dodajTermin -->
  <div class="modal fade" id="izmeniTerminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmeni tretman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="form-group">
         <div class="mb-3">
      <label for="imeprezime" class="form-label">Ime i prezime klijenta:</label>
      <input type="text" class="form-control" id="izmeniip" value="" >
          </div>
         
          <div class="mb-3">
      <label for="telefon" class="form-label">Kontakt telefon: </label>
      <input type="text" class="form-control" id="izmenitelefon"  value=""  >
          </div>
          <div class="mb-3">
      <label for="datum" class="form-label">Datum:</label>
      <input type="date" class="form-control" id="izmenidatum" value=""  >
          </div>
          <div class="mb-3">
            <label for="vreme" class="form-label">Vreme:</label>
            <input type="time" class="form-control" id="izmenivreme" value="" >
                </div>
         </div>
         <div class="mb-3 sel">
      <label for="trmn" class="form-label">Tretman:</label>
      <select name="trmn" id="izmenitrmn">
          <?php
          $query="SELECT * FROM `treatment_type`";
          $result=mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result))
          // Add a new option to the combo-box
          echo "<option id='$row[id]' value='$row[id]'>$row[name]</option>";?>
     
</select>
  <input type="hidden" id="hidden">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Otkazi</button>
          <button type="button" class="btn btn-add" onclick="updateTreatment()">Sacuvaj tretman</button>
        </div>
      </div>
    </div>
  </div> 
  <!--kraj modala izmeniTermin -->
   
      <div class="container center">
          <h1 id="naslov">Cosmetic Studio Mystic</h1>
          <h2 id="podnaslov">Feel the beauty</h2>
      </div>
     
      <div class=" button-container ">
    <button class="btn-zakazi"  type="button" data-bs-toggle="modal" data-bs-target="#dodajTerminModal">Zakaži tretman</button>
</div>


<div class="input-group rounded" style="margin:15px ;">
  <input type="search" id="search"  placeholder="Search" aria-label="Search"
  aria-describedby="search-addon" 
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
  <label style="margin-left: 20px;">Sortiraj po: </label>
  <select style="margin-left: 20px; width: 150px;" id="srtOption">
  <option value="default" >Podrazumevano</option>
    <option value="clientsName" >Ime</option>
    <option value="dateTime">Datum/Vreme</option>
  </select>
  
  


</div>

</div initial-scale="1.0">
     <div id="displayTable" style="margin-left: 15px; margin-right: 15px;"> </div>
</div>
     <script src="logIn.js"></script>
     <script src="main.js"></script>
     <!--Da bi radili modali samo ovo ukljucila -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function(){
   
    displayData(sortingKey);
    $('#search').keyup(function(){
      var search=$(this).val();
      if(search!=''){
        displayData(search);
      }
      else{
        displayData();
      }
    });
});
function getDetails(id){
   
   $.post("updateInfo.php", {id: id}, function(data, status){
       var treatmentid=JSON.parse(data);
       $('#hidden').val(id);
     $('#izmeniip').val(treatmentid.clientsName);
       $('#izmenitelefon').val(treatmentid.clientsPhone);
       $('#izmenidatum').val(treatmentid.date);
       $('#izmenivreme').val(treatmentid.time);
      $('#izmenitrmn').val(treatmentid.treatment_type);


   });
   $('#izmeniTerminModal').modal("show");
}
function updateTreatment(){
        var name=$("#izmeniip").val();
        var tel=$("#izmenitelefon").val();
        var dat=$("#izmenidatum").val();
        var vreme=$("#izmenivreme").val();
        var id=$('#hidden').val();
        var typeID=$('#izmenitrmn').val();
   
        console.log(name);
    console.log(id);
    
        $.ajax({
            url: "updateTreatment.php",
            type: 'post',
            data: {
                'idSend': id,
                'nameSend': name,
                'telSend': tel,
                'datSend': dat,
                'timeSend': vreme,
                'typeIDSend': typeID
                
            },
            success:function(data,status){
                displayData();
                
                
    
            },
            
        });
       
    
    
    }
    function deleteTreatment(id){
    $.ajax({
        url: "deleteTreatment.php",
        type: 'post',
        data: {
            'deleteSend': id
        },
        success: function(data, status){
            // we want to display data in our html
            displayData();

        }
    });

   }

</script>

</body>
</html>