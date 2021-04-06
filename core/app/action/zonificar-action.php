<?PHP


$csv=CsvData::getById($_POST["id"]);


$csv->estado=$_POST["zona"];
$csv->update();







?>