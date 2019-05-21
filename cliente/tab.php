<?php
include '../php/config.php';
$id = $_GET['id'];
$query1= "SELECT * FROM paquete WHERE  idpaquete= '$id'";
$resultado1= $conexion->query($query1);
$fila1 =mysqli_fetch_array($resultado1);
?>
<h1>paquete elegido:</h1>
<h2>nombre:</h2>
<h3><?php echo $fila1['nombre'] ?></h3><br>
<h2>costo:</h2>
<h3><?php echo $fila1['costo'] ?></h3><br>
<h2>caracteristicas:</h2>
<h3><?php echo $fila1['caracteristicas'] ?></h3><br>
<div>
<button type="button" id="dato" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> comprar</button>

