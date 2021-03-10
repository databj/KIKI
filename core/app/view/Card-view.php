<html lang="es">

	<head>
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<script type="text/javascript">

		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'./?action=consulta',
				dataType:'text',
				async:false
			}).responseText;
			document.getElementById("divprueba2").innerHTML = tabla;


		

	   if ("geolocation" in navigator){ //check geolocation available 
    //try to get user current location using getCurrentPosition() method
    	navigator.geolocation.getCurrentPosition(function(position){ 
            console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
			document.getElementById("divprueba").innerHTML = "Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude;

			
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
		
		
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>NOTIFICACION DE PROCESOS EN TIEMPO REAL</h2>
			</div>
		</header>

		<section id="miTabla">
		</section>

      <div id="divprueba">DATOS</div>
	  <div id="divprueba2">DATOS </div>
		

		<footer>
		</footer>
	</body>
</html>





