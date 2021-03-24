<?php


$csv=new CsvData();

if (isset($_POST['enviar']))
{
	
  $filename=$_FILES["file"]["name"];
  $info = new SplFileInfo($filename);
  $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

   if($extension == 'csv')
   {
	$filename = $_FILES['file']['tmp_name'];
	$handle = fopen($filename, "r");

	while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE )
	{
	
 $csv->guia=$data[0];
 	$csv->nombre=$data[1];
 	$csv->direccion=$data[2];
  $csv->ciudad=$data[3];
  $csv->referencia1=$data[4];
     $csv->referencia2=$data[5];
     $csv->guia_cliente=0;
   $csv->valor_declarado=0;
      
        $csv->add();
      echo "<br>";
	
   }

      fclose($handle);
   }
}

print "<script>window.location='index.php?';</script>";
?>
