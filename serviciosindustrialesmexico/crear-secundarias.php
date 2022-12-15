<?php
// include 'funciones.php';
// 
// $sec_a = json_decode( c_SECSP , true );
// 
// // echo '<pre>';
// // print_r( $sec_a );
// // echo '</pre>';
// 
// foreach( $sec_a as $k => $v ){
// 	foreach( $v['_contenido'] as $k2 => $v2 ){
// 		echo $k . '/' . $v2['_url'];
// 		
// 		$nombre_fichero = $_SERVER['DOCUMENT_ROOT'] . '/' . $k . '/' . $v2['_url'] . '.php';
// 		if( !file_exists($nombre_fichero) ){
// 			$line = '<?php require $_SERVER[\'DOCUMENT_ROOT\'].\'/funciones.php\'; pag_secundarias( ); ?>';
// 			$fp = fopen($nombre_fichero, 'x');
// 			fwrite($fp, $line . PHP_EOL); // escibir renglon
// 			fclose($fp);
// 		}
// 	}
// }
// 
?>