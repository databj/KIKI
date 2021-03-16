<?php
$ruta=CsvData::getAll();
$i=0;
$arr = array();
foreach($ruta as $ruta):
if($ruta->ciudad=="CARTAGENA BOLÍVAR"){


  
    $arr[$i] =  $ruta->direccion;
    $i++;

}
endforeach;

echo json_encode($arr);


?>
