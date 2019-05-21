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
                    <h3 style="margin-left:600px;color:white;">agente ~ <?php
                        $id=$_SESSION['USUARIO'];
                        $query1 = "SELECT * FROM usuario WHERE idUsuario='$id'";
                        $resultado1=mysqli_query($conexion,$query1);
                        $row1 = $resultado1->fetch_assoc(); 
                        echo $row1['nombre']; ?>
                    </h3>
          
        </nav>
    <div class="pagina">
        <div class="sidebar ">
            <h2>menu</h2>
            <ul>
               <li>
                    <a href="agenda.php"><i class="fas fa-calendar-alt"></i> agenda</a>
                </li>
                <li>
                    <a href="inicio.php"><i class="fas fa-box"></i> paquetes</a>
                </li>
                <li>
                    <a href="checklist.php"><i class="fas fa-clipboard-list"></i> checklist</a>
                </li>
                <li>
                    <a class="cl" href="../php/funcion.php?data=cerrar"><h3><i class="fas fa-power-off"></i> salir</h3></a>
                </li>
            </ul>
        </div>
        <div class="body2">
                    <div class="alta-paquete ">  
                        <h2>alta de paquetes</h2> 
                            <form method="post" action="../php/funcion.php?id=<?php echo $_SESSION['USUARIO'];?>&data=addp">  
                                    <div class="form-group">
                                    <label for="formGroupExampleInput">Nombre del paquete</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="economico">
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Caracteristicas</label>
                                    <input type="text" class="form-control"  name="carac" placeholder="musica 4hrs,arreglos color blanco, salon... etc.">
                                    </div>
                                    <div class="form-group">
                                            <label for="formGroupExampleInput2">Costo</label>
                                            <input type="text" class="form-control" name="costo"  placeholder="$20,000">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> guardar</button>
                                </form>
                    </div>
                    <div class="paquetes">
                            <h2>mis paquetes</h2>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th style="width:30%;">nombre</th>
                                            <th style="width:45%;">caracteristicas</th>
                                            <th  style="width:15%;">costo</th>
                                            <th style="width:10%;">eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    include '../php/config.php';
                                    $id_a=$_SESSION['USUARIO'];
                                    $query= "SELECT * FROM paquete WHERE idagente='$id_a' ";
                                    $resultado= $conexion->query($query);
                                    while($fila =mysqli_fetch_array($resultado)){
                                    ?>
                                        <tr>
                                            <td><i class="fas fa-box"></i> <?php echo $fila['nombre'];?></td>
                                            <td><?php echo $fila['caracteristicas'];?></td>
                                            <td><i class="fas fa-dollar-sign"> </i><?php echo $fila['costo'];?></td>
                                            <td><a href="../php/funcion?data=delete&tb=paquete&odt=idpaquete&id=<?php echo $fila['idpaquete'];?>&url=agente/inicio.php"><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                    </div>
                    <div class="editar" style="width: 100%; height: auto; border: 1px solid grey; padding: 20px;background-color: #D5DBDB;  height: 350px;  overflow-y:scroll;border-radius:10px;">
                    <h2>editar los paquetes</h2>
                            <form action="../php/funcion.php?data=update" method="POST">      
                                        <?php
                                            $query = "SELECT * FROM paquete WHERE idagente='$id_a'";
                                            $resultado=mysqli_query($conexion,$query);
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label for="inputState">elige el paquete a editar</label>
                                            <select  id="id_paquete" name="id_paquete" class="form-control">
                                                <option selected>...</option>
                                                <?php 
                                                    while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['idpaquete']; ?>"><?php echo $row['nombre'];?></option>
                                                <?php }?>

                                            </select>
                                            <br>
                                                                    
                                                    <div class="form-group">
                                                            <label >Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" id="inputAddress">
                                                    </div>
                                                    <div class="form-group">
                                                            <label >Caracteristicas</label>
                                                            <input type="text" name="caracteristicas" class="form-control" id="inputAddress">
                                                    </div>
                                                    <div class="form-group">
                                                            <label >Costo</label>
                                                            <input type="text" name="costo" class="form-control" id="inputAddress">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
                                          
                                            
                                        </div>
                                        
                            </form>

                    </div>
            </div>
      
    </div>
    <script src="../dist/js/jquery-3.3.1.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>