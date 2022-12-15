<?php
include 'base.php';

$par_a = array();

foreach( $DB->campos as $k => $v ){
	if( $v == 'dia' ){
		$par_a[] = date('Y-m-d');
	}else if( $v == 'hora' ){
		$par_a[] = date('H:i:s');
	}else{
		$par_a[] = $_GET[$v];
	}
}

if( $DB->insertar_a( $par_a ) ){
	echo 1;
}else{
	echo 0;
}

?>