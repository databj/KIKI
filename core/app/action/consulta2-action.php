<?php
$clientes = UserData::getById($_SESSION["user_id"]);
$ubicacion= UbicacionData::getByIdMensajero($clientes->is_dueno);

$ubicacion->lat=$_POST["lat"];
$ubicacion->lon=$_POST["lon"];
$var=$ubicacion->update();



?>