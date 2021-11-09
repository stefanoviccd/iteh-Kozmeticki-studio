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
<div class="modal fade" id="izmeniTModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmeni tretman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="form-group">
         <div class="mb-3">
      <label for="izmeninaziv" class="form-label">Naziv:</label>
      <input type="text" class="form-control" id="izmeninaziv" value=""  >
        </div>
         <div class="mb-3 sel">
      <label for="izmenicenu" class="form-label">Cena:</label>
      <input type="text" class="form-control" id="izmenicenu" value=""  >
  <input type="hidden" id="hidden">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Otkazi</button>
          <button type="button" class="btn btn-add" onclick="updateTreatmentType()">Izmeni</button>
        </div>
      </div>
    </div>
  </div> 
</div>
    <div class="container center">
        <h1 id="naslov">Cosmetic Studio Mystic</h1>
        <h2 id="podnaslov">Feel the beauty</h2>
    </div>
    <div class="container main-div">

        <div class="div-table">
            <div class="container usluge">
                <h2>Sve usluge</h2>
            </div>
            <br>
            <div id="displayTypeTable" style="margin-left: 7px; margin-right: 15px; width:800px;">
                <table class="table" style="background-color: #fed6e3; border-radius: 10px;  box-shadow: 10px 10px 5px grey;">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Operations</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `treatment_type`";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result))
                            // Add a new option to the combo-box
                            echo "<tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[price]</td>
          <td> <button class=' btn btn-update' onclick='getTypeDetails($row[id]);' style='width:80px !important;height:30px; background-color:#fc578b; margin-top:1px; color:white;'>Izmeni</button>
          <button class=' btn btn-delete' onclick='deleteTreatmentType($row[id]);' style='width:80px !important;height:30px; background-color:#fc578b; margin-top:1px; color:white;'>Obriši</button></td>
          </tr>
          "; ?>

                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="image-div" style="margin-left: 40%; padding-top: 8%;  ">
                <img class="image" src="my.jpg" style=" box-shadow: 10px 10px 5px grey;">
            </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function deleteTreatmentType(id) {
            $req = $.ajax({
                url: "deleteTreatmentType.php",
                type: 'post',
                data: {
                    'deleteSend': id
                },
                success: function(data, status) {


                }
            });
            $req.done(function(res, textStatus, jqXHR) {
                if (res == "Success") {
                    alert("Tretman uspešno obrisan!");
                    console.log("Obrisan tretman");
                    location.reload(true);
                    document.reload(true);

                } else {
                    console.log("Tretman nije obrisan " + res);
                    alert("Postoje zakazani termini za tretman koji želite da obrišete. Operacija nije moguća!");
                }

            });

            $req.fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Sledeca greska se desila> ' + textStatus, errorThrown);
            })
        }
        function getTypeDetails(id){
            $.post("updateTreatmentInfo.php", {id: id}, function(data, status){
       var treatmentid=JSON.parse(data);
       $('#hidden').val(id);
     $('#izmeninaziv').val(treatmentid.name);
       $('#izmenicenu').val(treatmentid.price);
       $('#hidden').val(id);
       

      


   });
   $('#izmeniTModal').modal("show");

        }
        
     function updateTreatmentType(){
        var name=$("#izmeninaziv").val();
        var price=$("#izmenicenu").val();
        var id=$('#hidden').val();
        console.log(name);
        console.log(price);
        console.log(id);
        
    
    
         $req=$.ajax({
            url: "updateTreatmentType.php",
            type: 'post',
            data: {
                'idSend': id,
                'nameSend': name,
                'priceSend': price,
                
                
            },
            success:function(data,status){
               
                
    
            },
            
        });
        $req.done(function(res, textStatus, jqXHR) {
                if (res == "Success") {
                    alert("Tretman uspešno izmenjen!");
                    console.log("Izmenjen tretman");
                    location.reload(true);
                   

                } else {
                    console.log("Tretman nije izmenjen " + res);
                    alert("Operacije javila grešku!");
                }

            });

            $req.fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Sledeca greska se desila> ' + textStatus, errorThrown);
            })
       
    
    




     }
    </script>
</body>

</html>