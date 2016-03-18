<?php
	include("conection/phpAJAX.php");
?>

<html>
	<head>
		<title>Tienda Deportiva</title>
		
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" type="text/css" href="css/style.css">
	    <LINK REL="SHORTCUT ICON" href="images/logo.png"/>
	   	<?php
	   		$xajax->printJavascript("xajax/");
	   	?>
	</head>

	<body>

		<section id="accion">
			<form  id="resultado" method="POST">
				<input type="text" class="input" required placeholder="Ingrese su Busqueda" name="cadT" id="cadena"/>
				<input type="button" value="Buscar Articulos" onclick="xajax_procesar_formulario(xajax.getFormValues('resultado'))"></input>
			</form>
		</section>
		<section id = "info"></section>
	</body>
</html>
