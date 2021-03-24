<?php
$ruta=CsvData::getAll();
$i=0;
$arr = array();
foreach($ruta as $ruta):
if($ruta->ciudad=="CARTAGENA"){


  
  $arr[$i] =  $ruta->referencia2;
    $i++;

}
endforeach;

echo json_encode($arr);


?>
