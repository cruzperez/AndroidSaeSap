<?php
include_once('globals.php');
include_once('dbmanager.php');
$num=(int)$_GET["accion"];
if($num==1)
{
	consultarUsuario();
}
elseif($num==2)
{
	consultarSalon();
}
elseif($num==3)
{
	consultarTipoAnuncio();
}
elseif($num==4)
{
	consultarAnuncio();
}
elseif($num==5)
{
	consultarLog();
}
elseif($num==6)
{
	consultarTipoUsuario();
}
elseif($num==7)
{
	consultarUsuarioNombre();
}  
elseif($num==8)
{
	consultarLogNombre();
}
elseif($num==9)
{
	consultarAnuncioNombre();
}
elseif($num==10)
{
	consultarAnunciob();
}
elseif($num==11)
{
	consultarAnuncioNombreb();
}
 function consultarUsuario(){
	
	$sql = "SELECT usuario.\"Id_tipo_usuario\",\"Id_usuario\",usuario.\"Nombre\",\"Contrasena\", \"Hora_inicio\", \"Hora_final\", tipo_usuario.\"Nombre\" as \"Nombre_tipo\" FROM usuario JOIN tipo_usuario ON usuario.\"Id_tipo_usuario\"=tipo_usuario.\"Id_tipo_usuario\";";	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_usuario"];
			$b["Nombre"] = $row["Nombre"];			
			$b["Contrasena"] = $row["Contrasena"];			
			$b["Hora_inicio"] = $row["Hora_inicio"];			
			$b["Hora_final"] = $row["Hora_final"];
			$b["Nombre_tipo"] = $row["Nombre_tipo"];
			$b["Id_tipo_usuario"] = $row["Id_tipo_usuario"];
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
function consultarUsuarioNombre(){
	
	$sql = "SELECT \"Id_usuario\",usuario.\"Nombre\",\"Contrasena\", \"Hora_inicio\", \"Hora_final\", tipo_usuario.\"Nombre\" as \"Nombre_tipo\" FROM usuario JOIN tipo_usuario ON usuario.\"Id_tipo_usuario\"=tipo_usuario.\"Id_tipo_usuario\" WHERE usuario.\"Nombre\"='".$_GET["nombre"]."';";	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
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

function consultarSalon(){
		 $sql = "SELECT * FROM salon;";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_salon"];
			$b["Nombre"] = $row["Nombre"];			
			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
     }
 function consultarTipoAnuncio(){
	$sql = "SELECT * FROM tipo_anuncio;";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_tipo_anuncio"];
			$b["Nombre"] = $row["Nombre"];			
			$b["Descripcion"] = $row["Descripcion"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
 function consultarAnuncio(){
	$sql = "SELECT \"Id_anuncio\", \"Hora\", \"Fecha\", anuncio.\"Descripcion\", \"Porcentaje\", 
tipo_anuncio.\"Id_tipo_anuncio\" as \"Nombre_anuncio\", salon.\"Id_salon\" as \"Nombre_salon\", usuario.\"Nombre\" as \"Nombre_usuario\" FROM anuncio JOIN tipo_anuncio ON
anuncio.\"Id_tipo_anuncio\"=tipo_anuncio.\"Id_tipo_anuncio\" JOIN salon ON anuncio.\"Id_salon\"=salon.\"Id_salon\" JOIN usuario ON anuncio.\"Id_usuario\"=usuario.\"Id_usuario\"
WHERE \"Porcentaje\"<100 ;";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_anuncio"];
			$b["Hora"] = $row["Hora"];			
			$b["Descripcion"] = $row["Descripcion"];			
			$b["Porcentaje"] = $row["Porcentaje"];
			$b["Nombre_tipo_anuncio"] = $row["Nombre_anuncio"];
			$b["Nombre_salon"] = $row["Nombre_salon"];
			$b["Nombre_usuario"] = $row["Nombre_usuario"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}

	
function consultarAnunciob(){
	$sql = "SELECT \"Id_anuncio\", \"Hora\", \"Fecha\", anuncio.\"Descripcion\", \"Porcentaje\", 
tipo_anuncio.\"Nombre\" as \"Nombre_anuncio\", salon.\"Nombre\" as \"Nombre_salon\", usuario.\"Nombre\" as \"Nombre_usuario\" FROM anuncio JOIN tipo_anuncio ON
anuncio.\"Id_tipo_anuncio\"=tipo_anuncio.\"Id_tipo_anuncio\" JOIN salon ON anuncio.\"Id_salon\"=salon.\"Id_salon\" JOIN usuario ON anuncio.\"Id_usuario\"=usuario.\"Id_usuario\";";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_anuncio"];
			$b["Hora"] = $row["Hora"];			
			$b["Descripcion"] = $row["Descripcion"];			
			$b["Porcentaje"] = $row["Porcentaje"];
			$b["Nombre_tipo_anuncio"] = $row["Nombre_anuncio"];			
			$b["Nombre_salon"] = $row["Nombre_salon"];
			$b["Nombre_usuario"] = $row["Nombre_usuario"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
function consultarAnuncioNombre(){
	$sql = "SELECT \"Id_anuncio\", \"Hora\", \"Fecha\", anuncio.\"Descripcion\", \"Porcentaje\", 
tipo_anuncio.\"Nombre\" as \"Nombre_anuncio\", salon.\"Nombre\" as \"Nombre_salon\", usuario.\"Nombre\" as \"Nombre_usuario\" FROM anuncio JOIN tipo_anuncio ON
anuncio.\"Id_tipo_anuncio\"=tipo_anuncio.\"Id_tipo_anuncio\" JOIN salon ON anuncio.\"Id_salon\"=salon.\"Id_salon\" JOIN usuario ON anuncio.\"Id_usuario\"=usuario.\"Id_usuario\"
WHERE \"Porcentaje\"<100 AND usuario.\"Nombre\"='".$_GET["nombre"]."';";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_anuncio"];
			$b["Hora"] = $row["Hora"];			
			$b["Descripcion"] = $row["Descripcion"];			
			$b["Porcentaje"] = $row["Porcentaje"];
			$b["Nombre_tipo_anuncio"] = $row["Nombre_anuncio"];			
			$b["Nombre_salon"] = $row["Nombre_salon"];
			$b["Nombre_usuario"] = $row["Nombre_usuario"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}

function consultarAnuncioNombreb(){
	$sql = "SELECT \"Id_anuncio\", \"Hora\", \"Fecha\", anuncio.\"Descripcion\", \"Porcentaje\", 
tipo_anuncio.\"Nombre\" as \"Nombre_anuncio\", salon.\"Nombre\" as \"Nombre_salon\", usuario.\"Nombre\" as \"Nombre_usuario\" FROM anuncio JOIN tipo_anuncio ON
anuncio.\"Id_tipo_anuncio\"=tipo_anuncio.\"Id_tipo_anuncio\" JOIN salon ON anuncio.\"Id_salon\"=salon.\"Id_salon\" JOIN usuario ON anuncio.\"Id_usuario\"=usuario.\"Id_usuario\"
WHERE  usuario.\"Nombre\"='".$_GET["nombre"]."';";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_anuncio"];
			$b["Hora"] = $row["Hora"];			
			$b["Descripcion"] = $row["Descripcion"];			
			$b["Porcentaje"] = $row["Porcentaje"];
			$b["Nombre_tipo_anuncio"] = $row["Nombre_anuncio"];			
			$b["Nombre_salon"] = $row["Nombre_salon"];
			$b["Nombre_usuario"] = $row["Nombre_usuario"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
 function consultarLog(){
	$sql = "SELECT * FROM log JOIN usuario ON log.\"Id_usuario\"=usuario.\"Id_usuario\";";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id_log"] = $row["Id_log"];
			$b["Id_anuncio"] = $row["Id_anuncio"];			
			$b["Porcentaje"] = $row["Porcentaje"];			
			$b["Nombre"] = $row["Nombre"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
function consultarLogNombre(){
	$sql = "SELECT * FROM log JOIN usuario ON log.\"Id_usuario\"=usuario.\"Id_usuario\" WHERE usuario.\"Nombre\"='".$_GET["nombre"]."';";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id_log"] = $row["Id_log"];
			$b["Id_anuncio"] = $row["Id_anuncio"];			
			$b["Porcentaje"] = $row["Porcentaje"];			
			$b["Nombre"] = $row["Nombre"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
 function consultarTipoUsuario(){
	$sql = "SELECT * FROM tipo_usuario;";
	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql);
	$a = array();
	$b = array();
	if ($resultado != false){
		while ($row = pg_fetch_array($resultado)) {	
		    $b["Id"] = $row["Id_tipo_usuario"];
			$b["Nombre"] = $row["Nombre"];			
			array_push($a,$b);
		}

 }
 echo json_encode($a);
 
   return $a; 
	}
		

	
?>
