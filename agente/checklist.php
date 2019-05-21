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
    <script src="../dist/js/jquery-3.3.1.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
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
                <div  style="width: 100%; height: auto; border: 1px solid grey; padding: 20px;background-color: #D5DBDB;  height: 700px;  overflow-y:scroll;border-radius:10px;">
                    <h2>lista de asistencia en la boda</h2>
                            <form >      
                                        <?php
                                            include '../php/config.php';
                                            $sql = "SELECT * FROM `usuario` WHERE tipo='cliente'";
                                            $resultado=mysqli_query($conexion,$sql);
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label for="inputState">cliente:</label>
                                            <select id="id_cliente"  class="form-control">
                                                <option selected>...</option>
                                                <?php 
                                                    while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['idUsuario']; ?>"><?php echo $row['nombre'];?></option>
                                                <?php }?>
                                            </select>  <br>
                                            <button type="button"  id="enviar" class="btn btn-success"><i class="fas fa-search-plus"></i> buscar lista de invitados</button>
                                        </div>

                            </form> 
                            <div id="tabla"></div>   
                </div>
                
        </div>
                    
      
    </div>
    <script>
     document.getElementById("enviar").addEventListener("click",cambia);
     function cambia() {
         var id=document.getElementById("id_cliente").value;
         var xhr = new XMLHttpRequest();
         xhr.onreadystatechange=function(){
             if(this.readyState==4 && this.status==200){
                 document.getElementById("tabla").innerHTML=this.responseText;
             }
         };

         xhr.open("GET","tabla.php?id="+id,true);
         xhr.send();
     }
    </script>
    
</body>
</html>