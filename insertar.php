<?php
include_once('globals.php');
include_once('dbmanager.php');
$num=(int)$_GET["accion"];
if($num==1)
{
	insertarUsuario();
}
elseif($num==2)
{
	insertarSalon();
}
elseif($num==3)
{
	insertarTipoAnuncio();
}
elseif($num==4)
{
	insertarAnuncio();
}
elseif($num==5)
{
	insertarLog();
}
elseif($num==6)
{
	insertarTipoUsuario();
}  

 function insertarUsuario(){
	$sql = "INSERT INTO usuario (\"Id_usuario\", \"Nombre\", \"Contrasena\", \"Hora_inicio\", \"Hora_final\",\"Id_tipo_usuario\") VALUES (default, '".$_GET["nombre"]."', '".$_GET["password"]."', '".$_GET["hora_inicio"]."', '".$_GET["hora_final"]."','".$_GET["id_tipo_usuario"]."');";
	
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
	 

function insertarSalon(){
		 $sql = "INSERT INTO salon (\"Id_salon\", \"Nombre\") VALUES (default, '".$_GET["nombre"]."');";
		 
		 $db = new dbmanager();
		 $db->executeQuery($sql);
		 return 1;
     }
 

function insertarTipoAnuncio(){
	$sql = "INSERT INTO tipo_anuncio (\"Id_tipo_anuncio\", \"Nombre\", \"Descripcion\") VALUES (default, '".$_GET["nombre"]."', '".$_GET["descripcion"]."');";
	
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
 

function insertarAnuncio(){
	$sql = "INSERT INTO anuncio (\"Id_anuncio\", \"Hora\", \"Fecha\", \"Descripcion\", \"Porcentaje\", \"Id_tipo_anuncio\",\"Id_salon\",\"Id_usuario\") VALUES (default, '".$_GET["hora"]."', '".$_GET["fecha"]."', '".$_GET["descripcion"]."', 0,".$_GET["id_tipo"].",".$_GET["id_salon"].",".$_GET["id_usuario"].");";
	
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
 

function insertarLog(){
	
	$sql1="SELECT  \"Porcentaje\"  FROM anuncio WHERE \"Id_anuncio\"=".$_GET["id_anuncio"].";";	
	$db = new dbmanager();
	$porcentaje=0;
	
	$resultado=$db->executeQuery($sql1);
	if ($resultado != false){
		$row = pg_fetch_array($resultado);
		    $porcentaje=(int) $row["Porcentaje"];
			echo "Porcentaje inicial:".$porcentaje."\n";
			
		}
	$porcentaje=$porcentaje+(int)$_GET["porcentaje"];
	echo "Porcentaje final:".$porcentaje."<br>\n";
	$sql1="UPDATE anuncio SET  \"Porcentaje\"=".$porcentaje." WHERE \"Id_anuncio\"=".$_GET["id_anuncio"].";";	
	echo $sql1."<br>\n";
	$db->executeQuery($sql1);
	$sql1="SELECT  \"Porcentaje\"  FROM anuncio WHERE \"Id_anuncio\"=".$_GET["id_anuncio"].";";	
	$resultado=$db->executeQuery($sql1);
	if ($resultado != false){
		$row = pg_fetch_array($resultado);
		    $porcentaje=(int) $row["Porcentaje"];
			
		}
	echo "Porcentaje final:".$porcentaje;
	$sql = "INSERT INTO log (\"Id_log\", \"Porcentaje\", \"Id_anuncio\", \"Id_usuario\") VALUES (default, ".$_GET["porcentaje"].", ".$_GET["id_anuncio"].",".$_GET["id_usuario"].");";
	echo $sql;
	$db->executeQuery($sql);
	return 1;
	}
 

function insertarTipoUsuario(){
	$sql = "INSERT INTO tipo_usuario (\"Id_tipo_usuario\", \"Nombre\") VALUES (default, '".$_GET["nombre"]."');";
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
		

	
?>
