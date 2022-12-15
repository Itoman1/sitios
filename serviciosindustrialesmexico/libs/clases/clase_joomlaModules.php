<?php
date_default_timezone_set('America/Mexico_City');
set_time_limit(0);
header('Content-Type: text/html; charset=UTF-8');
require $_SERVER['DOCUMENT_ROOT'].'/DB/DB.php';
require $_SERVER['DOCUMENT_ROOT'].'/libs/clases/clase_sql.php';
		
define('c_HOST', 'localhost');
define('c_ROOT', JOroot() );
define('c_PASS', JOpass() );


class JoomlaModules {
	
	public $posicion;
	public $codigo;
	public $id;
	public $paginas_a;
	public $paginas;
	
	public function __construct( ){
		$this->posicion = func_get_arg(0);
		if( !is_array(func_get_arg(0)) ){ $this->posicion = array(func_get_arg(0)); }
		$this->codigo = func_get_arg(1);
		$this->id = func_get_arg(2);
		if( !is_array(func_get_arg(2)) ){ $this->id = array(func_get_arg(2)); }
		$numEle = count( $this->posicion );
		
		$mysqli_c = new mysqli(c_HOST, c_ROOT, c_PASS, c_DATA);
		$pre = c_PRE;

		$MOD = new ClaseSQL(
			$mysqli_c,
			$pre . 'modules',
			array(),
			array()
		);

		$MODMEN = new ClaseSQL(
			$mysqli_c,
			$pre . 'modules_menu',
			array(),
			array()
		);
		
		
		for( $i=0 ; $i<$numEle ; $i++){
			$MOD->actualizar('content="' . self::c( $this->codigo ) . '"', 'id=' . $this->id[$i]);
			$MOD->actualizar('showtitle=0', 'id=' . $this->id[$i]);
			$MOD->actualizar('position="posicion-' . $this->posicion[$i] . '"', 'id=' . $this->id[$i]);
		
		
			if( func_num_args() == 5 ){
			
				$this->paginas_a = func_get_arg(3);
				$this->paginas = func_get_arg(4);
				if( !is_array(func_get_arg(4)) ){ $this->paginas = array(func_get_arg(4)); }
				$pagina = $this->paginas_a[$this->paginas[$i]];
			
				if( $this->paginas == '' ){
					$MODMEN->borrar('moduleid=' . $this->id[$i]);				
					$MOD->actualizar('title="' . '__ninguna_' . $this->posicion[$i] . '"', 'id=' . $this->id[$i]);
				}else{
					if($MODMEN->numeroFilas('moduleid=' . $this->id[$i]) > 0){
						$MODMEN->actualizar('menuid=' . $pagina, 'moduleid=' . $this->id[$i]);
					}else{
						$MODMEN->insertar($this->id, $pagina);
					}				
					$MOD->actualizar('title="' . '__' . $this->paginas[$i] . '_' . $this->posicion[$i] . '"', 'id=' . $this->id[$i]);
				}
			
			}else if( func_num_args() == 3 ){
			
				$MOD->actualizar('title="' . '__todas_' . $this->posicion[$i] . '"', 'id=' . $this->id[$i]);
			
				if($MODMEN->numeroFilas('moduleid=' . $this->id[$i]) > 0){
					$MODMEN->actualizar('menuid=' . '0', 'moduleid=' . $this->id[$i]);
				}else{
					$MODMEN->insertar($this->id[$i], '0');
				}
			
			}
		
		}
		
	}
	
	
	public function c($cod){
		$bus_a = array();
		$ree_a = array();
	
		$car_a['"'] = '\"';
		
		$car_a['á'] = '&aacute;';
		$car_a['é'] = '&eacute;';
		$car_a['í'] = '&iacute;';
		$car_a['ó'] = '&oacute;';
		$car_a['ú'] = '&uacute;';
		$car_a['ñ'] = '&ntilde;';
		
		$car_a['Á'] = '&Aacute;';
		$car_a['É'] = '&Eacute;';
		$car_a['Í'] = '&Iacute;';
		$car_a['Ó'] = '&Oacute;';
		$car_a['Ú'] = '&Uacute;';
		$car_a['Ñ'] = '&Ntilde;';
	
		foreach($car_a as $k => $v){
			$bus_a[] = $k;
			$ree_a[] = $v;
		}
	
		return str_replace($bus_a, $ree_a, $cod);
	}
	
	
	public function __destruct(){
		unset( $this->posicion );
		unset( $this->codigo );
		unset( $this->id );
		unset( $this->paginas_a );
		unset( $this->paginas );
	}
	
}


function fila( $cod ){
	return '<div class="container"><div class="row">' . $cod . '</div></div>';
}

function col( $cols , $codi ){
	$c = explode(',' , $cols);
	$cod = '';
	if( count($c) == 1 ){
		$cod = 'col-xs-' . $cols;
	}else if( count($c) == 2 ){
		$cod = 'col-xs-' . $c[0] . ' col-md-' . $c[1];
	}else if( count($c) == 3 ){
		$cod = 'col-xs-' . $c[0] . ' col-sm-' . $c[1] . ' col-md-' . $c[2];
	}else if( count($c) == 4 ){
		$cod = 'col-xs-' . $c[0] . ' col-sm-' . $c[1] . ' col-md-' . $c[2] . ' col-lg-' . $c[3];
	}
	return '<div class="' . $cod . '">' . $codi . '</div>';
}

function parallax( $color ){
	return '<div class="my-parallax" data-parfondo="' . $color . '"></div>';
}

function parallaxImg( $img ){
	return '<div class="my-parallaxImg" data-parimagen="' . $img . '"></div>';
}

?>