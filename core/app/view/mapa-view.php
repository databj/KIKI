<!DOCTYPE html>
<html>
  <head>
    <title>Waypoints in Directions</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                          
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq8e96biIxn6FnqzvEXqB4WD6d9t6lcM0&callback=initMap">
</script>                         

  
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <div>
        <b>Start:</b>
        <input id="start">
          
        </input>
        <br />
        <b>Waypoints:</b> <br />
        <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br />
        <input  id="waypoints">
        
        </input>
        <br />
        <b>End:</b>
        <input id="end">
       
        </input>
        <input type="hidden" name="auxi" id="auxi" value="" readonly="true"  required />
        <input type="hidden" name="id" id="id" value="<?php $clientes = UserData::getById($_SESSION["user_id"]); echo $clientes->is_dueno;?>" readonly="true"  required />

          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                
                <td><button type="button" style="width: 100%" name="add" id="add" class="btn btn-primary">AÑADIR MAS DESTINOS</button></td>
              </tr>
            </table>
                    
          </div>

          

  <script>




var J = 0;
var aux=0;




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

      
    })
</script>

    
      
        <br />
        <button type="submit" id="submit" >GRAFICAR RUTA</button>
      </div>
      <div id="directions-panel"></div>
    </div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    


  </body>
</html>

<script >


function initMap() {


  navigator.geolocation.getCurrentPosition(function(position){ 
 
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();


    const latit=position.coords.latitude;
    const longit=position.coords.longitude;
 


  
  

    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: { lat: latit, lng: longit },
  });


function prueba(){
  navigator.geolocation.getCurrentPosition(function(position){ 
    console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
      
var parametros = {
            "lat" : position.coords.latitude,
            "lon" : position.coords.longitude
    };

    $.ajax({
        url: './?action=consulta2' ,
        type: 'post' ,
        dataType: 'json',
        data: parametros,
            })

  
         

  new google.maps.Marker({
    position:  { lat: position.coords.latitude, lng: position.coords.longitude },
    label: "Yo",
    map,
    
  });




});


 

}


setInterval(prueba, 5000);
  



  directionsRenderer.setMap(map);
  document.getElementById("submit").addEventListener("click", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });
  
  navigator.geolocation.getCurrentPosition(function(position){ 

    console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);

    });

  });

}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {

  const waypts = [];


  var tabla = $.ajax({
        url:'./?action=rutas',
        dataType:'text',
        async:false
    }).responseText;
    //document.getElementById("divprueba2").innerHTML = tabla;

 var direcciones= JSON.parse(tabla);
for(const property in direcciones){
 console.log(direcciones[property]);
 waypts.push({
        location: direcciones[property]+",cartagena de indias",
        stopover: true,
      });

}


  /*
  for (var i = 0; i <J; i++) {
    if(document.getElementById("auxbusc"+(i+1))){
  const checkboxArray = document.getElementById("auxbusc"+(i+1));


      waypts.push({
        location: checkboxArray.value+",cartagena de indias",
        stopover: true,
      });
    }
  }
    */
  directionsService.route(
    {
      origin: /*document.getElementById("start").value*/"TEMPO EXPRESS"+",cartagena de indias",
      destination: /*document.getElementById("end").value*/"TEMPO EXPRESS"+",cartagena de indias",
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING,
    },
    (response, status) => {
      if (status === "OK" && response) {
        directionsRenderer.setDirections(response);
        const route = response.routes[0];
        const summaryPanel = document.getElementById("directions-panel");
        summaryPanel.innerHTML = "";

        // For each route, display summary information.
        for (let i = 0; i < route.legs.length; i++) {
          const routeSegment = i + 1;
          summaryPanel.innerHTML +=
            "<b>Segmento de Ruta : " + routeSegment + "</b><br>";
          summaryPanel.innerHTML += route.legs[i].start_address +"--> Hasta --> ";
          summaryPanel.innerHTML += route.legs[i].end_address +"<br>";
          summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>" ;
        }
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
}




</script>

<script>
/*
function cargarDatos(){
 var tabla = $.ajax({
        url:'./?action=rutas',
        dataType:'text',
        async:false
    }).responseText;
    //document.getElementById("divprueba2").innerHTML = tabla;

 var direcciones= JSON.parse(tabla);
for(const property in direcciones){
direcciones[property];
}
*/

}


</script>

<div id="divprueba2">DATOS </div>
