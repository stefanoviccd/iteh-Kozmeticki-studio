
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
            alert("Tretman uspešno zakazan!");
            console.log("Dodat tretman");
            location.reload(true);
        }else console.log("Kolokvijum nije dodat "+res);
      
    });

    $req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown);
    } )
};
     function displayTypeData(query){
        var display=query;
        $.ajax({
            url: "displayTypeData.php",
            type: 'post',
            data: {
                'displaySend': display,
              
                
            },
            success: function(data, status){
                // we want to display data in our html
                $('#displayTypeTable').html(data);
    
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

        }
    });

   }
   