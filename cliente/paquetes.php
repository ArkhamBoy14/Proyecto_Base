<?php
include '../php/config.php';
session_start();
$session_v=$_SESSION['USUARIO'];
if($session_v== null || $session_v=""){
    echo '<script>alert("inicia sesion porfavor")</script> ';
    echo "<script>location.href='../login_admin.php'</script>"; 
    die();

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiBoda.com</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/estilos.css">
    <Script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></Script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                        <img src="../img/logo.png" width="30" height="30" alt="">
                </a>
                <h5 class="logo">MiBoda</h5>
                    <h3 style="margin-left:600px;color:white;">cliente ~ <?php
                        $id=$_SESSION['USUARIO'];
                        $query1 = "SELECT * FROM usuario WHERE idUsuario='$id'";
                        $resultado1=mysqli_query($conexion,$query1);
                        $row1 = $resultado1->fetch_assoc(); 
                        echo $row1['nombre']; ?>
                    </h3>
          
        </nav>
    <div class="pagina">
        <div class="sidebar" style="margin-bottom: 0px;">
            <h2>menu</h2>
            <ul>
               
                <li>
                    <a href="inicio.php"><i class="fas fa-list-ul"></i> invitados</a>
                </li>
                <li>
                    <a href="paquetes.php"><i class="fas fa-box"></i> paquetes</a>
                </li>
               
                <li>
                    <a class="cl" href="../php/funcion.php?data=cerrar"><h3><i class="fas fa-power-off"></i> salir</h3></a>
                </li>
            </ul>
        </div>
        <div class="body2">
        <div id="tab" style=" width: 100%;border: 1px solid grey;padding: 20px;background-color: #D5DBDB;overflow-y:scroll;height: 300px;">
                            <h2>paquetes para ti</h2>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th style="width:20%;">Nombre</th>
                                            <th style="width:40%;">Caracteristicas</th>
                                            <th  style="width:10%;">Costo</th>
                                            <th style="width:20%;">nombre agente</th>
                                            <th style="width:10%;">elegir</th>
                                            
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    include '../php/config.php';
                                    $query= "SELECT * FROM paquete";
                                    $resultado= $conexion->query($query);
                                    $i=0;
                                    while($fila =mysqli_fetch_array($resultado)){
                                        $i++;
                                        $id=$fila['idagente'];
                                        $query1= "SELECT * FROM usuario WHERE  idUsuario= '$id'";
                                        $resultado1= $conexion->query($query1);
                                        while($fila1 =mysqli_fetch_array($resultado1)){
                                    ?>
                                        <tr>
                                            <td><i class="fas fa-box"></i> <?php echo $fila['nombre'];?></td>
                                            <td><?php echo $fila['caracteristicas'];?></td>
                                            <td><i class="fas fa-dollar-sign"></i> <?php echo $fila['costo'];?></td>
                                            <td><i class="fas fa-user-tie"></i> <?php echo $fila1['nombre'];?></td>
                                            <td><button id="add<?php echo $i;?>" value="<?php echo $fila['idpaquete']; ?>" class="btn btn-success" ><i class="fas fa-plus-circle"></i></button></td>
                                            <script>
                                                document.getElementById("add<?php echo $i;?>").addEventListener("click",cambia);
                                                function cambia() {
                                                var id=document.getElementById("add<?php echo $i;?>").value;
                                                var xhr = new XMLHttpRequest();
                                                xhr.onreadystatechange=function(){
                                                if(this.readyState==4 && this.status==200){
                                                       document.getElementById("dato").innerHTML=this.responseText;
                                                   }
                                                  };

                                                  xhr.open("GET","tab.php?id="+id,true);
                                                   xhr.send();
                                                 }
                                            </script>
                                        </tr>
                                        <?php } } ?>
                                </tbody>
                            </table>
                    </div>
                    <div id="dato" style="width: 100%;border: 1px solid grey;padding: 20px;background-color: #D5DBDB;overflow-y:scroll;height: 400px;">

                    </div>
                  
        </div>
    </div>
   
    
    <script src="../dist/js/jquery-3.3.1.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>