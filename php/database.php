<?php
 

           try{
	$conn=new PDO('mysql:host=localhost;dbname=base','root','3039646363');
}catch(PDOExeption $e ){
	print "error".$e->getMessage()."</br>";
}

?>