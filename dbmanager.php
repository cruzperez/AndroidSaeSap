<?php
include_once('globals.php');

class dbmanager{
 
 public function executeQuery($sql){
  $con = pg_connect("host=".config::getBBDDServer()." dbname=".config::getBBDDName()." user=". config::getBBDDUser()." password=" .config::getBBDDPwd()."");
  if (!$con)
    {
     die('Could not connect: ' . pg_last_error());
    }
  
    
  $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
  
  pg_close($con);
  return $result;
 }
 public function probarConexion(){
	 echo "host=".config::getBBDDServer()." dbname=".config::getBBDDName()." user=". config::getBBDDUser()." password=" .config::getBBDDPwd()."<br>\n";
  $con = pg_connect("host=".config::getBBDDServer()." dbname=".config::getBBDDName()." user=". config::getBBDDUser()." password=" .config::getBBDDPwd()."");
  if (!$con)
    {
     die('Could not connect: ' . pg_last_error());
	 echo "Conexión fallida.";
    }
	else
	{
		echo "Conexión exitosa.";
	}
    
    
  pg_close($con);
  return 1;
 }
}
?>