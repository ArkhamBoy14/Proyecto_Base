<?php
     $data=$_GET['data'];
    //condicional para ejecutar una funciones segun el parametro enviado
    if($data==="sesion"){ inicioSesion();}
    if($data==="registrar"){ add_usuario();}
    if($data==="addp"){ add_paquete();}
    if($data==="delete"){ delete();}
    if($data==="update"){ update_p();}
    if($data==="update_u"){ update_u();}
    if($data==="add_i"){ add_invitado();}
    if($data==="cerrar"){ CerrarSesion();}
    //FUNCIONES LISTAS A EJECUTAR
    
        function inicioSesion(){
            //inicio de sesion general
            $cc=$_POST['correo'];
            $pss=$_POST['password'];
            include 'config.php';
			$query= "SELECT * FROM usuario WHERE correo='$cc' and pass='$pss'";
			$resultado= $conexion->query($query);
            $row= $resultado->fetch_assoc();
            $user=$row['idUsuario'];
            $filas=mysqli_num_rows($resultado);
            if($filas>0){
                        if($row['tipo']==="admin"){
                            session_start();
                            $_SESSION['USUARIO']=$user;
                            header("location:../php/load.php?url=../admin/inicio.php");
                        }
                        if($row['tipo']==="agente"){
                            session_start();
                            $_SESSION['USUARIO']=$user;
                            header("location:../php/load.php?url=../agente/agenda.php");
                        }
                        if($row['tipo']==="cliente"){
                            session_start();
                            $_SESSION['USUARIO']=$user;
                            header("location:../php/load.php?url=../cliente/inicio.php");
                        }
                }else{
                           
                            echo "<script>location.href='../php/no.php'</script>"; 
                    }
           mysqli_free_result($resultado);
           mysqli_close($conexion);
        }
        
        function add_usuario(){
            //registro de usuarios nuevos
            include 'config.php';            $nombre=$_POST['nombre'];
            $app=$_POST['apellido'];         $pass=$_POST['pass'];      
            $correo=$_POST['correo'];        $tipo=$_POST['select'];
            $Telefono=$_POST['telefono'];    $nombre_tu=$_POST['nombre_tu'];
            $numero=$_POST['numero'];
            $apm_tu=$_POST['apm_tu'];
            $app_tu=$_POST['app_tu'];
            $dir=$_POST['dir'];
            $fecha=$_POST['fecha'];
            
          //$fecha=$_POST['fecha';
                                $SQL="INSERT INTO usuario (idUsuario,nombre, apellido, telefono, correo,pass,tipo,nomnre_tutor,apm_tutor,app_tutor,dir,fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                                $P=$conn->prepare($SQL);
                                $P->execute(array(null,$nombre,$app,$Telefono,$correo,$pass,$tipo,$nombre_tu,$app_tu,$apm_tu,$dir,$fecha));
                                header('Location: ../msj.html');
                                
           
            }
            
        
        function add_paquete(){
            include 'config.php';
            $nombre=$_POST['nombre'];
            $caracteristicas=$_POST['carac'];
            $costo=$_POST['costo'];
            $idagente=$_GET['id'];
           
                $SQL="INSERT INTO  paquete (nombre,costo,caracteristicas,idagente) VALUES (?,?,?,?)";
                $P=$conn->prepare($SQL);
                $P->execute(array($nombre,$costo,$caracteristicas,$idagente));
                echo "<script>location.href='../agente/inicio.php'</script>";
         
    
        }
        function delete(){
            //funcion de eliminar general
                include '../php/config.php';
                    try {
                        $id=$_GET['id'];
                        $tb=$_GET['tb'];
                        $url=$_GET['url'];
                        $odt=$_GET['odt'];
                        if($odt==="idpaquete"){
                        $query="DELETE FROM  {$tb} WHERE idpaquete = '$id'";
                        $resultado= $conexion->query($query);
                            
                        if ($resultado) {
                            header("location:../$url");
                        }
                        else{
                            echo "Registro Invalido";
                        }
                        }
                        if($odt==="idinvitado"){
                            $query="DELETE FROM  {$tb} WHERE idinvitados = '$id'";
                            $resultado= $conexion->query($query);
                            
                            if ($resultado) {
                                header("location:../$url");
                            }
                            else{
                                echo "Registro Invalido";
                            }
                        }
                       
                    } catch (Exception $e) {
                        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    }
        }
        function update_p(){
            //registro de usuarios nuevos
            include 'config.php';   
            $carac=$_POST['caracteristicas'];
            $nombre=$_POST['nombre'];
            $costo=$_POST['costo'];  
            $id=$_POST['id_paquete'] ;     
                $query="UPDATE paquete SET nombre='$nombre',costo='$costo',caracteristicas='$carac' WHERE  idpaquete='$id'";
                $resultado= $conexion->query($query);
               
                if ($resultado) {
                    header("location: ../agente/inicio.php");
                }
                else{
                    echo "Registro Invalido";
                }

           
            }
            function add_invitado(){
                include 'config.php';   
                $correo=$_POST['correo'];
                $nombre=$_POST['nombre'];
                $telefono=$_POST['telefono'];  
                $id=$_GET['id'];     
                    $query="INSERT INTO  invitados (nombre,telefono,correo,idcliente) VALUES ('$nombre','$telefono','$correo','$id')";
                    $resultado= $conexion->query($query);
                   
                    if ($resultado) {
                        header("location: ../cliente/inicio.php");
                    }
                    else{
                        echo "Registro Invalido";
                    }
    
               
                
            }
            function CerrarSesion(){
                //cierra  sesion
                session_start();
                session_destroy();
                echo "<script>location.href='../logout.html'</script>"; 
            }
            function update_u(){
                //registro de usuarios nuevos
                include 'config.php';   
                $correo=$_POST['correo'];
                $pass=$_POST['pass'];  
                $id=$_POST['idusuario'] ;     
                    $query="UPDATE usuario SET correo='$correo',pass='$pass' WHERE  idUsuario='$id'";
                    $resultado= $conexion->query($query);
                   
                    if ($resultado) {
                        header("location: ../admin/inicio.php");
                    }
                    else{
                        echo "Registro Invalido";
                    }
    
               
                }

     
 ?>