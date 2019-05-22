<?php
$conexion = new mysqli('localhost', 'root', '', 'base');	
$conexion->set_charset('utf8');
try{
	$conn=new PDO('mysql:host=localhost;dbname=base','root','');
}catch(PDOExeption $e ){
	print "error".$e->getMessage()."</br>";
}
if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}
$base_url="http://localhost/projectX/agente/";

?>
