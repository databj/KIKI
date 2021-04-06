<?php
$ruta=CsvData::getAll();
$i=0;
$arr = array();
foreach($ruta as $ruta):

if($ruta->ciudad=="CARTAGENA"){


  
  $arr[$i]["ciudad"] =  $ruta->referencia2;
  $arr[$i]["id"] =  $ruta->id;

    $i++;

}
endforeach;

echo json_encode($arr);


?>
