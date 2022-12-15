<?php
include $_SERVER['DOCUMENT_ROOT'] . '/funciones.php';

if( !empty( $_POST ) ){
$msg = "Contacto recibido desde www.ServiciosIndustrialesMexico.com
\n
Nombre: " . $_POST["txtNom"] . "
\n
Email: " . $_POST["txtMai"] . "
\n
Telefono: " . $_POST["txtTel"] . "
\n
Mensaje: " . $_POST["txtMsn"];

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
// mail("itoaa@hotmail.com" , "Contacto desde ServiciosIndustrialesMexico.com",$msg);
}

$pag = 'Gracias';
echo html_header2($pag  , '' , '' , '' );
?>


<section class="seccion seccion elemento_81" data-miid="81" data-claseid="81" alt="Servicios Industriales | Servicios para Empresas | "><div class="container contenedor elemento_82" data-miid="82" data-claseid="82" alt="Servicios Industriales | Servicios para Empresas | "><div class="row fila elemento_83" data-miid="83" data-claseid="83" alt="Servicios Industriales | Servicios para Empresas | "><div class="col-xs-12 columnas elemento_84" data-miid="84" data-claseid="84" alt="Servicios Industriales | Servicios para Empresas | "><div class="padre_elemento_85" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_85" data-miid="85" data-claseid="85" alt="Servicios Industriales | Servicios para Empresas | ">GRACIAS POR CONTACTARNOS</p></div><div class="sep modificar_contenido sep_85" data-miid="85" data-claseid="85" alt="Servicios Industriales | Servicios para Empresas | "></div><div class="padre_elemento_86" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_86" data-miid="86" data-claseid="86" alt="Servicios Industriales | Servicios para Empresas | ">A la brevedad uno de nuestros representantes se pondrá en contacto contigo.</p></div><div class="sep modificar_contenido sep_86" data-miid="86" data-claseid="86" alt="Servicios Industriales | Servicios para Empresas | "></div><div class="padre_elemento_87" alt="Servicios Industriales | Servicios para Empresas | "><a href="/index.php" class="link" alt="Servicios Industriales | Servicios para Empresas | "><p class="texto contenido modificar_contenido elemento_87" data-miid="87" data-claseid="87" alt="Servicios Industriales | Servicios para Empresas | ">Regresar a la página de INICIO &raquo;</p></a></div><div class="sep modificar_contenido sep_87" data-miid="87" data-claseid="87" alt="Servicios Industriales | Servicios para Empresas | "></div></div></div></div></section>


<?php
echo html_footer( '' );
?>
</body>
</html>