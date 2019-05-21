  <?php
  include "database.php";            
  $nombre=$_POST['nombre'];            $app=$_POST['apellido'];         $pass=$_POST['pass'];      
  $correo=$_POST['correo'];            $tipo=$_POST['tipo'];          $Telefono=$_POST['telefono'];    
  $nombre_tu=$_POST['nombre_tu'];      $numero=$_POST['numero'];        $apm_tu=$_POST['apm_tu'];
  $app_tu=$_POST['app_tu'];            $dir=$_POST['dir'];              $fecha=$_POST['fecha']; 
  $sexo=$_POST['sexo'];                        
  $SQL=$conn->prepare("INSERT INTO usuario (id,nombre, apellido, telefono, correo,pass,tipo,nombre_tu,apm_tu,app_tu,dir,fecha,sexo,creacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
  $SQL->bindParam(1,$numero);
  $SQL->bindParam(2,$nombre);
  $SQL->bindParam(3,$app);
  $SQL->bindParam(4,$Telefono);
  $SQL->bindParam(5,$correo);
  $SQL->bindParam(6,$pass);
  $SQL->bindParam(7,$tipo);
  $SQL->bindParam(8,$nombre_tu);
  $SQL->bindParam(9,$apm_tu);
  $SQL->bindParam(10,$app_tu);
  $SQL->bindParam(11,$dir);
   $SQL->bindParam(13,$sexo);
  $SQL->bindParam(12,$fecha);
if ($SQL->execute()){
header('Location: ../msj.html');
}else{
header('Location: ../msj1.html');
}

?>