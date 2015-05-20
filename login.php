<?php
include_once('globals.php');
include_once('dbmanager.php');

$result = obtenerJsonLogin();

 function validarDatos(){
		  $var1 = $_GET['nombre'];
		  $var2 = $_GET['password'];
		  $sql = "SELECT \"Id_usuario\",usuario.\"Nombre\",\"Contrasena\", \"Hora_inicio\", \"Hora_final\", tipo_usuario.\"Nombre\" as \"Nombre_tipo\" FROM usuario JOIN tipo_usuario ON usuario.\"Id_tipo_usuario\"=tipo_usuario.\"Id_tipo_usuario\"  WHERE usuario.\"Nombre\"='".$var1 ."' AND usuario.\"Contrasena\"='".$var2."' ";
		  $db = new dbmanager();
		  
		return $db->executeQuery($sql);
 
     }
 function obtenerJsonLogin(){
	$json = "";	
	$result = validarDatos();
	
	$a = array();
	$b = array();
	if ($result != false){
		while ($row = pg_fetch_array($result)) {	
		    $b["Id"] = $row["Id_usuario"];
			$b["Nombre"] = $row["Nombre"];			
			$b["Contrasena"] = $row["Contrasena"];			
			$b["Hora_inicio"] = $row["Hora_inicio"];			
			$b["Hora_final"] = $row["Hora_final"];
			$b["Nombre_tipo"] = $row["Nombre_tipo"];
			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
    }
		

	
?>