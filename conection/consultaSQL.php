<?php	
	
	$token;
	$marca = null;
	$tipoRopa = null;
	$equipoDep = null;

	function cargar($entrada){

	}

	function busquedaArt($entrada){
		global $token; 
		global $marca;
		global $tipoRopa;
		global $equipoDep;

		$token = explode(" ", $entrada);

		validarMarca($token);	
		validarTipoRopa($token);
		validarEquipoDep($token);

		$retorno = "<p><b>Usted Ingreso: </b>".implode(" ",$token)."</p>";

		if ((!is_null($marca)) && (!is_null($tipoRopa)) && (!is_null($equipoDep))){
			return $retorno .= buscarCompleta($marca,$tipoRopa,$equipoDep);
		}else{
			if ((!is_null($marca)) && (!is_null($tipoRopa))){
				return $retorno .= buscarporMarcaTipo($marca,$tipoRopa);
			}else{
				if ((!is_null($marca)) && (!is_null($equipoDep))){
					return $retorno .= buscarporMarcaEquipo($marca,$equipoDep);
				}else{
					if ((!is_null($tipoRopa)) && (!is_null($equipoDep))){
						return $retorno .= buscarporTipoEquipo($tipoRopa,$equipoDep);
					}else{
						if (!is_null($marca)){
							return $retorno .= buscarMarca($marca);
						}else{
							if (!is_null($tipoRopa)){
								return $retorno .= buscarTipoRopa($tipoRopa);
							}else{
								if (!is_null($equipoDep)){
									return $retorno .= buscarEquipo($equipoDep);
								}else{
									return "<h1>No Se Encontraron Resultados</h1>";
								}
							}
						}
					}
				}
			}
		}
	}

	function validarMarca($tk){
		include ("dbConfig.php");
	
		global $token; global $marca;
		for ($i=0; $i < count($tk); $i++) {
			$sql = "SELECT * FROM sportdatabase.marca WHERE sportdatabase.marca.descripcion LIKE '$tk[$i]%'
						OR sportdatabase.marca.descripcion LIKE '%$tk[$i]'";
			if(isset($db)){
				$result = $db->query($sql);
				if(!empty($result)){
					while($fila = $result->fetch(PDO::FETCH_ASSOC)){
						$token[$i] = "<b>".$tk[$i]."</b>";
						$marca = $tk[$i];
						break;
					}
				}
			}
		}
	}

	function validarTipoRopa($tk){
		include ("dbConfig.php");
		global $token; global $tipoRopa;
		for ($i=0; $i < count($tk); $i++) { 
			$sql = "SELECT * FROM sportdatabase.tipoRopa WHERE sportdatabase.tipoRopa.descripcionTR LIKE '%$tk[$i]%'";
			if(isset($db)){
				$result = $db->query($sql);
				if(!empty($result)){
					while($fila = $result->fetch(PDO::FETCH_ASSOC)){
						$token[$i] = "<i>".$tk[$i]."</i>";
						$tipoRopa = $tk[$i];
						break;
					}
				}
			}
		}		

	}

	function validarEquipoDep($tk){
		include ("dbConfig.php");
		global $token; global $equipoDep;
		for ($i=0; $i < count($tk); $i++) { 
			$sql = "SELECT * FROM sportdatabase.equipoDeportivo WHERE sportdatabase.equipoDeportivo.descripcionED 
						LIKE '$tk[$i]%' OR sportdatabase.equipoDeportivo.descripcionED LIKE '%$tk[$i]'";
			if(isset($db)){
				$result = $db->query($sql);
				if(!empty($result)){
					while($fila = $result->fetch(PDO::FETCH_ASSOC)){
						$token[$i] = $equipoDep = "<u>".$tk[$i]."<u>";
						$equipoDep = $tk[$i];
						break;
					}
				}
			}
		}
	}

	function buscarCompleta($marca,$tipoRopa,$equipoDep){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
    				sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
        				sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
            				sportdatabase.tipoRopa.descripcionTR LIKE '%$tipoRopa%' AND 
                				sportdatabase.equipoDeportivo.descripcionED LIKE '%$equipoDep%' AND 
                					sportdatabase.marca.descripcion LIKE '%$marca%'";

        return queryFuncion($sql);
	}

	function buscarporMarcaTipo($marca,$tipoRopa){
		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.marca.descripcion LIKE '%$marca%' AND 
				                sportdatabase.tipoRopa.descripcionTR LIKE '%$tipoRopa%'";

        return queryFuncion($sql);
	}

	function buscarMarca($marca){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.marca.descripcion LIKE '%$marca%'";

		return queryFuncion($sql);				            
	}

	function buscarTipoRopa($tipoRopa){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.tipoRopa.descripcionTR LIKE '%$tipoRopa%'";

		return queryFuncion($sql);				            
	}

	function buscarEquipo($equipoDep){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.equipoDeportivo.descripcionED LIKE '%$equipoDep%'";

		return queryFuncion($sql);				            
	}

	function buscarporMarcaEquipo($marca,$equipoDep){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.marca.descripcion LIKE '%$marca%' AND 
				                sportdatabase.equipoDeportivo.descripcionED LIKE '%$equipoDep%'";

		return queryFuncion($sql);				            
	}

	function buscarporTipoEquipo($tipoRopa,$equipoDep){

		$sql = "SELECT sportdatabase.marca.descripcion,sportdatabase.tipoRopa.descripcionTR,
				    sportdatabase.equipoDeportivo.descripcionED FROM sportdatabase.marca,
				        sportdatabase.tipoRopa,sportdatabase.equipoDeportivo WHERE 
				            sportdatabase.tipoRopa.descripcionTR LIKE '%$tipoRopa%' AND 
				                sportdatabase.equipoDeportivo.descripcionED LIKE '%$equipoDep%'";

		return queryFuncion($sql);				            
	}

	function queryFuncion ($sql){
		include ("dbConfig.php");

		$tabl="<table border='0'><tr><th>MARCA</th><th>TIPO DE ROPA</th><th>EQUIPO DEPORTIVO</th></tr>";

		if(isset($db)){
			$result = $db->query($sql);

			if(!empty($result)){
				
				while($fila = $result->fetch(PDO::FETCH_ASSOC)){
		            foreach ($fila as $k => $v) {
		            	if($k == "descripcion"){
		            		$tabl.="<tr><td><b>".$v."</b></td>";
		            	}
		            	if($k == "descripcionTR"){
		            		$tabl.="<td><i>".$v."</i></td>";
		            	}
		            	if($k== "descripcionED"){
		            		$tabl.="<td><u>".$v."</u></td></tr>";
		            	}	     
		            }
				}
				$tabl.="</table>";
			}
		}
		return $tabl;
	}

?>