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
                    <h3 style="margin-left:600px;color:white;">admin ~ <?php
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
                    <a href="agenda.php"><i class="fas fa-home"></i> inicio</a>
                </li>
                <li>
                    <a class="cl" href="../php/funcion.php?data=cerrar"><h3><i class="fas fa-power-off"></i> salir</h3></a>
                </li>
            </ul>
        </div>
        <div class="body2">
                    <div class="editar" style="width: 100%; height: auto; border: 1px solid grey; padding: 20px;background-color: #D5DBDB;  height: 350px;  overflow-y:scroll;border-radius:10px;">
                    <h2>editar usuarios</h2>
                            <form action="../php/funcion.php?data=update_u" method="POST">      
                                        <?php
                                            
                                            $query = "SELECT * FROM usuario WHERE tipo='cliente' OR tipo='agente'";
                                            $resultado=mysqli_query($conexion,$query);
                                        ?>
                                        <div class="form-group col-md-12">
                                            <select   name="idusuario" class="form-control">
                                                <option selected>...</option>
                                                <?php 
                                                    while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['idUsuario']; ?>"><?php echo $row['nombre'];?></option>
                                                <?php }?>

                                            </select>
                                            <br>
                                                                    
                                                    <div class="form-group">
                                                            <label >correo</label>
                                                            <input type="email" require name="correo" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                            <label >contraseña</label>
                                                            <input type="text" require name="pass" class="form-control">
                                                    </div>
                                                   
                                                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar Cambios</button>
                                          
                                            
                                        </div>
                                        
                            </form>

                    </div>
                    <div class="editar" style="width: 100%; height: auto; border: 1px solid grey; padding: 20px;background-color: #D5DBDB;  height: 350px;  overflow-y:scroll;border-radius:10px;">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:40%;">nombre</th>
                                    <th style="width:40%;"> correo</th>
                                    <th style="width:10%;">pass</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include '../php/config.php';
                                $query= "SELECT * FROM usuario WHERE tipo='cliente' OR tipo='agente'";
                                $resultado= $conexion->query($query);
                                while($row= $resultado->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><i class="fas fa-user-tag"></i> <?php echo $row['nombre']; ?></td>
                                    <td><i class="fas fa-envelope-square"></i> <?php echo $row['correo'];?></td>
                                    <td><i class="fas fa-key"></i> <?php echo $row['pass'];?></td>
                                   
                                </tr>
                            <?php } ?>  
                            </tbody>
                    </table>
                    </div>
            </div>
      
    </div>
    <script src="../dist/js/jquery-3.3.1.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>