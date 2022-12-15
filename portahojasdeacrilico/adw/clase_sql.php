<?php

function sql_typ_int(){
$nA = func_num_args();
if($nA>0){
return 'int('.func_get_arg(0).') NOT NULL';
}else{
return 'int(11) NOT NULL';
}
}

function sql_typ_float(){
$nA = func_num_args();
if($nA>0){
return 'float('.func_get_arg(0).') NOT NULL';
}else{
return 'float(11) NOT NULL';
}
}

function sql_typ_mediumtext(){
return 'mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL';
}

function sql_typ_varchar(){
$nA = func_num_args();
if($nA>0){
return 'varchar('.func_get_arg(0).') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL';
}else{
return 'varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL';
}
}

function sql_typ_date(){
return 'date NOT NULL';
}

function sql_typ_time(){
return 'time NOT NULL';
}

function sql_typ_timestamp(){
return 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP';
}

function sql_typ_boolean(){
return 'boolean NOT NULL';
}


class ClaseSQL {
	
	public $mysqli_c;
	public $basedatos;
	public $tabla;
	public $campos;
	public $campos_tipo;
	
	
	public function __construct($mysqli_c = NULL, $tabla = NULL, $campos = NULL, $campos_tipo = NULL){
		$this->mysqli_c = is_null($mysqli_c) ? $this->mysqli_c : $mysqli_c;
		$this->tabla = is_null($tabla) ? $this->tabla : $tabla;
		$this->campos = is_null($campos) ? $this->campos : $campos;
		$this->campos_tipo = is_null($campos_tipo) ? $this->campos_tipo : $campos_tipo;
		$sql = $this->mysqli_c->query('SELECT DATABASE()');
		$this->basedatos = $sql->fetch_row()[0];
	}
	
	
	// metodos
	
	public function crearTabla(){
		$valores = '';
		foreach($this->campos as $v => $camp){
			$valores .= ' `' . $camp . '` ' . $this->campos_tipo[$v] . ',';
		}
		$sql = 'CREATE TABLE IF NOT EXISTS `' . $this->tabla . '` (`_id` int(11) NOT NULL AUTO_INCREMENT, ' . $valores . ' PRIMARY KEY (`_id`)) DEFAULT CHARSET=latin1'; 
		$this->mysqli_c->query($sql);
	}
	
	
	public function borrarTabla(){
		$this->mysqli_c->query('DROP TABLE IF EXISTS ' . $this->tabla);
	}
	
	
	public function limpiarTabla(){
		$this->mysqli_c->query('TRUNCATE TABLE ' . $this->tabla);
	}
	
	
	public function insertar(){
		$ca = ''; foreach($this->campos as $c){$ca .= ',`' . $c . '`';}
		$ca = substr($ca, 1, strlen($ca));
		$va = ''; foreach(func_get_args() as $v){$va .= ',"' . $v . '"';}
		$va = substr($va, 1, strlen($va)); 
		$this->mysqli_c->query('INSERT INTO `' . $this->tabla . '` (' . $ca . ') VALUES (' . $va . ')');
		return $this->mysqli_c->insert_id;
	}
	
	
	public function insertar_a(){
		$ca = ''; foreach($this->campos as $c){$ca .= ',`' . $c . '`';}
		$ca = substr($ca, 1, strlen($ca));
		$va = ''; foreach(func_get_arg(0) as $v){$va .= ',"' . $v . '"';}
		$va = substr($va, 1, strlen($va)); 
		$this->mysqli_c->query('INSERT INTO `' . $this->tabla . '` (' . $ca . ') VALUES (' . $va . ')');
		return $this->mysqli_c->insert_id;
	}
	
	
	public function borrar(){
		$sql = trim(func_get_arg(0));
		if($sql == '*'){
			self::limpiarTabla();
		}else{
			$this->mysqli_c->query('DELETE FROM ' . $this->tabla . ' WHERE ' . $sql);
		}
	}
	
	
	public function actualizar(){
		$set = trim(func_get_arg(0));
		$numA = func_num_args();
		if($numA == 1){
			$this->mysqli_c->query('UPDATE ' . $this->tabla . ' SET ' . $set);
		}else if($numA == 2){
			$don = trim(func_get_arg(1));
			$this->mysqli_c->query('UPDATE ' . $this->tabla . ' SET ' . $set . ' WHERE ' . $don);
		}
	}
	
	
	public function numeroFilas(){
		$numA = func_num_args();
		if($numA == 0){
			$sql = 'SELECT COUNT(*) FROM ' . $this->tabla;
		}else if($numA == 1){
			$don = trim(func_get_arg(0));
			$sql = 'SELECT COUNT(*) FROM ' . $this->tabla . ' WHERE ' . $don;
		}
		$no = $this->mysqli_c->query($sql);
		$noC = $no->fetch_array();
		return $noC[0];
	}
	
	
	public function seleccionar(){
		$numA = func_num_args();
		if($numA == 0){
			$sql = 'SELECT * FROM ' . $this->tabla;
		}else if($numA == 1){
			$don = trim(func_get_arg(0));
			$sql = 'SELECT * FROM ' . $this->tabla . ' WHERE ' . $don;
		}
		return $this->mysqli_c->query($sql);
	}
	
	
	public function obtenerValor(){
		$no = $this->mysqli_c->query('SELECT * FROM ' . $this->tabla . ' WHERE ' . trim(func_get_arg(0)) );
		while( $row = $no->fetch_array()){
			$valor = $row[trim(func_get_arg(1))];
		}
		return $valor;
	}
	
	
	public function obtenerValores(){
		$no = $this->mysqli_c->query('SELECT * FROM ' . $this->tabla . ' WHERE ' . trim(func_get_arg(0)) );
		$valor = array();
		while( $row = $no->fetch_array()){
			foreach( explode(',', trim(func_get_arg(1))) as $val){
				$valor[$val] = $row[$val];
			}
		}
		return $valor;
	}
	
	
	public function campoExiste(){
		$col = trim(func_get_arg(0));
		$no = $this->mysqli_c->query('SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_NAME="' . $this->tabla . '" AND TABLE_SCHEMA="' . $this->basedatos . '" AND COLUMN_NAME="' . $col . '"');
		$noC = $no->fetch_array();
		return $noC[0];
	}
	
	
	public function camposExistentesDB(){
		$sql = $this->mysqli_c->query('SELECT * FROM information_schema.COLUMNS WHERE TABLE_NAME="' . $this->tabla . '" AND TABLE_SCHEMA="' . $this->basedatos . '"');
		$campos = array();
		while( $row = $sql->fetch_array() ){
			$campos[] = $row['COLUMN_NAME'];
		}
		return $campos;
	}
	
	
	public function campoPosicion(){
		$sql = $this->mysqli_c->query('SELECT * FROM information_schema.COLUMNS WHERE TABLE_NAME="' . $this->tabla . '" AND TABLE_SCHEMA="' . $this->basedatos . '" AND COLUMN_NAME="' . func_get_arg(0) . '"');
		return $sql->fetch_assoc()['ORDINAL_POSITION'];
	}
	
	
	public function agregarCampo(){
		$sql = $this->mysqli_c->query('ALTER TABLE  `' . $this->tabla . '` ADD  `' . trim(func_get_arg(0)) . '` '. trim(func_get_arg(1)));
	}
	
	
	public function agregarCamposNuevos(){
		$nomCam = self::camposExistentesDB();
		$campos = $this->campos;
		$tipo = $this->campos_tipo;
		foreach($campos as $k => $cam){
			if(!in_array($cam, $nomCam)){
				self::agregarCampo($cam , $tipo[$k]);
			}
		}
	}
	
	
	public function borrarCampos(){
		for($i=0 ; $i<func_num_args() ; $i++){
			$sql = $this->mysqli_c->query('ALTER TABLE  `' . $this->tabla . '` DROP  `' . trim(func_get_arg($i)) . '`');
		}
	}
	
	
	public function maximoID(){
		$numA = func_num_args();
		if($numA == 0){
			$sql = 'SELECT MAX(_id) AS _id FROM ' . $this->tabla;
		}else if($numA == 1){
			$don = trim(func_get_arg(0));
			$sql = 'SELECT MAX(_id) AS _id FROM ' . $this->tabla . ' WHERE ' . $don;
		}
		$sql = $this->mysqli_c->query($sql);
		$row = $sql->fetch_assoc();
		return $row['_id'];
	}
	
	
	public function maximoID2(){
		$numA = func_num_args();
		if($numA == 0){
			$sql = 'SELECT MAX(id) AS id FROM ' . $this->tabla;
		}else if($numA == 1){
			$don = trim(func_get_arg(0));
			$sql = 'SELECT MAX(id) AS id FROM ' . $this->tabla . ' WHERE ' . $don;
		}
		$sql = $this->mysqli_c->query($sql);
		$row = $sql->fetch_assoc();
		return $row['id'];
	}
	
	
	public function carEspMYSQL(){
		return $this->mysqli_c->real_escape_string( func_get_arg(0) );
	}
	
	
	public function __destruct(){
		unset($this->mysqli_c);
		unset($this->tabla);
		unset($this->campos);
		unset($this->campos_tipo);
	}
	
}

?>