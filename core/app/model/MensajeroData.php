

<?php
class MensajeroData {
	public static $tablename = "mensajero";


	public function MensajeroData(){
		$this->id = ""; 
		$this->cc = "";
		$this->nombre = "";

	} 

   


	public function add(){
		$sql = "insert into mensajero (cc,nombre) ";
		$sql .= "value (\"$this->cc\",\"$this->nombre\")";
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
		return Model::one($query[0],new MensajeroData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MensajeroData());
	}

	public static function getByEmpresa($id){
		$sql = "select * from proceso where id_empresa='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MensajeroData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_empresa like '%$q%' or placa like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MensajeroData());

	}

	public static function contador(){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MensajeroData());

	}

	public static function contador2($dia){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso where start_date='".$dia."' group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MensajeroData());

	}
        

        

        

}

?>