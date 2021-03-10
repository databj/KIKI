<?php
$ubicacion=new UbicacionData();
$ubicacion->id=1;
$ubicacion->id_mensajero=1;
$ubicacion->lat=$_POST["lat"];
$ubicacion->lon=$_POST["lon"];
$var=$ubicacion->update();



?>