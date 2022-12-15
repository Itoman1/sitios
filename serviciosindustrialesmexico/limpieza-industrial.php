<?php
include $_SERVER['DOCUMENT_ROOT'] . '/funciones.php';

$pag = 'Limpieza Industrial';
echo html_header2($pag  , '' , '' , '' );
echo pag_principales( strtoupper( $pag ) );
echo html_footer( '' );
?>
</body>
</html>