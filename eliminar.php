<?php

include_once('globals.php');
include_once('dbmanager.php');
$num=(int)$_GET["accion"];
if($num==1){
	eliminarUsuario();
}
elseif($num==2){
	eliminarSalon();
}
elseif($num==3){
	eliminarTipoAnuncio();
}
elseif($num==4){
	eliminarAnuncio();
}
elseif($num==5){
	eliminarLog();
}
elseif($num==6){
	eliminarTipoUsuario();
}  

function eliminarTipoUsuario(){
	$db = new dbmanager();

	$sql = "DELETE FROM usuario WHERE \"Id_tipo_usuario\" = ".$_GET["id_tipo_usuario"].";";
	$db->executeQuery($sql);

	$sql = "DELETE FROM tipo_usuario WHERE \"Id_tipo_usuario\" = ".$_GET["id_tipo_usuario"].";";
	$db->executeQuery($sql);
}

function eliminarTipoAnuncio(){
	$db = new dbmanager();

	$sql = "DELETE FROM anuncio WHERE \"Id_tipo_anuncio\" = ".$_GET["id_tipo_anuncio"].";";
	$db->executeQuery($sql);

	$sql = "DELETE FROM tipo_anuncio WHERE \"Id_tipo_anuncio\" = ".$_GET["id_tipo_anuncio"].";";
	$db->executeQuery($sql);
}

function eliminarAnuncio(){
	$db = new dbmanager();

	$sql = "DELETE FROM anuncio WHERE \"Id_anuncio\" = ".$_GET["id_anuncio"].";";
	$db->executeQuery($sql);
}

function eliminarUsuario(){
	$db = new dbmanager();

	$sql = "DELETE FROM anuncio WHERE \"Id_usuario\" = ".$_GET["id_usuario"].";";
	$db->executeQuery($sql);

	$sql = "DELETE FROM usuario WHERE \"Id_usuario\" = ".$_GET["id_usuario"].";";
	$db->executeQuery($sql);
}

function eliminarSalon(){
	$db = new dbmanager();

	$sql = "DELETE FROM anuncio WHERE \"Id_salon\" = ".$_GET["id_salon"].";";
	$db->executeQuery($sql);

	$sql = "DELETE FROM salon WHERE \"Id_salon\" = ".$_GET["id_salon"].";";
	$db->executeQuery($sql);
}
		
	
?>
