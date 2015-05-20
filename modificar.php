<?php
include_once('globals.php');
include_once('dbmanager.php');
$num=(int)$_GET["accion"];
if($num==1)
{
	modificarUsuario();
}
elseif($num==2)
{
	modificarSalon();
}
elseif($num==3)
{
	modificarTipoAnuncio();
}
elseif($num==4)
{
	modificarAnuncio();
}
elseif($num==5)
{
	modificarLog();
}
elseif($num==6)
{
	modificarTipoUsuario();
}  

 function modificarUsuario(){
	$sql = "UPDATE usuario SET \"Nombre\"='".$_GET["nombre"]."', \"Contrasena\"='".$_GET["password"]."', \"Hora_inicio\"='".$_GET["hora_inicio"]."', \"Hora_final\"='".$_GET["hora_final"]."',\"Id_tipo_usuario\"='".$_GET["id_tipo_usuario"]."' WHERE \"Id_usuario\"='".$_GET["id_usuario"]."'";
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
	 function modificarSalon(){
		 $sql = "UPDATE salon SET \"Nombre\"='".$_GET["nombre"]."' WHERE \"Id_salon\"=".$_GET["id_salon"].");";
		 
		 $db = new dbmanager();
		 $db->executeQuery($sql);
		 return 1;
     }
 function modificarTipoAnuncio(){
	$sql = "UPDATE tipo_anuncio SET \"Nombre\"='".$_GET["nombre"]."', \"Descripcion\"= '".$_GET["descripcion"]."' WHERE \"Id_tipo_anuncio\"=".$_GET["id_tipo_anuncio"].");";
	
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
 function modificarAnuncio(){
	$sql = "UPDATE anuncio SET \"Descripcion\"='".$_GET["descripcion"]."', \"Porcentaje\"=".$_GET["porcentaje"].", \"Id_tipo_anuncio\"=".$_GET["id_tipo_anuncio"].",\"Id_salon\"=".$_GET["id_salon"]." WHERE \"Id_anuncio\"=".$_GET["id_anuncio"].";";
	
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}
 function insertarLog(){
	$porcentaje=0;
	$porcentaje_anterior=0;
	$porentaje_actual=0;
	$sql1="SELECT  Porcentaje\"  FROM anuncio WHERE \"Id_anuncio\"=".$_GET["id_anuncio"].";";	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql1);
	if ($resultado != false){
		$row = mysql_fetch_array($resultado);
		    $porcentaje=(int) $row["Porcentaje"];
			
			
		}
	$sql1="SELECT  Porcentaje  FROM log WHERE \"Id_log\"=".$_GET["id_log"].";";	
	$db = new dbmanager();
	$resultado=$db->executeQuery($sql1);
	if ($resultado != false){
		$row = mysql_fetch_array($resultado);
		    $porcentaje_anterior=(int) $row["Porcentaje"];
			echo "Porcentaje inicial:".$porcentaje."\n";
			
		}
	$porcentaje=$porcentaje-$porcentaje_anterior;
	$porcentaje=$porcentaje+(int)$_GET["porcentaje"];
	$sql1="UPDATE anuncio SET  Porcentaje_finalizacion=".$porcentaje." WHERE Id_anuncio=".$_GET["id_anuncio"].";";	
	$db->executeQuery($sql1);
	$sql = "UPDATE log SET Porcentaje=".$_GET["porcentaje"].", Id_anuncio=".$_GET["id_anuncio"].", Id_usuario".$_GET["id_usuario"]." WHERE Id_log =".$_GET["id_log"].");";
	echo $sql;
	$db->executeQuery($sql);
	return 1;
	}
 function modificarTipoUsuario(){
	$sql = "UPDATE tipo_usuario SET \"Nombre\"= '".$_GET["nombre"]."' WHERE \"Id_tipo_usuario\"=".$_GET["id"].";";
	$db = new dbmanager();
	$db->executeQuery($sql);
	return 1;
	}	
?>
