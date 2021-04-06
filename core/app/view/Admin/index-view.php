<!DOCTYPE html>
<html>
  <head>
    <title>Waypoints in Directions</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                          
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq8e96biIxn6FnqzvEXqB4WD6d9t6lcM0&callback=initMap">
</script>    

      <script src="assets/plugins/gmaps/gmaps.js"></script>
      <script src="assets/plugins/gmaps/prettify/prettify.js"></script>
     
  
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

    // Ubicacion Actual 
  navigator.geolocation.getCurrentPosition(function(position){ 
 
  //DIRECCIONADOR Y RENDERIZADOR
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();

      // LATITUD Y LONGITUD 
    const latit=position.coords.latitude;
    const longit=position.coords.longitude;
 


  
  
    //CREACION DEL MAPA CON UBICACION ACTUAL 
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: { lat: latit, lng: longit },
    });



  
  
  //bermudaTriangle.setMap(map);
  //mamonalZona.setMap(map);

  google.maps.event.addListener(map, 'click', function(event) {
    console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(10.3211953,-75.49271639999999), mamonalZona));
  });

      //console.log(map);
    
  
   
   
    //KML DE ZONAS TEMPO 
   // const kmlLayer = new google.maps.KmlLayer();
    
    const src = 'https://www.google.com/maps/d/u/2/kml?forcekml=1&mid=1SnPVlu62Df0qfHsjkX1F0txRVG89fdJ9&lid=cgfLcIGXegc';
    
    const kmlLayer = new google.maps.KmlLayer(src, {
    suppressInfoWindows: true,
    preserveViewport: true,
    zoom: 14
    });

    kmlLayer.setMap(map);

      //ESCUCHA DE CLICK SOBRE KML
   kmlLayer.addListener('click', function(event) {
      
        console.log(kmlLayer);
        console.log(event.featureData);
    });







    



        //UBICACION EN TIEMPO REAL CON MARCADORES 
function prueba(){

        //PETICION PARA UBICACION DE MOTORIZADOS
        var tabla = $.ajax({
                url:'./?action=rastreo',
                dataType:'text',
                async:false
            }).responseText;
            


      //CONVERSION DE VARIABLE A JSON
      const direcciones= JSON.parse(tabla);
      
      //RECORRIDO POR TODOS LOS MENSAJEROS 
      for(const property in direcciones){
       
        //OBTENCION DE SU UBICACION 
        var latMen=parseFloat(direcciones[property]["lat"]);
        var longMen=parseFloat(direcciones[property]["lon"]);

        console.log(latMen+" "+longMen);
       
        

          //CREACION DEL MARCADOR 
          const marker =   new google.maps.Marker({
    
     
            position:  { lat: latMen, lng: longMen},
            map: map,
            
          });
          
       //   console.log(property);
          const infowindow = new google.maps.InfoWindow({
            content: "yo "+direcciones[property]["id_mensajero"],  
          });

          marker.addListener("click", function(event) {
            infowindow.open(map, marker);
          
          });
         
          

  
}




 

}


setInterval(prueba, 30000);
  



  directionsRenderer.setMap(map);

  document.getElementById("submit").addEventListener("click", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });
  
 

  });

}




function calculateAndDisplayRoute(directionsService, directionsRenderer) {
 
        ///////////////////zonas///////////////////77
              
                          const Zona1 = [
                            {lat: 10.418369,lng: -75.5522337},
                            {lat: 10.4152456,lng: -75.551032},
                            {lat:10.4092731,lng: -75.5518689},
                            {lat:10.4016331,lng: -75.55792},
                            {lat:10.397602,lng: -75.5644216},
                            {lat:10.3943518,lng: -75.5618252},
                            {lat:10.3939086,lng: -75.5598941},
                            {lat:10.3939719,lng: -75.5578127},
                            {lat:10.395386,lng: -75.5564394},
                            {lat:10.3909116,lng: -75.5472126},
                            {lat:10.3916292,lng: -75.5453887},
                            {lat:10.3978975,lng: -75.5547013},
                            {lat:10.4008733,lng: -75.5528345},
                            {lat:10.4067827,lng: -75.5506673},
                            {lat:10.4107398,lng: -75.5504098},
                            {lat:10.4143381,lng: -75.5490794},
                            {lat:10.4173982,lng: -75.5497553},
                            {lat:10.4182002,lng: -75.550737},
                            {lat:10.418369,lng: -75.5522337},
                        ];

                        
                        // Construct the polygon.
                        const Zona_1 = new google.maps.Polygon({
                          paths: Zona1,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });

                        //////////////////////////////////////77
                        const Zona2 = [
                          {lng:-75.5526199,lat:10.4192918},
                                      {lng:-75.5503883,lat:10.4205369},
                                      {lng:-75.5491223,lat:10.4225207},
                                      {lng:-75.5481567,lat:10.4216132},
                                      {lng:-75.5492296,lat:10.4206002},
                                      {lng:-75.5458607,lat:10.4175613},
                                      {lng:-75.5453458,lat:10.417709},
                                      {lng:-75.5439296,lat:10.419946},
                                      {lng:-75.5435433,lat:10.4228372},
                                      {lng:-75.5446162,lat:10.4260239},
                                      {lng:-75.5442943,lat:10.4267414},
                                      {lng:-75.5450024,lat:10.4279232},
                                      {lng:-75.5443158,lat:10.4297169},
                                      {lng:-75.5455389,lat:10.4317428},
                                      {lng:-75.5481996,lat:10.4296114},
                                      {lng:-75.5532636,lat:10.4258761},
                                      {lng:-75.554594,lat:10.4242934},
                                      {lng:-75.5526199,lat:10.4192918},
                        ];

                        
                        // Construct the polygon.
                        const Zona_2 = new google.maps.Polygon({
                          paths: Zona2,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77


                      //////////////////////////////////////77
                      const Zona3 = [
                        {lng:-75.5441549,lat:10.4171069},
                                      {lng:-75.5441763,lat:10.4154608},
                                      {lng:-75.5436506,lat:10.4145744},
                                      {lng:-75.5447557,lat:10.4151864},
                                      {lng:-75.5444553,lat:10.4140679},
                                      {lng:-75.5423202,lat:10.4129283},
                                      {lng:-75.5407109,lat:10.4117675},
                                      {lng:-75.5390372,lat:10.41086},
                                      {lng:-75.5383398,lat:10.4093194},
                                      {lng:-75.5385115,lat:10.4082114},
                                      {lng:-75.5373528,lat:10.4081481},
                                      {lng:-75.537106,lat:10.407726},
                                      {lng:-75.5385115,lat:10.4069874},
                                      {lng:-75.5387583,lat:10.4064175},
                                      {lng:-75.5395093,lat:10.4064175},
                                      {lng:-75.5395307,lat:10.405911},
                                      {lng:-75.5290808,lat:10.4048663},
                                      {lng:-75.5274071,lat:10.4046658},
                                      {lng:-75.5271497,lat:10.4062804},
                                      {lng:-75.5264094,lat:10.406618},
                                      {lng:-75.5279758,lat:10.4077788},
                                      {lng:-75.528759,lat:10.4074411},
                                      {lng:-75.5291452,lat:10.4089395},
                                      {lng:-75.5305936,lat:10.4103852},
                                      {lng:-75.5312266,lat:10.4132765},
                                      {lng:-75.5322137,lat:10.4144689},
                                      {lng:-75.5336621,lat:10.4157457},
                                      {lng:-75.5359044,lat:10.4169592},
                                      {lng:-75.5362906,lat:10.4173496},
                                      {lng:-75.5377712,lat:10.4177611},
                                      {lng:-75.5412581,lat:10.4187424},
                                      {lng:-75.5441549,lat:10.4171069},
                        ];

                        
                        // Construct the polygon.
                        const Zona_3 = new google.maps.Polygon({
                          paths: Zona3,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77

                      //////////////////////////////////////77
                      const Zona4 = [
                        {lng:-75.545335,lat:10.4317469},
                                      {lng:-75.5441549,lat:10.4296788},
                                      {lng:-75.5417945,lat:10.4315781},
                                      {lng:-75.5398419,lat:10.4336251},
                                      {lng:-75.5367305,lat:10.4352711},
                                      {lng:-75.5357649,lat:10.4339627},
                                      {lng:-75.5348422,lat:10.4344903},
                                      {lng:-75.533705,lat:10.4370648},
                                      {lng:-75.5277183,lat:10.4408},
                                      {lng:-75.5255511,lat:10.4421505},
                                      {lng:-75.5179765,lat:10.4429524},
                                      {lng:-75.5138137,lat:10.4408211},
                                      {lng:-75.5131485,lat:10.4527648},
                                      {lng:-75.5148437,lat:10.4529336},
                                      {lng:-75.5199935,lat:10.4497472},
                                      {lng:-75.5295851,lat:10.441011},
                                      {lng:-75.5299284,lat:10.4401458},
                                      {lng:-75.5360439,lat:10.4371281},
                                      {lng:-75.545335,lat:10.4317469},
                        ];

                        
                        // Construct the polygon.
                        const Zona_4 = new google.maps.Polygon({
                          paths: Zona4,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona7 = [
                        {lng:-75.5199954,lat:10.4132262},
                                        {lng:-75.5204246,lat:10.4133212},
                                        {lng:-75.5209181,lat:10.4133106},
                                        {lng:-75.5199954,lat:10.4132262},

                                        {lng:-75.5199954,lat:10.4132262},
                                        {lng:-75.5212614,lat:10.4121499},
                                        {lng:-75.5160365,lat:10.4092164},
                                        {lng:-75.5150387,lat:10.4089737},
                                        {lng:-75.5147168,lat:10.4086465},
                                        {lng:-75.5133221,lat:10.4084671},
                                        {lng:-75.5120024,lat:10.4081717},
                                        {lng:-75.509921,lat:10.4077601},
                                        {lng:-75.5098567,lat:10.4079184},
                                        {lng:-75.5094812,lat:10.4078973},
                                        {lng:-75.5040202,lat:10.4069265},
                                        {lng:-75.501971,lat:10.4064305},
                                        {lng:-75.501574,lat:10.4085305},
                                        {lng:-75.5025611,lat:10.4087521},
                                        {lng:-75.5017349,lat:10.4132156},
                                        {lng:-75.5012843,lat:10.4131523},
                                        {lng:-75.5010054,lat:10.4146929},
                                        {lng:-75.5071315,lat:10.4159908},
                                        {lng:-75.5097387,lat:10.4153261},
                                        {lng:-75.5137405,lat:10.416624},
                                        {lng:-75.5147812,lat:10.4135955},
                                        {lng:-75.5199954,lat:10.4132262},
                        ];

                        
                        // Construct the polygon.
                        const Zona_7 = new google.maps.Polygon({
                          paths: Zona7,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });

                        
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona8 = [
                        {lng:-75.5010054,lat:10.4146929},
                                      {lng:-75.5012436,lat:10.4130785},
                                      {lng:-75.5016835,lat:10.4131418},
                                      {lng:-75.5018874,lat:10.4121393},
                                      {lng:-75.5024775,lat:10.4088048},
                                      {lng:-75.5014904,lat:10.4085727},
                                      {lng:-75.5018659,lat:10.4064517},
                                      {lng:-75.501072,lat:10.4061667},
                                      {lng:-75.4984756,lat:10.40451},
                                      {lng:-75.4955466,lat:10.4025261},
                                      {lng:-75.4945703,lat:10.403708},
                                      {lng:-75.4944952,lat:10.4050271},
                                      {lng:-75.4937549,lat:10.4060718},
                                      {lng:-75.4916843,lat:10.4056813},
                                      {lng:-75.4914268,lat:10.4067471},
                                      {lng:-75.4900535,lat:10.4065255},
                                      {lng:-75.4884871,lat:10.4061351},
                                      {lng:-75.4859658,lat:10.4054281},
                                      {lng:-75.4848071,lat:10.4061034},
                                      {lng:-75.48117,lat:10.4061878},
                                      {lng:-75.4803117,lat:10.4110208},
                                      {lng:-75.483466,lat:10.4137749},
                                      {lng:-75.4848285,lat:10.4146296},
                                      {lng:-75.4864915,lat:10.4149462},
                                      {lng:-75.4879935,lat:10.4158853},
                                      {lng:-75.4901071,lat:10.4156532},
                                      {lng:-75.4916199,lat:10.4155688},
                                      {lng:-75.4936369,lat:10.4154632},
                                      {lng:-75.4940875,lat:10.4158642},
                                      {lng:-75.4945489,lat:10.4153155},
                                      {lng:-75.4948493,lat:10.4143025},
                                      {lng:-75.495214,lat:10.4144186},
                                      {lng:-75.4966946,lat:10.4146824},
                                      {lng:-75.5010054,lat:10.4146929},
                        ];

                        
                        // Construct the polygon.
                        const Zona_8 = new google.maps.Polygon({
                          paths: Zona8,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona9 = [
                        {lng:-75.4803117,lat:10.4110208},
                                      {lng:-75.4811597,lat:10.40611},
                                      {lng:-75.4846465,lat:10.405994},
                                      {lng:-75.485816,lat:10.4053186},
                                      {lng:-75.4894638,lat:10.4062578},
                                      {lng:-75.4913199,lat:10.4065585},
                                      {lng:-75.4916364,lat:10.4056115},
                                      {lng:-75.4928527,lat:10.4057809},
                                      {lng:-75.4937506,lat:10.4059396},
                                      {lng:-75.4944249,lat:10.4049531},
                                      {lng:-75.4944508,lat:10.4037106},
                                      {lng:-75.4953758,lat:10.4024351},
                                      {lng:-75.4936614,lat:10.4005476},
                                      {lng:-75.4932578,lat:10.3983216},
                                      {lng:-75.4914359,lat:10.4023161},
                                      {lng:-75.4898285,lat:10.4057196},
                                      {lng:-75.4897213,lat:10.4054769},
                                      {lng:-75.4892278,lat:10.4049809},
                                      {lng:-75.4878652,lat:10.403588},
                                      {lng:-75.4872322,lat:10.4023534},
                                      {lng:-75.4865992,lat:10.4027016},
                                      {lng:-75.4861164,lat:10.401467},
                                      {lng:-75.4856551,lat:10.4014881},
                                      {lng:-75.4847324,lat:10.4017624},
                                      {lng:-75.4833484,lat:10.4022479},
                                      {lng:-75.4828119,lat:10.4025433},
                                      {lng:-75.4818034,lat:10.4015619},
                                      {lng:-75.4808915,lat:10.399958},
                                      {lng:-75.4802263,lat:10.3993987},
                                      {lng:-75.4797113,lat:10.3988394},
                                      {lng:-75.4793036,lat:10.3975097},
                                      {lng:-75.4789173,lat:10.3970665},
                                      {lng:-75.4747546,lat:10.3998735},
                                      {lng:-75.4744327,lat:10.3993037},
                                      {lng:-75.473274,lat:10.3998102},
                                      {lng:-75.4733813,lat:10.4010132},
                                      {lng:-75.47454,lat:10.4017308},
                                      {lng:-75.4751623,lat:10.4030498},
                                      {lng:-75.4750013,lat:10.4033348},
                                      {lng:-75.475173,lat:10.4042845},
                                      {lng:-75.4761922,lat:10.4056563},
                                      {lng:-75.4767072,lat:10.4068487},
                                      {lng:-75.4755807,lat:10.4126736},
                                      {lng:-75.4803117,lat:10.4110208},
                        ];

                        
                        // Construct the polygon.
                        const Zona_9 = new google.maps.Polygon({
                          paths: Zona9,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona10 = [
                        {lng:-75.4754919,lat:10.4126274},
                                      {lng:-75.4765863,lat:10.4069397},
                                      {lng:-75.4765326,lat:10.4065388},
                                      {lng:-75.4758031,lat:10.4052092},
                                      {lng:-75.4751164,lat:10.4043861},
                                      {lng:-75.4748911,lat:10.4033836},
                                      {lng:-75.4750306,lat:10.403067},
                                      {lng:-75.4747302,lat:10.4026027},
                                      {lng:-75.4745263,lat:10.4019484},
                                      {lng:-75.474183,lat:10.4017691},
                                      {lng:-75.4733033,lat:10.4010304},
                                      {lng:-75.4732282,lat:10.3997324},
                                      {lng:-75.4745049,lat:10.399247},
                                      {lng:-75.4747946,lat:10.3997641},
                                      {lng:-75.4788501,lat:10.3970309},
                                      {lng:-75.4781098,lat:10.3968938},
                                      {lng:-75.4775197,lat:10.3966827},
                                      {lng:-75.476833,lat:10.3959862},
                                      {lng:-75.4744942,lat:10.3969887},
                                      {lng:-75.4722733,lat:10.3979912},
                                      {lng:-75.472048,lat:10.3977169},
                                      {lng:-75.4715437,lat:10.396651},
                                      {lng:-75.4697627,lat:10.3958912},
                                      {lng:-75.4689366,lat:10.3953847},
                                      {lng:-75.4674239,lat:10.3967988},
                                      {lng:-75.46987,lat:10.398751},
                                      {lng:-75.4669732,lat:10.4002073},
                                      {lng:-75.4679174,lat:10.4013258},
                                      {lng:-75.468486,lat:10.4027188},
                                      {lng:-75.4686148,lat:10.403964},
                                      {lng:-75.4684216,lat:10.4070769},
                                      {lng:-75.4683787,lat:10.4100421},
                                      {lng:-75.4683894,lat:10.4117305},
                                      {lng:-75.4694623,lat:10.4141997},
                                      {lng:-75.4754919,lat:10.4126274},
                        ];

                        
                        // Construct the polygon.
                        const Zona_10 = new google.maps.Polygon({
                          paths: Zona10,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona11 = [
                        {lng:-75.469752,lat:10.4160667},
                                      {lng:-75.4689152,lat:10.4141462},
                                      {lng:-75.4682714,lat:10.411867},
                                      {lng:-75.4684216,lat:10.4034462},
                                      {lng:-75.4679281,lat:10.4018845},
                                      {lng:-75.4666836,lat:10.4002383},
                                      {lng:-75.4697091,lat:10.3987398},
                                      {lng:-75.4648167,lat:10.3957006},
                                      {lng:-75.4528219,lat:10.3902554},
                                      {lng:-75.4546887,lat:10.3882292},
                                      {lng:-75.4546244,lat:10.3880182},
                                      {lng:-75.4549462,lat:10.3876383},
                                      {lng:-75.453766,lat:10.3865618},
                                      {lng:-75.4552895,lat:10.3845357},
                                      {lng:-75.4550535,lat:10.3842613},
                                      {lng:-75.4555041,lat:10.3837969},
                                      {lng:-75.4571564,lat:10.3815597},
                                      {lng:-75.4573495,lat:10.3817285},
                                      {lng:-75.4579503,lat:10.3808209},
                                      {lng:-75.451234,lat:10.3782882},
                                      {lng:-75.4520923,lat:10.3736658},
                                      {lng:-75.4529936,lat:10.3721039},
                                      {lng:-75.4441959,lat:10.3723994},
                                      {lng:-75.4394109,lat:10.3807998},
                                      {lng:-75.4481227,lat:10.3934846},
                                      {lng:-75.4459769,lat:10.4004071},
                                      {lng:-75.4459984,lat:10.4020744},
                                      {lng:-75.4491741,lat:10.4066753},
                                      {lng:-75.4488737,lat:10.4073295},
                                      {lng:-75.4457409,lat:10.4101364},
                                      {lng:-75.4395182,lat:10.4156024},
                                      {lng:-75.4368574,lat:10.4169742},
                                      {lng:-75.4302914,lat:10.4216593},
                                      {lng:-75.4373724,lat:10.4268085},
                                      {lng:-75.4571778,lat:10.4269351},
                                      {lng:-75.4604608,lat:10.4254368},
                                      {lng:-75.4633791,lat:10.4257322},
                                      {lng:-75.469752,lat:10.4160667},
                        ];

                        
                        // Construct the polygon.
                        const Zona_11 = new google.maps.Polygon({
                          paths: Zona11,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona12 = [
                        {lng:-75.4560076,lat:10.3916696},
                                      {lng:-75.4595695,lat:10.3873007},
                                      {lng:-75.4623376,lat:10.3848524},
                                      {lng:-75.4615007,lat:10.3840293},
                                      {lng:-75.4619084,lat:10.3836071},
                                      {lng:-75.4624663,lat:10.3819819},
                                      {lng:-75.463904,lat:10.3802723},
                                      {lng:-75.4648481,lat:10.3812854},
                                      {lng:-75.4696546,lat:10.377824},
                                      {lng:-75.4662858,lat:10.3767686},
                                      {lng:-75.4644833,lat:10.3782461},
                                      {lng:-75.4636894,lat:10.3773807},
                                      {lng:-75.4647623,lat:10.376642},
                                      {lng:-75.4674016,lat:10.3738137},
                                      {lng:-75.4715858,lat:10.3701833},
                                      {lng:-75.4609643,lat:10.3635555},
                                      {lng:-75.4577242,lat:10.365814},
                                      {lng:-75.4520923,lat:10.3736658},
                                      {lng:-75.451234,lat:10.3782882},
                                      {lng:-75.4581104,lat:10.3808844},
                                      {lng:-75.4574023,lat:10.3818975},
                                      {lng:-75.4571663,lat:10.3817076},
                                      {lng:-75.4551922,lat:10.3842403},
                                      {lng:-75.4554282,lat:10.384578},
                                      {lng:-75.4539047,lat:10.3865409},
                                      {lng:-75.4551063,lat:10.3876384},
                                      {lng:-75.4546244,lat:10.3880182},
                                      {lng:-75.454763,lat:10.388356},
                                      {lng:-75.452982,lat:10.3902344},
                                      {lng:-75.4560076,lat:10.3916696},
                        ];

                        
                        // Construct the polygon.
                        const Zona_12 = new google.maps.Polygon({
                          paths: Zona12,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona14 = [
                        {lng:-75.4791228,lat:10.3792381},
                                      {lng:-75.4794393,lat:10.3777817},
                                      {lng:-75.4786937,lat:10.3775918},
                                      {lng:-75.4793321,lat:10.3750484},
                                      {lng:-75.4800187,lat:10.3751065},
                                      {lng:-75.480126,lat:10.3747265},
                                      {lng:-75.4781572,lat:10.3745049},
                                      {lng:-75.4771595,lat:10.3741567},
                                      {lng:-75.4781626,lat:10.3711067},
                                      {lng:-75.4788332,lat:10.3712703},
                                      {lng:-75.4813705,lat:10.3684314},
                                      {lng:-75.4818372,lat:10.367872},
                                      {lng:-75.4892616,lat:10.362954},
                                      {lng:-75.4884569,lat:10.3616347},
                                      {lng:-75.488178,lat:10.3595398},
                                      {lng:-75.4887573,lat:10.3584422},
                                      {lng:-75.4886179,lat:10.3579989},
                                      {lng:-75.488634,lat:10.3495187},
                                      {lng:-75.4887037,lat:10.3493023},
                                      {lng:-75.4884623,lat:10.3488696},
                                      {lng:-75.4859839,lat:10.3440779},
                                      {lng:-75.4846857,lat:10.3443259},
                                      {lng:-75.4841547,lat:10.3451228},
                                      {lng:-75.482363,lat:10.3495503},
                                      {lng:-75.481789,lat:10.3505688},
                                      {lng:-75.4811989,lat:10.3512443},
                                      {lng:-75.4797022,lat:10.3523419},
                                      {lng:-75.4744397,lat:10.3558775},
                                      {lng:-75.4708616,lat:10.3582364},
                                      {lng:-75.4690431,lat:10.359429},
                                      {lng:-75.4665326,lat:10.3608168},
                                      {lng:-75.461254,lat:10.3637033},
                                      {lng:-75.4716395,lat:10.3701885},
                                      {lng:-75.467246,lat:10.3740089},
                                      {lng:-75.4648267,lat:10.3766103},
                                      {lng:-75.4637377,lat:10.3773702},
                                      {lng:-75.4644887,lat:10.3782092},
                                      {lng:-75.4663072,lat:10.3767317},
                                      {lng:-75.4697137,lat:10.3778345},
                                      {lng:-75.4649447,lat:10.3812538},
                                      {lng:-75.4655938,lat:10.3818659},
                                      {lng:-75.4656796,lat:10.3818764},
                                      {lng:-75.4679434,lat:10.3834805},
                                      {lng:-75.4681526,lat:10.383528},
                                      {lng:-75.4712157,lat:10.3858708},
                                      {lng:-75.4752872,lat:10.3791167},
                                      {lng:-75.4791228,lat:10.3792381},
                        ];

                        
                        // Construct the polygon.
                        const Zona_14 = new google.maps.Polygon({
                          paths: Zona14,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona13 = [
                        {lng:-75.4638611,lat:10.3805678},
                                      {lng:-75.4626165,lat:10.3820452},
                                      {lng:-75.4620586,lat:10.3836493},
                                      {lng:-75.4616509,lat:10.383987},
                                      {lng:-75.4624878,lat:10.3848524},
                                      {lng:-75.4594837,lat:10.3874484},
                                      {lng:-75.4562007,lat:10.391564},
                                      {lng:-75.4650842,lat:10.395743},
                                      {lng:-75.4670154,lat:10.3969249},
                                      {lng:-75.4688178,lat:10.3952364},
                                      {lng:-75.4716931,lat:10.3965872},
                                      {lng:-75.4721437,lat:10.3975791},
                                      {lng:-75.4773365,lat:10.3953208},
                                      {lng:-75.4791604,lat:10.394561},
                                      {lng:-75.4830228,lat:10.3932947},
                                      {lng:-75.4860483,lat:10.3918595},
                                      {lng:-75.4810487,lat:10.3893901},
                                      {lng:-75.4813491,lat:10.3883137},
                                      {lng:-75.4758988,lat:10.3865619},
                                      {lng:-75.4796968,lat:10.3794702},
                                      {lng:-75.475534,lat:10.3791325},
                                      {lng:-75.4711996,lat:10.3860132},
                                      {lng:-75.46517,lat:10.3817497},
                                      {lng:-75.4638611,lat:10.3805678},
                        ];

                        
                        // Construct the polygon.
                        const Zona_13 = new google.maps.Polygon({
                          paths: Zona13,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona15 = [
                        {lng:-75.4861771,lat:10.3917732},
                                      {lng:-75.4881726,lat:10.3910134},
                                      {lng:-75.4886018,lat:10.3908235},
                                      {lng:-75.4887949,lat:10.3893249},
                                      {lng:-75.4899107,lat:10.3866234},
                                      {lng:-75.4896961,lat:10.3847871},
                                      {lng:-75.4886232,lat:10.3845128},
                                      {lng:-75.4891597,lat:10.3827398},
                                      {lng:-75.4871856,lat:10.38217},
                                      {lng:-75.4839669,lat:10.3812202},
                                      {lng:-75.4843961,lat:10.3798483},
                                      {lng:-75.4863702,lat:10.3798483},
                                      {lng:-75.4869924,lat:10.3773999},
                                      {lng:-75.4865204,lat:10.3772733},
                                      {lng:-75.4867135,lat:10.3769355},
                                      {lng:-75.4868422,lat:10.3763657},
                                      {lng:-75.4865418,lat:10.3763446},
                                      {lng:-75.486735,lat:10.3753948},
                                      {lng:-75.4884516,lat:10.3752892},
                                      {lng:-75.4884516,lat:10.3747404},
                                      {lng:-75.4888163,lat:10.3737062},
                                      {lng:-75.4883443,lat:10.3735585},
                                      {lng:-75.4884516,lat:10.3727986},
                                      {lng:-75.4888378,lat:10.3721232},
                                      {lng:-75.4892884,lat:10.3631315},
                                      {lng:-75.481907,lat:10.3680073},
                                      {lng:-75.4789029,lat:10.3714055},
                                      {lng:-75.4781948,lat:10.3712578},
                                      {lng:-75.4772936,lat:10.3741072},
                                      {lng:-75.4781519,lat:10.3743394},
                                      {lng:-75.4802762,lat:10.3745927},
                                      {lng:-75.4801689,lat:10.3752259},
                                      {lng:-75.4794179,lat:10.3751837},
                                      {lng:-75.4788385,lat:10.3775476},
                                      {lng:-75.4796325,lat:10.3777587},
                                      {lng:-75.4792677,lat:10.3793417},
                                      {lng:-75.4799329,lat:10.379405},
                                      {lng:-75.4761134,lat:10.3864967},
                                      {lng:-75.4814993,lat:10.3882485},
                                      {lng:-75.4812203,lat:10.3893249},
                                      {lng:-75.4861771,lat:10.3917732},
                        ];

                        
                        // Construct the polygon.
                        const Zona_15 = new google.maps.Polygon({
                          paths: Zona15,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });


                      //////////////////////////////////////////////77



                        //////////////////////////////////////77
                        const Zona16 = [
                          {lng:-75.488752,lat:10.3907458},
                                      {lng:-75.4915844,lat:10.390176},
                                      {lng:-75.4985581,lat:10.3889307},
                                      {lng:-75.5025278,lat:10.3882764},
                                      {lng:-75.5086003,lat:10.3873372},
                                      {lng:-75.5091045,lat:10.3860181},
                                      {lng:-75.5065511,lat:10.3845934},
                                      {lng:-75.5055211,lat:10.3806571},
                                      {lng:-75.5031554,lat:10.3802666},
                                      {lng:-75.5024339,lat:10.3799975},
                                      {lng:-75.5030857,lat:10.3783987},
                                      {lng:-75.4996525,lat:10.3769423},
                                      {lng:-75.4988156,lat:10.3784409},
                                      {lng:-75.4979788,lat:10.3780188},
                                      {lng:-75.4980431,lat:10.3777866},
                                      {lng:-75.497378,lat:10.3776177},
                                      {lng:-75.4981504,lat:10.3761825},
                                      {lng:-75.4974423,lat:10.3758448},
                                      {lng:-75.4957901,lat:10.3728687},
                                      {lng:-75.4958974,lat:10.3717923},
                                      {lng:-75.4945026,lat:10.3706103},
                                      {lng:-75.4934727,lat:10.3690483},
                                      {lng:-75.4890953,lat:10.3697026},
                                      {lng:-75.4890524,lat:10.3721933},
                                      {lng:-75.4886018,lat:10.3728898},
                                      {lng:-75.4885374,lat:10.3734175},
                                      {lng:-75.4890095,lat:10.3737341},
                                      {lng:-75.4886018,lat:10.3746206},
                                      {lng:-75.4886232,lat:10.3753593},
                                      {lng:-75.4868208,lat:10.3755493},
                                      {lng:-75.486692,lat:10.3762669},
                                      {lng:-75.4870568,lat:10.3762669},
                                      {lng:-75.4867564,lat:10.3771956},
                                      {lng:-75.4872285,lat:10.3773223},
                                      {lng:-75.4864775,lat:10.3800661},
                                      {lng:-75.4845463,lat:10.3799817},
                                      {lng:-75.4841815,lat:10.3811425},
                                      {lng:-75.4893957,lat:10.3827044},
                                      {lng:-75.4888163,lat:10.3844351},
                                      {lng:-75.4899751,lat:10.3847939},
                                      {lng:-75.4900609,lat:10.386588},
                                      {lng:-75.4889451,lat:10.3892684},
                                      {lng:-75.488752,lat:10.3907458},
                        ];

                        
                        // Construct the polygon.
                        const Zona_16 = new google.maps.Polygon({
                          paths: Zona16,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77


                      //////////////////////////////////////77
                      const Zona17 = [
                        {lng:-75.5301392,lat:10.3981216},
                                      {lng:-75.5376923,lat:10.3943226},
                                      {lng:-75.5319416,lat:10.3890884},
                                      {lng:-75.5294525,lat:10.3846139},
                                      {lng:-75.524131,lat:10.3809836},
                                      {lng:-75.5232727,lat:10.3827565},
                                      {lng:-75.5169565,lat:10.3849837},
                                      {lng:-75.5091045,lat:10.3860181},
                                      {lng:-75.5085773,lat:10.3874742},
                                      {lng:-75.504849,lat:10.3880599},
                                      {lng:-75.5050046,lat:10.3891416},
                                      {lng:-75.5049349,lat:10.3892208},
                                      {lng:-75.5034167,lat:10.3894635},
                                      {lng:-75.5041731,lat:10.3936688},
                                      {lng:-75.504849,lat:10.3936582},
                                      {lng:-75.5053211,lat:10.3933997},
                                      {lng:-75.5058254,lat:10.3942175},
                                      {lng:-75.5062921,lat:10.393901},
                                      {lng:-75.5064745,lat:10.39417},
                                      {lng:-75.5066461,lat:10.3941226},
                                      {lng:-75.5073757,lat:10.3936952},
                                      {lng:-75.5073703,lat:10.3930884},
                                      {lng:-75.5079121,lat:10.3938218},
                                      {lng:-75.5083037,lat:10.393711},
                                      {lng:-75.5088563,lat:10.393368},
                                      {lng:-75.5098809,lat:10.3929618},
                                      {lng:-75.5102993,lat:10.3931464},
                                      {lng:-75.5120052,lat:10.3906982},
                                      {lng:-75.5125738,lat:10.3909936},
                                      {lng:-75.5127294,lat:10.3908406},
                                      {lng:-75.5137271,lat:10.3913999},
                                      {lng:-75.5139203,lat:10.3913788},
                                      {lng:-75.5142207,lat:10.3916426},
                                      {lng:-75.5147678,lat:10.3925502},
                                      {lng:-75.5148966,lat:10.3934419},
                                      {lng:-75.5152882,lat:10.3942492},
                                      {lng:-75.5163343,lat:10.3951989},
                                      {lng:-75.5167902,lat:10.3961329},
                                      {lng:-75.5170692,lat:10.3973148},
                                      {lng:-75.5176968,lat:10.3981115},
                                      {lng:-75.5181957,lat:10.3979215},
                                      {lng:-75.5186356,lat:10.3994728},
                                      {lng:-75.5188877,lat:10.3995466},
                                      {lng:-75.5189253,lat:10.4001376},
                                      {lng:-75.5193759,lat:10.4013089},
                                      {lng:-75.5197085,lat:10.4025014},
                                      {lng:-75.5203093,lat:10.404596},
                                      {lng:-75.5210281,lat:10.4068964},
                                      {lng:-75.521232,lat:10.4068912},
                                      {lng:-75.5213071,lat:10.4053822},
                                      {lng:-75.5224658,lat:10.4052239},
                                      {lng:-75.5239464,lat:10.404939},
                                      {lng:-75.5239464,lat:10.4027968},
                                      {lng:-75.5248529,lat:10.4018629},
                                      {lng:-75.5268485,lat:10.4000004},
                                      {lng:-75.5301392,lat:10.3981216},
                        ];

                        
                        // Construct the polygon.
                        const Zona_17 = new google.maps.Polygon({
                          paths: Zona17,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77

                      //////////////////////////////////////77
                      const Zona18 = [
                        {lng:-75.521285,lat:10.406923},
                                      {lng:-75.52099,lat:10.4069335},
                                      {lng:-75.5206199,lat:10.4057095},
                                      {lng:-75.5198527,lat:10.4030872},
                                      {lng:-75.5193485,lat:10.401346},
                                      {lng:-75.5189086,lat:10.4002116},
                                      {lng:-75.518855,lat:10.3995785},
                                      {lng:-75.5186243,lat:10.3995046},
                                      {lng:-75.51834,lat:10.3984863},
                                      {lng:-75.5178625,lat:10.398634},
                                      {lng:-75.5176962,lat:10.3981486},
                                      {lng:-75.5170311,lat:10.3973044},
                                      {lng:-75.5167736,lat:10.3961647},
                                      {lng:-75.5163337,lat:10.3952466},
                                      {lng:-75.5152823,lat:10.3943074},
                                      {lng:-75.5149014,lat:10.3935371},
                                      {lng:-75.5147297,lat:10.3925451},
                                      {lng:-75.5141986,lat:10.3916798},
                                      {lng:-75.5138982,lat:10.3914159},
                                      {lng:-75.5137373,lat:10.3914318},
                                      {lng:-75.5127395,lat:10.3908725},
                                      {lng:-75.5125947,lat:10.3910255},
                                      {lng:-75.5120046,lat:10.3907458},
                                      {lng:-75.5102826,lat:10.3931835},
                                      {lng:-75.5098588,lat:10.3929936},
                                      {lng:-75.508904,lat:10.393384},
                                      {lng:-75.5083407,lat:10.3937323},
                                      {lng:-75.5078901,lat:10.3938642},
                                      {lng:-75.5073805,lat:10.3931466},
                                      {lng:-75.5074127,lat:10.3937323},
                                      {lng:-75.5065061,lat:10.3942335},
                                      {lng:-75.5062969,lat:10.3939539},
                                      {lng:-75.5058254,lat:10.3942175},
                                      {lng:-75.5063934,lat:10.3958639},
                                      {lng:-75.5072142,lat:10.3969034},
                                      {lng:-75.5083139,lat:10.397431},
                                      {lng:-75.5084158,lat:10.3972516},
                                      {lng:-75.5087323,lat:10.3974416},
                                      {lng:-75.508845,lat:10.3974205},
                                      {lng:-75.5092205,lat:10.397584},
                                      {lng:-75.5095852,lat:10.3976579},
                                      {lng:-75.5101914,lat:10.3978267},
                                      {lng:-75.5103363,lat:10.3979587},
                                      {lng:-75.5106903,lat:10.3985602},
                                      {lng:-75.5108995,lat:10.3987501},
                                      {lng:-75.5112268,lat:10.3992777},
                                      {lng:-75.5114467,lat:10.3998898},
                                      {lng:-75.5110229,lat:10.4007023},
                                      {lng:-75.5112375,lat:10.4013091},
                                      {lng:-75.5125625,lat:10.4010136},
                                      {lng:-75.512643,lat:10.401441},
                                      {lng:-75.5127073,lat:10.4019317},
                                      {lng:-75.5134691,lat:10.4019581},
                                      {lng:-75.5134905,lat:10.4025121},
                                      {lng:-75.5142898,lat:10.4029711},
                                      {lng:-75.5146439,lat:10.4028709},
                                      {lng:-75.5151106,lat:10.4034196},
                                      {lng:-75.5166877,lat:10.4052082},
                                      {lng:-75.5174441,lat:10.4061157},
                                      {lng:-75.5171813,lat:10.4065484},
                                      {lng:-75.5177445,lat:10.4068913},
                                      {lng:-75.5182059,lat:10.407324},
                                      {lng:-75.5179806,lat:10.4074295},
                                      {lng:-75.51731,lat:10.4087749},
                                      {lng:-75.5172295,lat:10.4095083},
                                      {lng:-75.5178679,lat:10.4099673},
                                      {lng:-75.5198957,lat:10.4111492},
                                      {lng:-75.5209149,lat:10.4117243},
                                      {lng:-75.5212099,lat:10.4116926},
                                      {lng:-75.5214513,lat:10.4115132},
                                      {lng:-75.5215103,lat:10.4114077},
                                      {lng:-75.5216015,lat:10.4112705},
                                      {lng:-75.5221702,lat:10.4108959},
                                      {lng:-75.5223257,lat:10.4109276},
                                      {lng:-75.5228246,lat:10.4121938},
                                      {lng:-75.5233289,lat:10.4119459},
                                      {lng:-75.5239673,lat:10.4114816},
                                      {lng:-75.5246968,lat:10.4111756},
                                      {lng:-75.5237741,lat:10.4104949},
                                      {lng:-75.523404,lat:10.4095241},
                                      {lng:-75.5231465,lat:10.4084056},
                                      {lng:-75.5231143,lat:10.4075614},
                                      {lng:-75.523184,lat:10.4064534},
                                      {lng:-75.5234469,lat:10.4056673},
                                      {lng:-75.5238814,lat:10.4054509},
                                      {lng:-75.523066,lat:10.4051871},
                                      {lng:-75.5219395,lat:10.4054509},
                                      {lng:-75.5216015,lat:10.4054193},
                                      {lng:-75.5213441,lat:10.4056462},
                                      {lng:-75.521285,lat:10.406923},
                        ];

                        
                        // Construct the polygon.
                        const Zona_18 = new google.maps.Polygon({
                          paths: Zona18,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona19 = [
                        {lng:-75.5440266,lat:10.4273299},
                                      {lng:-75.5436779,lat:10.4269869},
                                      {lng:-75.5433668,lat:10.4264224},
                                      {lng:-75.5428786,lat:10.4253409},
                                      {lng:-75.5421383,lat:10.4250718},
                                      {lng:-75.5416985,lat:10.4248133},
                                      {lng:-75.541677,lat:10.4245917},
                                      {lng:-75.5418916,lat:10.4240799},
                                      {lng:-75.5415268,lat:10.423526},
                                      {lng:-75.5419828,lat:10.4227926},
                                      {lng:-75.5412049,lat:10.4222123},
                                      {lng:-75.5417038,lat:10.4215475},
                                      {lng:-75.5417628,lat:10.4212626},
                                      {lng:-75.5412532,lat:10.4200702},
                                      {lng:-75.5396063,lat:10.4196956},
                                      {lng:-75.5378361,lat:10.4196112},
                                      {lng:-75.5373533,lat:10.4196745},
                                      {lng:-75.5365379,lat:10.4198434},
                                      {lng:-75.5362965,lat:10.4197379},
                                      {lng:-75.5359907,lat:10.4192155},
                                      {lng:-75.5353094,lat:10.4181287},
                                      {lng:-75.534317,lat:10.4171896},
                                      {lng:-75.5332763,lat:10.4159339},
                                      {lng:-75.532005,lat:10.4147679},
                                      {lng:-75.5318977,lat:10.4148628},
                                      {lng:-75.5303527,lat:10.4159602},
                                      {lng:-75.5299128,lat:10.4164245},
                                      {lng:-75.5296983,lat:10.4168361},
                                      {lng:-75.5294408,lat:10.4173848},
                                      {lng:-75.5291404,lat:10.4178491},
                                      {lng:-75.5286146,lat:10.4177066},
                                      {lng:-75.5282874,lat:10.4179915},
                                      {lng:-75.5257554,lat:10.4193211},
                                      {lng:-75.524999,lat:10.4198592},
                                      {lng:-75.5246557,lat:10.4224075},
                                      {lng:-75.5247898,lat:10.4228559},
                                      {lng:-75.5250634,lat:10.4233466},
                                      {lng:-75.5244465,lat:10.4236684},
                                      {lng:-75.5245591,lat:10.4261059},
                                      {lng:-75.5267317,lat:10.4276464},
                                      {lng:-75.5263562,lat:10.4294033},
                                      {lng:-75.5263026,lat:10.4294877},
                                      {lng:-75.5262704,lat:10.4299994},
                                      {lng:-75.5263348,lat:10.4305534},
                                      {lng:-75.5264099,lat:10.4314766},
                                      {lng:-75.5268605,lat:10.4320253},
                                      {lng:-75.5269678,lat:10.4322785},
                                      {lng:-75.5270536,lat:10.4327428},
                                      {lng:-75.5267854,lat:10.4329011},
                                      {lng:-75.5263026,lat:10.4331649},
                                      {lng:-75.5261095,lat:10.433091},
                                      {lng:-75.525852,lat:10.4332598},
                                      {lng:-75.5257447,lat:10.4336819},
                                      {lng:-75.5257232,lat:10.43422},
                                      {lng:-75.5256374,lat:10.4345366},
                                      {lng:-75.5254872,lat:10.4348847},
                                      {lng:-75.5251653,lat:10.4347898},
                                      {lng:-75.5250473,lat:10.4348742},
                                      {lng:-75.5250044,lat:10.4367734},
                                      {lng:-75.5253477,lat:10.4368262},
                                      {lng:-75.525691,lat:10.4371111},
                                      {lng:-75.5261738,lat:10.4372905},
                                      {lng:-75.5268068,lat:10.4374065},
                                      {lng:-75.5265493,lat:10.4377442},
                                      {lng:-75.528105,lat:10.4385988},
                                      {lng:-75.5279763,lat:10.438736},
                                      {lng:-75.5270858,lat:10.4390103},
                                      {lng:-75.5271394,lat:10.4391791},
                                      {lng:-75.5281801,lat:10.4389259},
                                      {lng:-75.5290706,lat:10.4380818},
                                      {lng:-75.5296929,lat:10.4378497},
                                      {lng:-75.5299397,lat:10.4376703},
                                      {lng:-75.5303474,lat:10.4376598},
                                      {lng:-75.530637,lat:10.4374382},
                                      {lng:-75.531313,lat:10.4369212},
                                      {lng:-75.5316777,lat:10.4368473},
                                      {lng:-75.5319889,lat:10.4368473},
                                      {lng:-75.5325039,lat:10.4365941},
                                      {lng:-75.5326111,lat:10.4363197},
                                      {lng:-75.5331154,lat:10.4363092},
                                      {lng:-75.5331154,lat:10.4359821},
                                      {lng:-75.5337269,lat:10.4358133},
                                      {lng:-75.5343063,lat:10.4352224},
                                      {lng:-75.5343921,lat:10.4348003},
                                      {lng:-75.5348642,lat:10.43422},
                                      {lng:-75.5355401,lat:10.4339035},
                                      {lng:-75.5369241,lat:10.4331227},
                                      {lng:-75.5370743,lat:10.4328061},
                                      {lng:-75.5375357,lat:10.4327217},
                                      {lng:-75.538909,lat:10.4317826},
                                      {lng:-75.5393703,lat:10.4309491},
                                      {lng:-75.540057,lat:10.4305797},
                                      {lng:-75.540529,lat:10.4300416},
                                      {lng:-75.541559,lat:10.43001},
                                      {lng:-75.541795,lat:10.429514},
                                      {lng:-75.5424066,lat:10.429398},
                                      {lng:-75.542707,lat:10.4289654},
                                      {lng:-75.543061,lat:10.4288387},
                                      {lng:-75.5433507,lat:10.4284694},
                                      {lng:-75.5440695,lat:10.4282162},
                                      {lng:-75.5442841,lat:10.4278469},
                                      {lng:-75.5440266,lat:10.4273299},
                        ];

                        
                        // Construct the polygon.
                        const Zona_19 = new google.maps.Polygon({
                          paths: Zona19,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona20 = [
                        {lng:-75.5270858,lat:10.4390103},
                                      {lng:-75.5279763,lat:10.438736},
                                      {lng:-75.5262629,lat:10.4378142},
                                      {lng:-75.5268068,lat:10.4374065},
                                      {lng:-75.5250044,lat:10.4367734},
                                      {lng:-75.5250473,lat:10.4348742},
                                      {lng:-75.5256374,lat:10.4345366},
                                      {lng:-75.5257447,lat:10.4336819},
                                      {lng:-75.525852,lat:10.4332598},
                                      {lng:-75.5263026,lat:10.4331649},
                                      {lng:-75.5269678,lat:10.4322785},
                                      {lng:-75.5263917,lat:10.4318632},
                                      {lng:-75.5260484,lat:10.4303438},
                                      {lng:-75.5264346,lat:10.427727},
                                      {lng:-75.5245591,lat:10.4261059},
                                      {lng:-75.5244465,lat:10.4236684},
                                      {lng:-75.5250634,lat:10.4233466},
                                      {lng:-75.5244176,lat:10.4227043},
                                      {lng:-75.5250184,lat:10.419581},
                                      {lng:-75.5291383,lat:10.4174706},
                                      {lng:-75.529782,lat:10.4161621},
                                      {lng:-75.532005,lat:10.4147679},
                                      {lng:-75.5289237,lat:10.4127855},
                                      {lng:-75.5266063,lat:10.4124478},
                                      {lng:-75.5246968,lat:10.4111756},
                                      {lng:-75.5227868,lat:10.4124478},
                                      {lng:-75.522186,lat:10.4111816},
                                      {lng:-75.5214993,lat:10.4118569},
                                      {lng:-75.5209181,lat:10.4133106},
                                      {lng:-75.5149333,lat:10.4138829},
                                      {lng:-75.5140321,lat:10.4169641},
                                      {lng:-75.5153624,lat:10.4186102},
                                      {lng:-75.51459,lat:10.4222823},
                                      {lng:-75.5136458,lat:10.426925},
                                      {lng:-75.5127446,lat:10.4268828},
                                      {lng:-75.5098693,lat:10.4298373},
                                      {lng:-75.5100409,lat:10.4389537},
                                      {lng:-75.5177228,lat:10.4425833},
                                      {lng:-75.5201689,lat:10.4425833},
                                      {lng:-75.5264346,lat:10.441486},
                                      {lng:-75.5264346,lat:10.4397134},
                                      {lng:-75.5270858,lat:10.4390103},
                        ];

                        
                        // Construct the polygon.
                        const Zona_20 = new google.maps.Polygon({
                          paths: Zona20,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona21 = [
                        {lng:-75.4770065,lat:10.3960523},
                                      {lng:-75.4775322,lat:10.3966116},
                                      {lng:-75.4781759,lat:10.3968543},
                                      {lng:-75.4789484,lat:10.397002},
                                      {lng:-75.4793883,lat:10.3974875},
                                      {lng:-75.4797853,lat:10.3988487},
                                      {lng:-75.4804505,lat:10.3995452},
                                      {lng:-75.4809654,lat:10.3999357},
                                      {lng:-75.481813,lat:10.4014974},
                                      {lng:-75.4828215,lat:10.4024683},
                                      {lng:-75.4832829,lat:10.402215},
                                      {lng:-75.485611,lat:10.4014236},
                                      {lng:-75.4861797,lat:10.4013708},
                                      {lng:-75.4866303,lat:10.402616},
                                      {lng:-75.4872955,lat:10.4022678},
                                      {lng:-75.4877568,lat:10.4031858},
                                      {lng:-75.4885078,lat:10.4042094},
                                      {lng:-75.4898285,lat:10.4057196},
                                      {lng:-75.4905356,lat:10.4041567},
                                      {lng:-75.4931856,lat:10.3983528},
                                      {lng:-75.4924024,lat:10.397192},
                                      {lng:-75.4910613,lat:10.3956724},
                                      {lng:-75.4897416,lat:10.394902},
                                      {lng:-75.4884542,lat:10.3946066},
                                      {lng:-75.4864157,lat:10.3945855},
                                      {lng:-75.4849458,lat:10.3944377},
                                      {lng:-75.4838837,lat:10.3938151},
                                      {lng:-75.482843,lat:10.3935196},
                                      {lng:-75.4812122,lat:10.3940789},
                                      {lng:-75.4796243,lat:10.3949126},
                                      {lng:-75.4770065,lat:10.3960523},
                        ];

                        
                        // Construct the polygon.
                        const Zona_21 = new google.maps.Polygon({
                          paths: Zona21,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona22 = [
                        {lng:-75.5041822,lat:10.3937054},
                                      {lng:-75.5040052,lat:10.3930828},
                                      {lng:-75.50334,lat:10.3894263},
                                      {lng:-75.5049654,lat:10.3891466},
                                      {lng:-75.504849,lat:10.3880599},
                                      {lng:-75.5019882,lat:10.388619},
                                      {lng:-75.5000087,lat:10.3889303},
                                      {lng:-75.4989197,lat:10.3892152},
                                      {lng:-75.4983618,lat:10.3892469},
                                      {lng:-75.496892,lat:10.3894579},
                                      {lng:-75.4954275,lat:10.3897059},
                                      {lng:-75.491136,lat:10.3904921},
                                      {lng:-75.4910448,lat:10.3905396},
                                      {lng:-75.4916295,lat:10.3938532},
                                      {lng:-75.49171,lat:10.3945549},
                                      {lng:-75.4923161,lat:10.3949401},
                                      {lng:-75.494081,lat:10.3959954},
                                      {lng:-75.4948803,lat:10.3963383},
                                      {lng:-75.4957869,lat:10.3968132},
                                      {lng:-75.4967311,lat:10.3975888},
                                      {lng:-75.4979756,lat:10.3982748},
                                      {lng:-75.5000624,lat:10.3995358},
                                      {lng:-75.5008831,lat:10.4000212},
                                      {lng:-75.5007651,lat:10.400074},
                                      {lng:-75.5005612,lat:10.4007177},
                                      {lng:-75.5002662,lat:10.4021212},
                                      {lng:-75.4996386,lat:10.4050759},
                                      {lng:-75.5009904,lat:10.4059148},
                                      {lng:-75.5019292,lat:10.4062208},
                                      {lng:-75.5020526,lat:10.4059306},
                                      {lng:-75.5024495,lat:10.4055824},
                                      {lng:-75.5024442,lat:10.4057248},
                                      {lng:-75.5042627,lat:10.4055138},
                                      {lng:-75.504252,lat:10.4053766},
                                      {lng:-75.5051103,lat:10.4053238},
                                      {lng:-75.5070146,lat:10.4051392},
                                      {lng:-75.5061349,lat:10.4039837},
                                      {lng:-75.5061617,lat:10.4038412},
                                      {lng:-75.5056735,lat:10.4035985},
                                      {lng:-75.5057272,lat:10.4035247},
                                      {lng:-75.5059149,lat:10.40334},
                                      {lng:-75.5062529,lat:10.4026857},
                                      {lng:-75.5061724,lat:10.4022742},
                                      {lng:-75.5063816,lat:10.4017624},
                                      {lng:-75.5063065,lat:10.4010132},
                                      {lng:-75.5062368,lat:10.3998524},
                                      {lng:-75.5059525,lat:10.398565},
                                      {lng:-75.5057379,lat:10.3975836},
                                      {lng:-75.5058023,lat:10.397267},
                                      {lng:-75.5048099,lat:10.3964755},
                                      {lng:-75.5047938,lat:10.3963911},
                                      {lng:-75.5054804,lat:10.395911},
                                      {lng:-75.505931,lat:10.3957105},
                                      {lng:-75.5060169,lat:10.3956208},
                                      {lng:-75.5062529,lat:10.3955627},
                                      {lng:-75.5058076,lat:10.3942647},
                                      {lng:-75.5053141,lat:10.3934469},
                                      {lng:-75.5048152,lat:10.3936949},
                                      {lng:-75.5041822,lat:10.3937054},
                        ];

                        
                        // Construct the polygon.
                        const Zona_22 = new google.maps.Polygon({
                          paths: Zona22,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona23 = [
                        {lng:-75.5171807,lat:10.4094584},
                                      {lng:-75.5172719,lat:10.4088306},
                                      {lng:-75.5173363,lat:10.4085773},
                                      {lng:-75.5179317,lat:10.4074219},
                                      {lng:-75.5181409,lat:10.4073163},
                                      {lng:-75.5176742,lat:10.4068731},
                                      {lng:-75.517127,lat:10.4065513},
                                      {lng:-75.5174006,lat:10.4061081},
                                      {lng:-75.5160273,lat:10.4045094},
                                      {lng:-75.5146433,lat:10.4029054},
                                      {lng:-75.5142839,lat:10.403011},
                                      {lng:-75.5134256,lat:10.4025097},
                                      {lng:-75.5134691,lat:10.4019581},
                                      {lng:-75.5128409,lat:10.4019663},
                                      {lng:-75.5126478,lat:10.4019346},
                                      {lng:-75.5125566,lat:10.4010482},
                                      {lng:-75.5111833,lat:10.4013595},
                                      {lng:-75.5109955,lat:10.400911},
                                      {lng:-75.5109687,lat:10.4006894},
                                      {lng:-75.5113871,lat:10.3999191},
                                      {lng:-75.5111886,lat:10.3993281},
                                      {lng:-75.5110277,lat:10.3989957},
                                      {lng:-75.5106522,lat:10.3985842},
                                      {lng:-75.510325,lat:10.3979932},
                                      {lng:-75.510105,lat:10.3978296},
                                      {lng:-75.509295,lat:10.3976291},
                                      {lng:-75.5088605,lat:10.397455},
                                      {lng:-75.5087425,lat:10.3974972},
                                      {lng:-75.5084206,lat:10.3972915},
                                      {lng:-75.5083079,lat:10.3974761},
                                      {lng:-75.5076481,lat:10.3971279},
                                      {lng:-75.5072082,lat:10.3969432},
                                      {lng:-75.5063553,lat:10.3958668},
                                      {lng:-75.5062641,lat:10.3955978},
                                      {lng:-75.5059959,lat:10.395698},
                                      {lng:-75.5055721,lat:10.3958932},
                                      {lng:-75.5048586,lat:10.3963945},
                                      {lng:-75.5048533,lat:10.3964683},
                                      {lng:-75.5058403,lat:10.3972492},
                                      {lng:-75.5057759,lat:10.3976028},
                                      {lng:-75.5062695,lat:10.3998663},
                                      {lng:-75.506425,lat:10.4017447},
                                      {lng:-75.5062212,lat:10.4023145},
                                      {lng:-75.5063016,lat:10.4026997},
                                      {lng:-75.5059691,lat:10.4033539},
                                      {lng:-75.5057223,lat:10.4035861},
                                      {lng:-75.5062105,lat:10.4038182},
                                      {lng:-75.5062051,lat:10.4040293},
                                      {lng:-75.5070634,lat:10.4051795},
                                      {lng:-75.5052449,lat:10.4053853},
                                      {lng:-75.5043383,lat:10.4054327},
                                      {lng:-75.5043275,lat:10.4055224},
                                      {lng:-75.5026538,lat:10.4057546},
                                      {lng:-75.5024442,lat:10.4057248},
                                      {lng:-75.5022193,lat:10.4058654},
                                      {lng:-75.5019994,lat:10.40624},
                                      {lng:-75.5022193,lat:10.4061978},
                                      {lng:-75.5055614,lat:10.4068151},
                                      {lng:-75.5078466,lat:10.4072161},
                                      {lng:-75.5085869,lat:10.407348},
                                      {lng:-75.5126585,lat:10.4080867},
                                      {lng:-75.514933,lat:10.408514},
                                      {lng:-75.5161722,lat:10.4088728},
                                      {lng:-75.5171807,lat:10.4094584},
                        ];

                        
                        // Construct the polygon.
                        const Zona_23 = new google.maps.Polygon({
                          paths: Zona23,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona24 = [
                        {lng:-75.4995908,lat:10.4050116},
                                      {lng:-75.5001594,lat:10.4024157},
                                      {lng:-75.5007651,lat:10.400074},
                                      {lng:-75.4976703,lat:10.3981947},
                                      {lng:-75.4966403,lat:10.3976249},
                                      {lng:-75.4955889,lat:10.3968334},
                                      {lng:-75.4942907,lat:10.3962108},
                                      {lng:-75.493765,lat:10.3959259},
                                      {lng:-75.49163,lat:10.3946279},
                                      {lng:-75.4909755,lat:10.3905756},
                                      {lng:-75.4894627,lat:10.3907233},
                                      {lng:-75.4833473,lat:10.393256},
                                      {lng:-75.4844095,lat:10.3938364},
                                      {lng:-75.4852034,lat:10.3941952},
                                      {lng:-75.4889048,lat:10.3943746},
                                      {lng:-75.4905571,lat:10.3949445},
                                      {lng:-75.4914476,lat:10.3958942},
                                      {lng:-75.4933573,lat:10.3982264},
                                      {lng:-75.4938401,lat:10.3996298},
                                      {lng:-75.4940869,lat:10.4006429},
                                      {lng:-75.4949023,lat:10.4018142},
                                      {lng:-75.4995908,lat:10.4050116},
                        ];

                        
                        // Construct the polygon.
                        const Zona_24 = new google.maps.Polygon({
                          paths: Zona24,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona25 = [
                        {lng:-75.5091045,lat:10.3860181},
                                      {lng:-75.5168628,lat:10.3848524},
                                      {lng:-75.5148458,lat:10.3835649},
                                      {lng:-75.5133867,lat:10.3831639},
                                      {lng:-75.5126786,lat:10.3826573},
                                      {lng:-75.509696,lat:10.3746791},
                                      {lng:-75.5097818,lat:10.3739403},
                                      {lng:-75.5090093,lat:10.3715974},
                                      {lng:-75.5082154,lat:10.3711964},
                                      {lng:-75.5085158,lat:10.3703099},
                                      {lng:-75.5088377,lat:10.3692756},
                                      {lng:-75.5087518,lat:10.3681359},
                                      {lng:-75.509181,lat:10.3674393},
                                      {lng:-75.5098891,lat:10.3674393},
                                      {lng:-75.509696,lat:10.366194},
                                      {lng:-75.5100393,lat:10.3649064},
                                      {lng:-75.510962,lat:10.3643787},
                                      {lng:-75.5106187,lat:10.3619725},
                                      {lng:-75.5097818,lat:10.3600939},
                                      {lng:-75.510168,lat:10.3591229},
                                      {lng:-75.5098891,lat:10.3574343},
                                      {lng:-75.5114126,lat:10.3570754},
                                      {lng:-75.5116856,lat:10.3551077},
                                      {lng:-75.5112028,lat:10.3534296},
                                      {lng:-75.5094218,lat:10.3529441},
                                      {lng:-75.5093145,lat:10.3516354},
                                      {lng:-75.5100012,lat:10.3481314},
                                      {lng:-75.5096364,lat:10.3469493},
                                      {lng:-75.5079198,lat:10.3447328},
                                      {lng:-75.503993,lat:10.3425797},
                                      {lng:-75.5042934,lat:10.3411443},
                                      {lng:-75.5073404,lat:10.3416087},
                                      {lng:-75.5091,lat:10.3407644},
                                      {lng:-75.5114174,lat:10.3382312},
                                      {lng:-75.5103874,lat:10.3313495},
                                      {lng:-75.5099583,lat:10.3267053},
                                      {lng:-75.5097437,lat:10.3168679},
                                      {lng:-75.5051517,lat:10.3108724},
                                      {lng:-75.5027056,lat:10.3026811},
                                      {lng:-75.5084562,lat:10.2998099},
                                      {lng:-75.5114603,lat:10.3025545},
                                      {lng:-75.5179834,lat:10.3011611},
                                      {lng:-75.5182838,lat:10.2959253},
                                      {lng:-75.52176,lat:10.2940252},
                                      {lng:-75.5178761,lat:10.2894861},
                                      {lng:-75.5068684,lat:10.2832578},
                                      {lng:-75.5008817,lat:10.2921673},
                                      {lng:-75.4972124,lat:10.295672},
                                      {lng:-75.4962897,lat:10.2967065},
                                      {lng:-75.495367,lat:10.3001688},
                                      {lng:-75.4952383,lat:10.309099},
                                      {lng:-75.4947448,lat:10.3096902},
                                      {lng:-75.4820847,lat:10.3097535},
                                      {lng:-75.4820418,lat:10.3291963},
                                      {lng:-75.4820847,lat:10.3359514},
                                      {lng:-75.4825568,lat:10.3378935},
                                      {lng:-75.4861188,lat:10.3440151},
                                      {lng:-75.4888225,lat:10.3494401},
                                      {lng:-75.4886937,lat:10.3497145},
                                      {lng:-75.4886179,lat:10.3579989},
                                      {lng:-75.4888439,lat:10.3586011},
                                      {lng:-75.4883075,lat:10.3595509},
                                      {lng:-75.4885864,lat:10.3615984},
                                      {lng:-75.4894662,lat:10.3632448},
                                      {lng:-75.4890953,lat:10.3697026},
                                      {lng:-75.4937148,lat:10.3689227},
                                      {lng:-75.4941869,lat:10.3699992},
                                      {lng:-75.4960751,lat:10.3717933},
                                      {lng:-75.4959249,lat:10.3728486},
                                      {lng:-75.4975772,lat:10.3758247},
                                      {lng:-75.4982853,lat:10.3763101},
                                      {lng:-75.4975128,lat:10.3775554},
                                      {lng:-75.4982209,lat:10.3777665},
                                      {lng:-75.4979788,lat:10.3780188},
                                      {lng:-75.4988217,lat:10.3782942},
                                      {lng:-75.4994869,lat:10.3767745},
                                      {lng:-75.5032635,lat:10.3783575},
                                      {lng:-75.5025768,lat:10.3799405},
                                      {lng:-75.5056882,lat:10.380637},
                                      {lng:-75.5067611,lat:10.3844995},
                                      {lng:-75.5091045,lat:10.3860181},
                        ];

                        
                        // Construct the polygon.
                        const Zona_25 = new google.maps.Polygon({
                          paths: Zona25,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });
                      //////////////////////////////////////////////77
                      //////////////////////////////////////77
                      const Zona26 = [
                        {lng:-75.5072753,lat:10.4520755},
                                      {lng:-75.505827,lat:10.4515691},
                                      {lng:-75.5044322,lat:10.4528879},
                                      {lng:-75.5040352,lat:10.4545339},
                                      {lng:-75.5044322,lat:10.4549137},
                                      {lng:-75.5044644,lat:10.4552935},
                                      {lng:-75.5031877,lat:10.457889},
                                      {lng:-75.5035203,lat:10.4589546},
                                      {lng:-75.5034773,lat:10.4594505},
                                      {lng:-75.5032628,lat:10.4596931},
                                      {lng:-75.5021899,lat:10.4601785},
                                      {lng:-75.5016964,lat:10.4609064},
                                      {lng:-75.494508,lat:10.4587752},
                                      {lng:-75.4941111,lat:10.4587752},
                                      {lng:-75.4938965,lat:10.4591234},
                                      {lng:-75.4938428,lat:10.4613074},
                                      {lng:-75.4985206,lat:10.4676692},
                                      {lng:-75.4969971,lat:10.468239},
                                      {lng:-75.4957633,lat:10.4692307},
                                      {lng:-75.4910426,lat:10.4734507},
                                      {lng:-75.4865043,lat:10.4790739},
                                      {lng:-75.48335,lat:10.4840534},
                                      {lng:-75.4797344,lat:10.4924931},
                                      {lng:-75.4788761,lat:10.4911849},
                                      {lng:-75.4785972,lat:10.4897502},
                                      {lng:-75.4784255,lat:10.4893282},
                                      {lng:-75.4796915,lat:10.4882944},
                                      {lng:-75.4797773,lat:10.4878513},
                                      {lng:-75.479198,lat:10.4871972},
                                      {lng:-75.4790049,lat:10.485889},
                                      {lng:-75.4778891,lat:10.481859},
                                      {lng:-75.4798417,lat:10.4754447},
                                      {lng:-75.4461532,lat:10.4750227},
                                      {lng:-75.4565601,lat:10.5001097},
                                      {lng:-75.4326778,lat:10.547282},
                                      {lng:-75.4525905,lat:10.5617107},
                                      {lng:-75.4529767,lat:10.5661404},
                                      {lng:-75.4507451,lat:10.5724685},
                                      {lng:-75.449286,lat:10.5803785},
                                      {lng:-75.4488568,lat:10.5890264},
                                      {lng:-75.4444366,lat:10.6033477},
                                      {lng:-75.4444795,lat:10.6045288},
                                      {lng:-75.4452519,lat:10.6061317},
                                      {lng:-75.4487281,lat:10.6085994},
                                      {lng:-75.4505091,lat:10.6109405},
                                      {lng:-75.4526548,lat:10.6154539},
                                      {lng:-75.4527192,lat:10.616656},
                                      {lng:-75.4521184,lat:10.6179003},
                                      {lng:-75.4475694,lat:10.6220129},
                                      {lng:-75.4336004,lat:10.6265472},
                                      {lng:-75.4249959,lat:10.6303012},
                                      {lng:-75.4202538,lat:10.6345823},
                                      {lng:-75.4184728,lat:10.6357},
                                      {lng:-75.4109197,lat:10.63783},
                                      {lng:-75.4058771,lat:10.6397702},
                                      {lng:-75.402637,lat:10.6430389},
                                      {lng:-75.3964357,lat:10.6528027},
                                      {lng:-75.3949981,lat:10.6540891},
                                      {lng:-75.3883462,lat:10.6563666},
                                      {lng:-75.3864794,lat:10.65624},
                                      {lng:-75.3807931,lat:10.6540469},
                                      {lng:-75.3733044,lat:10.6552067},
                                      {lng:-75.362833,lat:10.6588338},
                                      {lng:-75.3606834,lat:10.6591232},
                                      {lng:-75.3546753,lat:10.6578579},
                                      {lng:-75.3493538,lat:10.6590388},
                                      {lng:-75.3511152,lat:10.6554096},
                                      {lng:-75.3507504,lat:10.6527737},
                                      {lng:-75.3421459,lat:10.6547348},
                                      {lng:-75.3435192,lat:10.6607659},
                                      {lng:-75.3938374,lat:10.682738},
                                      {lng:-75.3955326,lat:10.6813675},
                                      {lng:-75.3959188,lat:10.6706135},
                                      {lng:-75.39888,lat:10.6642242},
                                      {lng:-75.4065618,lat:10.6576027},
                                      {lng:-75.4166684,lat:10.6514451},
                                      {lng:-75.4210029,lat:10.6446126},
                                      {lng:-75.4334483,lat:10.6371893},
                                      {lng:-75.4526837,lat:10.6281159},
                                      {lng:-75.4604084,lat:10.5923459},
                                      {lng:-75.5124218,lat:10.5729406},
                                      {lng:-75.5158551,lat:10.5616343},
                                      {lng:-75.5105336,lat:10.552859},
                                      {lng:-75.4942257,lat:10.5356452},
                                      {lng:-75.5022938,lat:10.5108354},
                                      {lng:-75.5002339,lat:10.5067847},
                                      {lng:-75.5036671,lat:10.5022275},
                                      {lng:-75.4997189,lat:10.494632},
                                      {lng:-75.4919941,lat:10.4870364},
                                      {lng:-75.512851,lat:10.456441},
                                      {lng:-75.5072753,lat:10.4520755},
                        ];

                        
                        // Construct the polygon.
                        const Zona_26 = new google.maps.Polygon({
                          paths: Zona26,
                          strokeColor: "#FF0000",
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: "#FF0000",
                          fillOpacity: 0.35,
                        });


        //////////////////zonas/7//////////////////77

  var tabla = $.ajax({  
        url:'./?action=rutas',
        dataType:'text',
        async:false
    }).responseText;
    //document.getElementById("divprueba2").innerHTML = tabla;

        var direcciones= JSON.parse(tabla);

        for(const property in direcciones){
        console.log(direcciones[property]["ciudad"]);
        console.log(direcciones[property]);
        console.log(property);
        const waypts = [];

    

              waypts.push({
                location: direcciones[property]["ciudad"]+",cartagena de indias",
                stopover: true,
          
              });



              

        directionsService.route(
                      {
                        origin:"TEMPO EXPRESS"+",cartagena de indias",
                        destination: ",cartagena de indias",
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
                          console.log(route.legs[i]);
                          
                            const routeSegment = i + 1;
                            summaryPanel.innerHTML +=
                              "<b>Route Segment: " + routeSegment + "</b><br>";
                            summaryPanel.innerHTML += route.legs[i].start_address + "<br> HASTA ---><br>";
                            summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
                            summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
                          


                              var latMen=parseFloat(route.legs[i].end_location.lat());
                              var longMen=parseFloat(route.legs[i].end_location.lng());


                                console.log(latMen);
                                console.log(longMen);
                                
                               

                           if(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_1)){

                               
                               var parametros = {
                                  "id" : direcciones[property]["id"],
                                  "zona" : "ZONA 1"
                              };
                            
                              }

                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_2));

                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_3));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_4)); 
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_7));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_8));
                              
                              if(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_9)){

                               
                               var parametros = {
                                  "id" : direcciones[property]["id"],
                                  "zona" : "ZONA 9"
                              };
                            
                              }
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_10));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_11));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_12));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_13));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_14));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_15));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_16));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_17));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_18));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_19));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_20));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_21));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_22));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_23));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_24));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_25));
                              
                              console.log(google.maps.geometry.poly.containsLocation(new google.maps.LatLng(latMen,longMen), Zona_26));
                              
                              
                        
                              function Zonificar(parametros){
                                          
                              

                                    $.ajax({
                                        url: './?action=zonificar' ,
                                        type: 'post' ,
                                        dataType: 'json',
                                        data: parametros,
                                            })
                              
                                      
                              }  

                              Zonificar(parametros);
                            
                            
                          }
                        } else {
                          window.alert("Directions request failed due to " + status);
                        }
                      }
                    );





        }






}




</script>


<script>


</script>

<div id="divprueba2">DATOS </div>
