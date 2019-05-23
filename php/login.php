<?php

        define("data","sesion");
        $cc=$_POST['correo'];
            $pss=$_POST['password'];
            include 'config.php';
            $SQL=$conn->prepare("SELECT * FROM usuario WHERE correo = '$cc' and pass='$pss'");
            if ($SQL->execute()) {
                 header("location:../msj.html");

            }else{
                 header("location:../msj1.html");
            }
			
?>