
//zakazivanje termina
function addTreatment(){
    var clientsName=$("#imeprezime").val();
    var date=$("#datum").val();
    var phone=$("#telefon").val();
    var time=$("#vreme").val();
    var ttype=$("#trmn").val();
    console.log(ttype);


   $req= $.ajax({
        url: "addTreatment.php",
        type: 'post',
        data: {
            'nameSend': clientsName,
            'dateSend': date,
            'phoneSend': phone,
            'timeSend': time,
            'ttypeSend': ttype

        }
      
        
    });
    $req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Termin uspešno zakazan!");
            location.reload(true);
        }else{ console.log("Termin nije zakazan -  "+res);
    alert("Neka od polja nisu ispravno popunjena. Pokušajte ponovo.");
    }
      
    });

    $req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Desila se greška >> '+textStatus, errorThrown);
    } )
};
//prikazivanje svih usluga
     function displayTypeData(query){
        var display=query;
        $.ajax({
            url: "displayTypeData.php",
            type: 'post',
            data: {
                'displaySend': display,
              
                
            },
            success: function(data, status){
                // prikazuje podatke unutar navedenog diva
                $('#displayTypeTable').html(data);
    
            }
        });
    }
    //izmena termina
    function updateTreatment(){
        var name=$("izmeniip").val();
        var tel=$("#izmenitelefon").val();
        var dat=$("#izmenidatum").val();
        var vreme=$("#izmenivreme").val();
        var id=$('#hidden').val();
        var typeID=$('$izmenitrmn').val();
   
    
    
        $req=$.ajax({
            url: "updateTreatment.php",
            type: 'post',
            data: {
                'idSend': id,
                'nameSend': name,
                'telSend': tel,
                'datSend': dat,
                'timeSend': vreme,
                'typeIDSend': typeID
                
            }
           
            
        });
        $req.done(function(res, textStatus, jqXHR){
            if(res=="Success"){
            
                alert("Termin uspešno izmenjen!"); 
                  displayData();
              
            }else{ console.log("Termin nije izmenjen -  "+res);
        alert("Neka od polja nisu ispravno popunjena. Pokušajte ponovo.");
        }
          
        });
    
        $req.fail(function(jqXHR, textStatus, errorThrown){
            console.error('Desila se greška >> '+textStatus, errorThrown);
        } )
    
    




     }

    function displayData(query){
 
        var display=query;
        $.ajax({
            url: "display.php",
            type: 'post',
            data: {
                'displaySend': display,
       
             
              
                
            },
            success: function(data, status){
                // we want to display data in our html
                $('#displayTable').html(data);
    
            }
        });
    }
    function updateTreatment(){
        var name=$("izmeniip").val();
        var tel=$("#izmenitelefon").val();
        var dat=$("#izmenidatum").val();
        var vreme=$("#izmenivreme").val();
        var id=$('#hidden').val();
        var typeID=$('$izmenitrmn').val();
   
    
    
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
           location.reload();

        }
    });

   };
  