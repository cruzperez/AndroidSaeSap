<?php
include_once('globals.php');
include_once('dbmanager.php');

$db = new dbmanager();
		  
		return $db->probarConexion();
		
?>