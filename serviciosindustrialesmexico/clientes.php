<?php
include $_SERVER['DOCUMENT_ROOT'] . '/funciones.php';

echo html_header2('Clientes'  , '' , '' , '' );
?>


<section class="seccion seccion elemento_169" data-miid="169" data-claseid="169" alt="Servicios Industriales | Servicios para Empresas | "><div class="container contenedor elemento_171" data-miid="171" data-claseid="171" alt="Servicios Industriales | Servicios para Empresas | "><div class="row fila elemento_172" data-miid="172" data-claseid="172" alt="Servicios Industriales | Servicios para Empresas | "><div class="col-xs-12 columnas elemento_173" data-miid="173" data-claseid="173" alt="Servicios Industriales | Servicios para Empresas | "><div class="padre_elemento_65" alt="Servicios Industriales | Servicios para Empresas | "><center><p class="texto contenido modificar_contenido elemento_65" data-miid="65" data-claseid="65" alt="Servicios Industriales | Servicios para Empresas | ">CLIENTES IMPORTANTES de las más GRANDES INDUSTRIAS confían en nosotros.</p></center></div><div class="sep modificar_contenido sep_174" data-miid="174" data-claseid="174" alt="Servicios Industriales | Servicios para Empresas | "></div></div></div></div></section>


<section class="seccion seccion elemento_169" data-miid="169" data-claseid="169" alt="Servicios Industriales | Servicios para Empresas | "><div class="container contenedor elemento_171" data-miid="171" data-claseid="171" alt="Servicios Industriales | Servicios para Empresas | "><div class="row fila elemento_172" data-miid="172" data-claseid="172" alt="Servicios Industriales | Servicios para Empresas | ">

<?php

$cli_a = array(
	'Siemens' => array() ,
	'Pirelli' => array() ,
	'Nishikawa' => array() ,
	'KYB' => array() ,
	'Grupo México' => array() ,
	'SHMZ' => array() ,
	'ASHIMORI' => array() ,
	'Guala' => array() ,
	'Lintel' => array() ,
	'Denso' => array() ,
	'Yushiro' => array() ,
	'AAM' => array()
);



foreach( $cli_a as $k => $v ){
	echo '<div class="col-xs-12 col-sm-4 col-md-3" style="padding-top:10px; padding-bottom:20px;"><center><img src="/images/imgs/clientes-' . nompags( $k ) . '.jpg" width="80%" /></center></div>';
}

?>


</div>

<div class="row">
<div class="col-xs-12">
<div class="sep modificar_contenido sep_66" data-miid="66" data-claseid="66" alt="Servicios Industriales | Servicios para Empresas | "></div>

<div class="rectangulo contenido modificar_contenido elemento_69" data-miid="69" data-claseid="69" alt="Servicios Industriales | Servicios para Empresas | "><div class="padre_elemento_70" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_70" data-miid="70" data-claseid="70" alt="Servicios Industriales | Servicios para Empresas | ">¿Deseas conocer más acerca de nuestros servicios?</p></div><div class="sep modificar_contenido sep_70" data-miid="70" data-claseid="70" alt="Servicios Industriales | Servicios para Empresas | "></div><div class="padre_elemento_71" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_71" data-miid="71" data-claseid="71" alt="Servicios Industriales | Servicios para Empresas | ">Llámanos al tel. <span class="marcar_tel">(472) 145 8119</span></p></div><div class="sep modificar_contenido sep_71" data-miid="71" data-claseid="71" alt="Servicios Industriales | Servicios para Empresas | "></div><div class="padre_elemento_72" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_72" data-miid="72" data-claseid="72" alt="Servicios Industriales | Servicios para Empresas | ">Será un gusto brindarte la información que necesitas.</p></div><div class="sep modificar_contenido sep_72" data-miid="72" data-claseid="72" alt="Servicios Industriales | Servicios para Empresas | "></div>

</div>


</div></section>



<?php
echo html_footer( '' );
?>
</body>
</html>