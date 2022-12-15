<?php
date_default_timezone_set('America/Mexico_City');
include 'clase_sql.php';

define('c_HOST', 'localhost');
define('c_ROOT', 'carpetas_GONroot');
define('c_PASS', 'GONZpass@1');
define('c_DATA', 'carpetas_adwords');
$mysqli_c = new mysqli(c_HOST, c_ROOT, c_PASS, c_DATA);

$DB = new ClaseSQL(
	$mysqli_c , 
	'palabras' , 
	array( 
		'anun' , 'pala' , 'devi' , 'netw' , 'matc' , 
		'ubic' , 'devm' , 'posa' , 'adid' , 'gpid' , 
		'page' , 'dia' , 'hora'
	) , 
	array( 
		sql_typ_varchar() , sql_typ_mediumtext() , sql_typ_varchar() , sql_typ_varchar() , sql_typ_varchar() , 
		sql_typ_varchar() , sql_typ_varchar() , sql_typ_varchar() , sql_typ_varchar() , sql_typ_varchar() , 
		sql_typ_mediumtext() , sql_typ_date() , sql_typ_time() 
	)
);

?>