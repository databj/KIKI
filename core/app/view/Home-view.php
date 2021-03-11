


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Solicitud</h4>
  </div>
  <div class="card-content table-responsive">
<div id="calendar">

<Form name="form"action = "pruebainfo.php" method = "post" onsubmit="return confirmation()">

 
      <input type="hidden" name="auxi" id="auxi" value="" readonly="true"  required />


            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Barrio de recogida*</label>
              <div class="col-lg-10">
            <input type="texto" name="start"  id="start"  class="form-control" placeholder="Ingrese el nombre del barrio" size="15" required/>
              </div>
            </div>
           



  
  <div class="form-group">

  <label for="inputEmail1" class="col-lg-2 control-label">Barrio de entrega*</label>
    <div class="col-lg-10">
  <input type="text" name="end" id="end" required class="form-control"  placeholder="Ingrese el nombre del barrio de entrega" size="15"  /> 
  
    </div>
  </div>

   


  <div class="container">
    
    <div class="row col-md-10">
      <div class="form-group">
        
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                
                <td><button type="button" style="width: 100%" name="add" id="add" class="btn btn-primary">AÑADIR MAS DESTINOS</button></td>
              </tr>
            </table>
                    
        

            <input type="button" name="submit" id="submit" class="btn btn-success" value="GRAFICAR"  />
            <div id="total"><h>Su cotización</h></div>
          </div>
    
      </div>
    </div>
  </div>

   
<link rel="stylesheet" type="text/css" href="css/select2.css">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/select2.js"></script>


  <script>




var J = 0;
var aux=0;


function displayRoute(origin, destination, service, display) {
  var waypts = [];
  var mapas=[];
  

  
  for (var i = 0; i <J; i++) {
if(document.getElementById("auxbusc"+(i+1))){

   var  checkboxArray = document.getElementById("auxbusc"+(i+1));

console.log(checkboxArray.value);


      waypts.push({
        location: checkboxArray.value+",cartagena de indias",
        stopover: true
      });
  
}


  }


  service.route({
    origin: document.getElementById('start').value+",cartagena de indias",
    destination: document.getElementById('end').value+",cartagena de indias",
    waypoints: waypts,
    travelMode: 'DRIVING',
    avoidTolls: true
  }, function(response, status) {
    if (status === 'OK') {
      display.setDirections(response);
    } else {
      alert('HA INGRESADO MAL EL NOMBRE DEL BARRIO');
    }
  });
}





$(document).ready(function(){
  



        $('#add').click(function () {
            J++;
            aux++;
                  
  document.getElementById("auxi").value = aux;

            $('#dynamic_field').append('<tr id="row'+J+'">' +
      

                                              '<td><input id="auxbusc'+J+'" name="auxbusc[]" style="width: 100%">'+
                                              '</input></td>'+

                                              
                                       
                                              '<td><button type="button" name="remove" id="'+J+'" class="btn btn-danger btn_remove">X</button></td>' +
                                             '</tr>');

                    $(document).ready(function(){
                        $('#auxbusc'+J).select2();
                      });




                      

        });     
    
        
        $(document).on('click', '.btn_remove', function () {
          aux--;
                
  document.getElementById("auxi").value = aux;

            var id = $(this).attr('id');
           $('#row'+ id).remove();
        });

        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    })
</script>



  <!-- <input type="submit"   class="btn btn-success" id="submit" value="SOLICITAR"  /> -->


</form>

</div>
</div>
</div>
</div>
</div>
