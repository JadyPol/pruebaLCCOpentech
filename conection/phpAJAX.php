<?
	require ('xajax/xajax.inc.php');
	include("conection/consultaSQL.php");

	$xajax = new xajax();

	function procesar_formulario($form_entrada){

		$salida = trim($form_entrada["cadT"]);

		if ((0 === strpos($salida, ' ')) || (strcmp($salida, "") == 0)) {
			$salida = "<h1>Ingrese un valor valido para la busqueda.</h1>";
		}else{
			$salida = busquedaArt($salida);
		}
		
	   	$respuesta = new xajaxResponse();
	   	$respuesta->addAssign("info","innerHTML",$salida);
	   	return $respuesta;
	}

	$xajax->registerFunction("procesar_formulario");
	$xajax->processRequests();
?>