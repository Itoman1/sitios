<?php
header('Content-Type: text/html; charset=UTF-8');


$sec_a2 = array(
	'PUBLICIDAD' => array(
		'_contenido' => array(
			'Promocionales' => array( ) , 
			'Portahojas de Acrílico' => array( ) , 
			'Anuncios' => array(
				'_imagenes' => array(
					'1' => 'Anuncio luminoso tipo caja' , 
					'2' => 'Anuncio luminoso tipo caja' , 
					'3' => 'Anuncio luminoso tipo caja' , 
					'4' => 'Totems de exhibición para productos' , 
					'5' => 'Anuncio en acrilico con relieves en corte laser' , 
					'6' => 'Anuncio luminoso tipo caja' , 
					'7' => 'Anuncio luminoso tipo caja' , 
					'8' => 'Totems de exhibición para productos' , 
					'9' => 'Anuncio en acrilico en corte laser'
				)
			) , 
			'Señalética Industrial y Vial' => array(
				'_imagenes' => array(
					'1' => 'Señalética vial' , 
					'2' => 'Señalética en alucobond con rótulo en recorte de vinil' , 
					'3' => 'Letrero en exterior para estacionamiento' , 
					'4' => 'Señalética en alucobond con rótulo en recorte de vinil' , 
					'5' => 'Señalética en alucobond con rótulo en recorte de vinil' , 
					'6' => 'Señalética vial' , 
					'7' => 'Números para exteriores'
				)
			) , 
			'Impresiones y Vinil' => array(
				'_imagenes' => array(
					'1' => 'Impresión en lonas' , 
					'2' => 'Impresión para vinil' , 
					'3' => 'Impresión para vinil en muro' , 
					'4' => 'Impresión para boletería'
				)
			) , 
			'Tableros Informativos y Pizarrones' => array(
				'_imagenes' => array(
					'1' => 'Tablero tipo vitrina para exhibición de premios' , 
					'2' => 'Tablero tipo cubo luminoso' , 
					'3' => 'Tablero informativo area de producción' , 
					'4' => 'Tablero informativo tipo mampara luminosa con portadocumentos metálico' , 
					'5' => 'Estructuras para proyectores'
				)
			) , 
			'Placas y Grabados en Láser' => array( ) , 
			'Bordado' => array(
				'_imagenes' => array(
					'1' => 'Bordado' , 
					'2' => 'Bordado' , 
					'3' => 'Bordado'
				)
			)
		)
	) , 
	'SERVICIOS INDUSTRIALES' => array(
		'_contenido' => array(
			'Aplicación de Pintura Industrial' => array(
				'_imagenes' => array(
					'1' => 'Aplicación de pintura industrial' , 
					'2' => 'Aplicación de pintura industrial'
				)
			) , 
			'Tablaroca' => array(
				'_imagenes' => array(
					'1' => 'Tablaroca' , 
					'2' => 'Tablaroca' , 
					'3' => 'Tablaroca'
				)
			) , 
			'Muro de Durock' => array(
				'_imagenes' => array(
					'1' => 'Muro de Durock' , 
					'2' => 'Muro de Durock'
				)
			) , 
			'Plafón Reticular' => array( ) , 
			'Trabajos de Pailería' => array( ) , 
			'Instalaciones Eléctricas' => array( )
		)
	)//  , 
// 	'LIMPIEZA INDUSTRIAL' => array(
// 		'_contenido' => array(
// 			'Pisos Cerámicos' => array( ) , 
// 			'Limpieza de Mamparas' => array( ) , 
// 			'Baños en Empresas' => array( ) , 
// 			'Muros de Colchoneta' => array( )
// 		)
// 	)
);

define( 'c_SECS' , json_encode( arrs( $sec_a2 ) ) );
$sec_a = json_decode( c_SECS , true );

define( 'c_SECSP' , json_encode( arrsP( $sec_a2 ) ) );
$secP_a = json_decode( c_SECSP , true );


// function arrs( $sec_a2 ){
// 	$sec_a = array();
// 	foreach( $sec_a2 as $k => $v ){
// 		if( is_array( $v ) ){
// 			$sec_a[$k] = arrs( $v );
// 		}
// 		if( $k != '_contenido' ){
// 			if( !array_key_exists('_url' , $v) ){ $sec_a[$k]['_url'] = nompags( $k ) ; }
// 		}
// 	}
// 	return $sec_a;
// }


function codigo_analytics(){
	return '<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114834803-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'UA-114834803-1\');
</script>

';
}


function arrs( $sec_a2 ){
	$sec_a = array();
	foreach( $sec_a2 as $k => $v ){
		if( is_array( $v ) ){
			$sec_a[$k] = arrs( $v );
			if( $k == '_contenido' ){
			
			}else if( $k == '_imagenes' ){
				
			}else{
				if( !array_key_exists('_url' , $v) ){ $sec_a[$k]['_url'] = nompags( $k ) ; }
			}
		}else{
			$sec_a[$k] = $v;
		}
	}
	return $sec_a;
}


function arrsP( $sec_a2 ){
	$sec_a = array();
	foreach( $sec_a2 as $k => $v ){
		if( is_array( $v ) ){
			$sec_a[ nompags( $k ) ] = arrsP( $v );
			if( $k == '_contenido' ){
			
			}else if( $k == '_imagenes' ){
				
			}else{
				if( !array_key_exists('_url' , $v) ){ $sec_a[ nompags( $k ) ]['_url'] = nompags( $k ) ; }
				$sec_a[ nompags( $k ) ]['_nombre'] = $k ;
			}
		}else{
			$sec_a[nompags( $k )] = $v;
		}
	}
	return $sec_a;
}


function nompags( $p ){
	$b = explode(',' , 'á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ, ' );
	$r = explode(',' , 'a,e,i,o,u,n,A,E,I,O,U,N,-' );
	return strtolower( str_replace( $b , $r , $p ) );
}



function menu(){
	return '<center class="hidden-xs">
<a href="/" class="item_menu">INICIO</a>
<a href="/nosotros.php" class="item_menu">NOSOTROS</a>
<a href="/publicidad.php" class="item_menu">PUBLICIDAD</a>
<a href="/servicios-industriales.php" class="item_menu">SERVICIOS INDUSTRIALES</a>
<!-- <a href="/limpieza-industrial.php" class="item_menu">LIMPIEZA INDUSTRIAL</a> -->
<a href="/clientes.php" class="item_menu">CLIENTES</a>
<a href="/contacto.php" class="item_menu">CONTACTO</a>
</center>

<center class="hidden-sm hidden-md hidden-lg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">INICIO <span class="sr-only">(current)</span></a></li>
        <li><a href="/nosotros.php">NOSOTROS</a></li>
        <li><a href="/publicidad.php">PUBLICIDAD</a></li>
        <li><a href="/servicios-industriales.php">SERVICIOS INDUSTRIALES</a></li>
        <!-- <li><a href="/limpieza-industrial.php">LIMPIEZA INDUSTRIAL</a></li> -->
        <li><a href="/clientes.php">CLIENTES</a></li>
        <li><a href="/contacto.php">CONTACTO</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</center>';
}




function html_header( $t , $c , $k , $d ){

return '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>' . $t . ' | Servicios Industriales | Publicidad | Limpieza Industrial</title>
<meta name="keywords" content="' . $k . '  Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<meta name="description" content="' . $d . '">
<meta name="viewport" content="width=device-width">

' . codigo_analytics() . '

<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/libs/bootstrap/css/main.css">
<link rel="stylesheet" href="/estilo.css">

<script src="/libs/bootstrap/js/vendor/modernizr-2.6.2.min.js"></script>
' . $c . '


</head>
<body>

<section class="seccion seccion elemento_4 seccion_header" data-miid="4" data-claseid="4" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="container contenedor elemento_5" data-miid="5" data-claseid="5" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="row fila elemento_6" data-miid="6" data-claseid="6" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="col-xs-12 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/index.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_8" src="/images/imgs/logo.png" data-miid="8" data-claseid="8" title="logo" alt="logo | Servicios Industriales | Servicios para Empresas | " /></a></div><div class="sep modificar_contenido sep_8" data-miid="8" data-claseid="8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Servicios para Empresas en Silao y el Bajío - Tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . menu() . '</p></div><div class="sep modificar_contenido sep_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div></div></div><div class="seccionestilo" data-seccionestilo="background:#000000" style="display:none;" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></section>';
}



function html_header2( $t , $c , $k , $d ){

return '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>' . $t . ' | Servicios Industriales | Publicidad | Limpieza Industrial</title>
<meta name="keywords" content="' . $k . '  Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<meta name="description" content="' . $d . '">
<meta name="viewport" content="width=device-width">

' . codigo_analytics() . '

<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/libs/bootstrap/css/main.css">
<link rel="stylesheet" href="/estilo.css">

<script src="/libs/bootstrap/js/vendor/modernizr-2.6.2.min.js"></script>
' . $c . '


</head>
<body>

<section class="seccion seccion elemento_4 seccion_header" data-miid="4" data-claseid="4" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="container contenedor elemento_5" data-miid="5" data-claseid="5" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="row fila elemento_6" data-miid="6" data-claseid="6" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="col-xs-12 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/index.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_8" src="/images/imgs/logo.png" data-miid="8" data-claseid="8" title="logo" alt="logo | Servicios Industriales | Servicios para Empresas | " /></a></div><div class="sep modificar_contenido sep_8" data-miid="8" data-claseid="8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Servicios para Empresas en Silao y el Bajío - Tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . menu() . '</p></div><div class="sep modificar_contenido sep_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div></div></div><div class="parallax" data-imagen="/images/imgs/banner-principal-' . nompags( $t ) . '.jpg" style="display:none;" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div style="height:150px;"></div></section>';
}



function html_header3( $t , $i , $c , $k , $d ){

return '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>' . $t . ' | Servicios Industriales | Publicidad | Limpieza Industrial</title>
<meta name="keywords" content="' . $k . '  Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<meta name="description" content="' . $d . '">
<meta name="viewport" content="width=device-width">

' . codigo_analytics() . '

<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/libs/bootstrap/css/main.css">
<link rel="stylesheet" href="/estilo.css">

<script src="/libs/bootstrap/js/vendor/modernizr-2.6.2.min.js"></script>
' . $c . '


</head>
<body>

<section class="seccion seccion elemento_4 seccion_header" data-miid="4" data-claseid="4" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="container contenedor elemento_5" data-miid="5" data-claseid="5" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="row fila elemento_6" data-miid="6" data-claseid="6" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="col-xs-12 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/index.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_8" src="/images/imgs/logo.png" data-miid="8" data-claseid="8" title="logo" alt="logo | Servicios Industriales | Servicios para Empresas | " /></a></div><div class="sep modificar_contenido sep_8" data-miid="8" data-claseid="8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Servicios para Empresas en Silao y el Bajío - Tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . menu() . '</p></div><div class="sep modificar_contenido sep_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div></div></div><div class="parallax" data-imagen="/images/imgs/banner-principal-' . nompags( $i ) . '.jpg" style="display:none;" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div style="height:150px;"></div></section>';
}



function html_headerH( $t , $c , $k , $d ){

$cod = '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>' . $t . ' | Servicios Industriales | Publicidad | Limpieza Industrial</title>
<meta name="keywords" content="' . $k . '  Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<meta name="description" content="' . $d . '">
<meta name="viewport" content="width=device-width">

' . codigo_analytics() . '

<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/libs/bootstrap/css/main.css">
<link rel="stylesheet" href="/estilo.css">

<script src="/libs/bootstrap/js/vendor/modernizr-2.6.2.min.js"></script>
' . $c . '


</head>
<body>

<section class="seccion seccion elemento_4 seccion_header" data-miid="4" data-claseid="4" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas" style="background:#000000;">
<div class="container contenedor elemento_5" data-miid="5" data-claseid="5" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<div class="row fila elemento_6" data-miid="6" data-claseid="6" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<div class="col-xs-12 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/index.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_8" src="/images/imgs/logo.png" data-miid="8" data-claseid="8" title="logo" alt="logo | Servicios Industriales | Servicios para Empresas | " /></a></div><div class="sep modificar_contenido sep_8" data-miid="8" data-claseid="8" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Servicios para Empresas en Silao y el Bajío - Tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_9" data-miid="9" data-claseid="9" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . menu() . '</p></div><div class="sep modificar_contenido sep_10" data-miid="10" data-claseid="10" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>
</div>
</div>

<!--div class="row fila elemento_6" data-miid="6" data-claseid="6" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<div class="col-xs-12 col-sm-6 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<center>
<a href="#">
<img src="/images/imgs/servicios-industriales-conoce-mas.png" style="width:90%; margin-top:60px;" />
</a>
</center>
</div>
<div class="col-xs-12 col-sm-6 columnas elemento_7" data-miid="7" data-claseid="7" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<center>
<img src="/images/imgs/servicios-industriales-coordinador.png" style="width:60%;" />
</center>
</div>
</div-->

</div>
<br />
</div>';


$cod .= '<div id="myCarousel" class="carousel slide" data-interval="3000">
<ol class="carousel-indicators">';

$imgs = array();
$link = array();

$imgs[] = 'banner-promocionales.jpg';
$imgs[] = 'banner-publicidad.jpg';
$imgs[] = 'banner-servicios-industriales.jpg';
// $imgs[] = 'banner-servicios-de-limpieza.jpg';
$imgs[] = 'banner-portahojas-de-acrilico.jpg';

$link[] = '/publicidad.php';
$link[] = '/publicidad.php';
$link[] = '/servicios-industriales.php';
// $link[] = '/servicios-de-limpieza.php';
$link[] = '/publicidad/portahojas-de-acrilico.php';


foreach($imgs as $v => $img){
if($v==0){$act=' class="active"';}else{$act='';}
	$cod .= '<li data-target="#myCarousel" data-slide-to="'.$v.'"'.$act.'></li>';
}

$cod .= '</ol>
	<div class="carousel-inner">';

foreach($imgs as $v => $img){
if($v==0){$act='active ';}else{$act='';}
$cod .= '<div class="'.$act.'item">
<a href="' . $link[$v] . '">
			<img src="/images/imgs/'.$img.'" width="100%" />
</a>';
		
$cod .= '</div>
		';
}
	
$cod .= '</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
</div>';

$cod .= '
<!--div class="parallax" data-imagen="/images/imgs/banner-principal-home.jpg" style="display:none;" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"--></section>';

return $cod;
}




function html_footer( $c ){

$sec_a = json_decode( c_SECS , true );

$cod = '<section class="seccion elemento_3" data-miid="3" data-claseid="3" style="border-top:1px solid #fff;"><div class="container contenedor elemento_39" data-miid="39" data-claseid="39" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="row fila elemento_40" data-miid="40" data-claseid="40" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">';

foreach( $sec_a as $k => $v ){
$lnk = nompags( $v['_url'] );
$cod .= '<div class="col-xs-12 col-sm-6 col-md-3 columnas elemento_41" data-miid="41" data-claseid="41" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_42" data-miid="42" data-claseid="42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $k . '</p></div><div class="sep modificar_contenido sep_42" data-miid="42" data-claseid="42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_43" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><table class="bullet contenido elemento_43" data-miid="43" data-claseid="43" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">';

foreach( $v['_contenido'] as $kS => $vS ){
$lnkS = nompags( $vS['_url'] );
$cod .= '<tr><td class="tabcol1" valign="top" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_44" src="/images/imgs/icono-flecha-blanco.png" data-miid="44" data-claseid="44" title="" alt=" | Servicios Industriales | Servicios para Empresas | " /></td><td class="tabcol2" valign="top" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_45" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/' . $lnk . '/' . $lnkS . '.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_45" data-miid="45" data-claseid="45" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $kS . '</p></a></div><div class="sep modificar_contenido sep_45" data-miid="45" data-claseid="45" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></td></tr>';
}

$cod .= '</table></div><div class="sep modificar_contenido sep_43" data-miid="43" data-claseid="43" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div>';
}

$cod .= '<div class="col-xs-12 col-sm-6 col-md-3 columnas elemento_51" data-miid="51" data-claseid="51" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_42" data-miid="52" data-claseid="42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">CONTÁCTANOS</p></div><div class="sep modificar_contenido sep_42" data-miid="52" data-claseid="42" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_53" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_53" data-miid="53" data-claseid="53" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Llámanos a los tels.<br /><br /><span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_53" data-miid="53" data-claseid="53" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_54" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_54" data-miid="54" data-claseid="54" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Horarios de atención:<br /> Lunes a Viernes de 8 a 18 hrs.</p></div><div class="sep modificar_contenido sep_54" data-miid="54" data-claseid="54" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div></div></div><div class="seccionestilo" data-seccionestilo="background:#000000" style="display:none;" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></section>



<script src="/libs/bootstrap/js/vendor/jquery-1.10.1.min.js"></script>
<script src="/libs/bootstrap/js/vendor/jquery-ui.min.js"></script>
<script src="/libs/bootstrap/js/vendor/bootstrap.js"></script>
<script src="/libs/bootstrap/js/main.js"></script>
<script>


function caracter( c ){
	var n = parseInt( c ) - 65;
	var abc = \'abcdefghijklmnopqrstuvwxyz\';
	abc = abc.split(\'\');
	var l = abc[ n ];
	if( l != undefined && l != null ){
		return l.toLowerCase();
	}
}

$.urlParam = function(name){
	var results = new RegExp(\'[\?&]\' + name + \'=([^&#]*)\').exec(window.location.href);
	if (results==null){
		return null;
	}else{
		return results[1] || 0;
	}
} // decodeURIComponent($.urlParam(\'nom\'))

$().ready(function(){
	if($(document).width() <= 768 ){ $(\'.tds1\').attr(\'align\' , \'left\'); }
	else if($(document).width() > 768){ $(\'.tds1\').attr(\'align\' , \'right\'); }
		
	$(window).resize(function(){
		if($(document).width() <= 768 ){ $(\'.tds1\').attr(\'align\' , \'left\'); }
		else if($(document).width() > 768){ $(\'.tds1\').attr(\'align\' , \'right\'); }
	});
		
	$(\'.navbar-nav li a\').each(function(){
		var obj = $(this);
		var page = window.location.pathname.split(\'/\')[1];
		if( obj.attr(\'data-href\') == \'/\' + page ){ obj.parent().addClass(\'active\'); }
	});


function nums( t ){
	var n = "0123456789";
	n = n.split("");
	t = t.split("");
	var nu = "";
	for( var i in t ){
		var num = t[i];
		if( n.indexOf( num ) != -1 ){ nu += num; }
	}
	return nu;
}

$(\'.marcar_tel1 , .marcar_tel2 , .marcar_tel3\').each(function(){
	var obj = $(this);
	obj.click( function(){
		window.location.href = \'tel:\' + nums( obj.text() );
// 		console.log( nums( obj.text() ) );
	});
});

	
// $( window ).scroll(function() {
//   if( $(window).scrollTop() > $(\'#mi_menu\').position().top ){
//   	$(\'#mi_menu .navbar\').addClass(\'navbar-fixed-top\');
//   	$(\'#logo-menu2\').show();
//   }else{
//   	$(\'#mi_menu .navbar\').removeClass(\'navbar-fixed-top\');
//   	$(\'#logo-menu2\').hide();
//   }
// });
	
	
	function my_function_parallaxImg( obj , img ){
		if( obj.parent().prop(\'tagName\').toLowerCase() != \'section\' ){
			my_function_parallaxImg( obj.parent(), img );
		}else if( obj.parent().prop(\'tagName\').toLowerCase() == \'section\' ){
			obj.parent().css({
				\'background\': \'url(\' + img + \') 50% 0 no-repeat fixed\',
				\'background-size\' : \'cover\'
			});
		}
	}
	
	$(\'.parallax\').each(function(){
		var obj = $(this);
		var img = obj.attr(\'data-imagen\');
		var pare = my_function_parallaxImg( obj, img );
	});
	
	
	function my_function_seccionEstilo( obj , estilo ){
		if( obj.parent().prop(\'tagName\').toLowerCase() != \'section\' ){
			my_function_seccionEstilo( obj.parent(), estilo );
		}else if( obj.parent().prop(\'tagName\').toLowerCase() == \'section\' ){
			var est = estilo.split(\';\');
			for( var e in est ){
				if( est[e].trim() != undefined && est[e].trim() != null && est[e].trim() != \'\' ){
					var prop = est[e].trim().split(\':\');
					obj.parent().css( prop[0].trim() , prop[1].trim() );
				}
			}
		}
	}
	
	$(\'.seccionestilo\').each(function(){
		var obj = $(this);
		var estilo = obj.attr(\'data-seccionestilo\');
		if( estilo != undefined && estilo != null && estilo != \'\' ){
			var pare = my_function_seccionEstilo( obj, estilo );
		}
	});
	

	$(\'#btn_Cancelar\').click(function(e){
		window.location.href = \'final.php?admon_tipo=agregar&tabla=\';
	});
	
	$(\'.boton_borrar\').click(function(e){
		e.preventDefault();
		var conf = confirm(\'¿Deseas borrar este registro?\');
		if( conf == true ){
			window.location.href = $(this).attr(\'href\');
		}
	});
	
// 	$(\'.ordenTB\').sortable({
// 		update : function( e , ui){
// 			var orden = ui.item.index() + 1;
// 			var id = ui.item.data(\'miid\');
// 			var tabla = \'\';
// // 			$.post(\'orden.php\' , { orden:orden , id:id , tabla:tabla } , function( data ){
// // 				console.log( data );
// // 			});
// 			window.location.href = \'final.php?admon_tipo=orden&tabla=\' + tabla + \'&orden=\' + orden + \'&id=\' + id;
// 		}
// 	});
	

$(\'[href="/publicidad/portahojas-de-acrilico.php"]\')
	.attr(\'href\' , \'http://www.portahojasdeacrilico.com\')
	.attr(\'target\' , \'_blank\');
	
$(".carousel").carousel({ interval: 5000 });
	
})

' . $c . '

</script>';

return $cod;
}


function pag_principales( $pag ){
$sec_a = json_decode( c_SECS , true );

$cod = '<section class="seccion seccion elemento_59" data-miid="59" data-claseid="59" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="container contenedor elemento_60" data-miid="60" data-claseid="60" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">

<div class="row fila elemento_61" data-miid="61" data-claseid="61" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<div class="col-xs-12 col-sm-9 columnas elemento_63" data-miid="63" data-claseid="63" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">

<div class="padre_elemento_65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_65" data-miid="65" data-claseid="65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $pag . '</p></div>
<div class="sep modificar_contenido sep_65" data-miid="65" data-claseid="65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_66" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">


<div class="row fila elemento_61" data-miid="61" data-claseid="61" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">';

foreach( $sec_a[$pag]['_contenido'] as $k => $v ){
$cod .= '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 columnas elemento_63" data-miid="63" data-claseid="63" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><center>
<a href="/' . nompags( $pag ) . '/' . nompags( $k ) . '.php">
<img src="/images/imgs/' . nompags( $k ) . '-1.jpg" width="90%" />
<div style="min-height:100px; padding-top:10px;">
<div class="padre_elemento_68" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_68" data-miid="68" data-claseid="68" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $k . '</p></div>
</div></a>
</center></div>';
}

$cod .= '</div>

</div><div class="sep modificar_contenido sep_66" data-miid="66" data-claseid="66" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>

<div class="rectangulo contenido modificar_contenido elemento_69" data-miid="69" data-claseid="69" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_70" data-miid="70" data-claseid="70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><span style="color:#FFFF72;">TODOS NUESTROS PRODUCTOS y SERVICIOS</span> cuentan con <span style="color:#FFFF72;">GARANTÍA</span> ¿Te gustaría conocer más acerca de ella?</p></div><div class="sep modificar_contenido sep_70" data-miid="70" data-claseid="70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_71" data-miid="71" data-claseid="71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Llámanos al tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_71" data-miid="71" data-claseid="71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_72" data-miid="72" data-claseid="72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Será un gusto brindarte la información que necesitas.</p></div><div class="sep modificar_contenido sep_72" data-miid="72" data-claseid="72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>

</div></div>

<div class="col-xs-12 col-sm-3 columnas elemento_64" data-miid="64" data-claseid="64" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="rectangulo contenido modificar_contenido elemento_73" data-miid="73" data-claseid="73" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_74" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_74" data-miid="74" data-claseid="74" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">CONOCE MÁS ACERCA DE NUESTROS OTROS SERVICIOS</p></div><div class="sep modificar_contenido sep_74" data-miid="74" data-claseid="74" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>';


foreach( $sec_a as $k=> $v ){
	if( $k != $pag ){
		$cod .= '<div class="padre_elemento_75" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/' . $v['_url'] . '.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_75" src="/images/imgs/banner-home-' . nompags( $k ) . '.jpg" data-miid="75" data-claseid="75" title="banner home servicios industriales" alt="banner home servicios industriales | Servicios Industriales | Servicios para Empresas | " /></a></div><div class="sep modificar_contenido sep_75" data-miid="75" data-claseid="75" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_76" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/' . $v['_url'] . '.php" class="link" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_76" data-miid="76" data-claseid="76" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $k . '</p></a></div><div class="sep modificar_contenido sep_76" data-miid="76" data-claseid="76" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>';
	}
}

$cod .= '</div></div></div></div></section>';

return $cod;
}





function pag_secundarias(){
	$url_a = explode('/' , $_SERVER['REQUEST_URI']);
	$sec_a = json_decode( c_SECSP , true );

	$pag_a = $sec_a[ trim( $url_a[1] ) ][ '_contenido' ][ str_replace( '.php' , '' , trim( $url_a[2] ) ) ];

	$nombre = $pag_a[ '_nombre' ];
	
	echo html_header3( $nombre , $sec_a[ trim( $url_a[1] ) ]['_nombre']  , '' , '' , '' );
	
	
$cod = '<section class="seccion seccion elemento_59" data-miid="59" data-claseid="59" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="container contenedor elemento_60" data-miid="60" data-claseid="60" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">

<div class="row fila elemento_61" data-miid="61" data-claseid="61" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">
<div class="col-xs-12 col-sm-9 columnas elemento_63" data-miid="63" data-claseid="63" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">

<div class="padre_elemento_65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_65" data-miid="65" data-claseid="65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $nombre . '</p></div>
<div class="sep modificar_contenido sep_65" data-miid="65" data-claseid="65" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_66" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">


<div class="row fila elemento_61" data-miid="61" data-claseid="61" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">';

$img_a = array();
if( !array_key_exists('_imagenes' , $pag_a) ){
	$img_a['1'] = strtolower( $nombre );
}else{
	$img_a = $pag_a[ '_imagenes' ];
}

foreach( $img_a as $k => $v ){
	$cod .= '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 columnas elemento_63" data-miid="63" data-claseid="63" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><center>
<a data-toggle="modal" data-target="#myModal">
<img src="/images/imgs/' . nompags( $nombre ) . '-' . $k . '.jpg" width="90%" onclick="$(\'#imagen-modal\').attr(\'src\' , \'/images/imgs/' . nompags( $nombre ) . '-' . $k . '.jpg\')" />
</a>
<div style="min-height:100px; padding-top:10px;">
<div class="padre_elemento_68" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_68" data-miid="68" data-claseid="68" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $nombre . '</p></div>
</div>
</center></div>';
}

$cod .= '
</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 columnas elemento_119" data-miid="119" data-claseid="119" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="rectangulo contenido modificar_contenido elemento_120" data-miid="120" data-claseid="120" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_121" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_121" data-miid="121" data-claseid="121" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Menú</p></div><div class="sep modificar_contenido sep_121" data-miid="121" data-claseid="121" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_122" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><table class="bullet contenido elemento_122" data-miid="122" data-claseid="122" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">';

foreach( $sec_a[ trim( $url_a[1] ) ][ '_contenido' ] as $kPro => $vPro ){
if( $nombre != $vPro['_nombre'] ){
$cod .= '<tr><td class="tabcol1" valign="top" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><img class="modificar_contenido elemento_123" src="/images/imgs/icono-flecha-blanco.png" data-miid="123" data-claseid="123" title="" alt=" | Servicios Industriales | Servicios para Empresas | " /></td><td class="tabcol2" valign="top" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_124" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><a href="/' . trim( $url_a[1] ) . '/' . $vPro['_url'] . '.php"><p class="texto contenido modificar_contenido elemento_124" data-miid="124" data-claseid="124" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">' . $vPro['_nombre'] . '</p></a></div><div class="sep modificar_contenido sep_124" data-miid="124" data-claseid="124" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></td></tr>';
}
}


$cod .= '</table></div><div class="sep modificar_contenido sep_122" data-miid="122" data-claseid="122" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div></div>

</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-9">
<div class="sep modificar_contenido sep_66" data-miid="66" data-claseid="66" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>

<div class="rectangulo contenido modificar_contenido elemento_69" data-miid="69" data-claseid="69" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><div class="padre_elemento_70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_70" data-miid="70" data-claseid="70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><span style="color:#FFFF72;">TODOS NUESTROS PRODUCTOS y SERVICIOS</span> cuentan con <span style="color:#FFFF72;">GARANTÍA</span> ¿Te gustaría conocer más acerca de ella?</p></div><div class="sep modificar_contenido sep_70" data-miid="70" data-claseid="70" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_71" data-miid="71" data-claseid="71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Llámanos al tel. <span class="marcar_tel1">(472) 127 1839</span>, <span class="marcar_tel2">(477) 382 2266</span> y <span class="marcar_tel3">(472) 127 0958</span></p></div><div class="sep modificar_contenido sep_71" data-miid="71" data-claseid="71" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div><div class="padre_elemento_72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"><p class="texto contenido modificar_contenido elemento_72" data-miid="72" data-claseid="72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas">Será un gusto brindarte la información que necesitas.</p></div><div class="sep modificar_contenido sep_72" data-miid="72" data-claseid="72" alt="Servicios Industriales, Publicidad, Limpieza Industrial, Promocionales, Portahojas de Acrílico, Anuncios, Señalética Industrial y Vial, Tableros Informativos y Pizarrones, Placas y Grabados en Láser, Bordado, Aplicación de Pintura Industrial, Tablaroca, Muro de Durock, Plafón Reticular, Trabajos de Pailería, Instalaciones Eléctricas"></div>

</div>

</div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">' . $nombre . '</h4>
      </div>
      <div class="modal-body">
        <img src="" width="100%" id="imagen-modal" />
      </div>
    </div>
  </div>
</div>

';


echo $cod;
	
echo html_footer( '' ) . '</body>
</html>';
}


?>