<?php
            $cc=$_GET['correo'];
            $pss=$_GET['password'];
            include 'config.php';
            $SQL=$conn->prepare("SELECT * FROM usuarios WHERE user = '$cc' and pass= '$pss'");
            if ($SQL->execute()){
                 header("location:../msj.html");
            }else{
                 header("location:../msj1.html");
            }
			
?>