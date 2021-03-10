<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from colorlib.net/metrical/light/map-google.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:19:31 GMT -->
<head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Google Map | Metrical - Multipurpose Admin Dashboard Template</title>
      <!-- Main CSS -->			
      <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
      <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
      <link type="text/css" rel="stylesheet" href="assets/css/app.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/css/style.min.css"/>
      <!-- Favicon -->	
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>


   
		<script type="text/javascript">
var longitud;
var latitud;

navigator.geolocation.getCurrentPosition(function(pos){ 
   longitud=pos.coords.longitude;
   latitud=pos.coords.latitude;
    console.log("Found your location nLat : "+pos.coords.latitude+" nLang :"+pos.coords.longitude);
    
    // Markers Map
 markerMap = new GMaps({
		el: '#marker-map',
		lat: pos.coords.latitude,
		lng: pos.coords.longitude
	});

   
});
 
function tiempoReal()
{

if ("geolocation" in navigator){ //check geolocation available 
//try to get user current location using getCurrentPosition() method
navigator.geolocation.getCurrentPosition(function(position){ 
    console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
    document.getElementById("divprueba").innerHTML = "Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude;

  
	markerMap.addMarker({
      el: '#marker-map',
		lat: position.coords.latitude,
		lng: position.coords.longitude,
		title: 'Location',
		click: function (e) {
			$.niftyNoty({
				type: "info",
				icon: "fa fa-info",
				message: "You clicked in the marker",
				container: 'floating',
				timer: 3500
			});
		},
		infoWindow: {
			content: '<div>HTML Content</div>'
		}
	});

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





});
}else{
    console.log("Browser doesn't support geolocation!");
}



}
setInterval(tiempoReal, 1000);






            
    

</script>



    <div class="alert alert-info">
    <h2>NOTIFICACION DE PROCESOS EN TIEMPO REAL</h2>
    </div>

<div id="divprueba">DATOS</div>
<div id="divprueba2">DATOS </div>


<div class="col-md-6 col-lg-6">
                        <div class="card mg-b-20">
                           <div class="card-header">
                              <h4 class="card-header-title">
                                 Marker Map
                              </h4>
                              <div class="card-header-btn">
                                 <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse2" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                 <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                 <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                 <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                              </div>
                           </div>
                           <div class="card-body collapse show" id="collapse2">
                              <div id="marker-map" style="height:300px"></div>
                           </div>
                        </div>
                     </div>


      <!--/ Demo Sidebar End  -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/feather-icon/feather.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/pace/pace.min.js"></script>
      <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCbHHq3kJw1FOsPFmlzPlSN2t6LLaX_9TI"></script>
      <script src="assets/plugins/gmaps/gmaps.js"></script>
      <script src="assets/plugins/gmaps/prettify/prettify.js"></script>
  
      <script src="assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/highlight.min.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/custom.js"></script>
   </body>

<!-- Mirrored from colorlib.net/metrical/light/map-google.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:19:32 GMT -->
</html>