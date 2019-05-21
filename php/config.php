<?php
$conexion = new mysqli('localhost', 'root', '3039646363', 'base');	
$conexion->set_charset('utf8');
try{
	$conn=new PDO('mysql:host=localhost;dbname=base','root','3039646363');
}catch(PDOExeption $e ){
	print "error".$e->getMessage()."</br>";
}
if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}
$base_url="http://localhost/projectX/agente/";

?>
