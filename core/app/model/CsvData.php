

<?php
class CsvData {
	public static $tablename = "direcciones";


	public function CsvData(){
		$this->guia = ""; 
		$this->nombre = "";
		$this->direccion = "";

        $this->ciudad = ""; 
		$this->referencia1 = "";
		$this->referencia2 = "";
        $this->guia_cliente = ""; 
		$this->valor_declarado = "";
		
  

	} 

   


	public function add(){
		$sql = "insert into direcciones (guia,nombre,direccion,ciudad,referencia1,referencia2,guia_cliente,valor_declarado)";
		$sql .= "value (\"$this->guia\",\"$this->nombre\",\"$this->direccion\",\"$this->ciudad\",\"$this->referencia1\",\"$this->referencia2\",\"$this->guia_cliente\",\"$this->valor_declarado\")";
		return Executor::doit($sql);
	}






	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return	Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClienteData previamente utilizamos el contexto
	

	public static function getById($id){
		$sql = "select * from proceso where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CsvData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CsvData());
	}

	public static function getByEmpresa($id){
		$sql = "select * from proceso where id_empresa='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CsvData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_empresa like '%$q%' or placa like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CsvData());

	}

	public static function contador(){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CsvData());

	}

	public static function contador2($dia){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso where start_date='".$dia."' group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CsvData());

	}
        

        

        

}

?>