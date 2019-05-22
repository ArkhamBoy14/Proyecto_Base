<?php
        $cc=$_POST['correo'];
            $pss=$_POST['password'];
            include 'database.php';
            $SQL=$conn->prepare("SELECT * FROM usuarios WHERE user = $cc and pass=$pss")
            if ($SQL->execute()){
                 header("location:../msj.html");
            }else{
                 header("location:../msj1.html");
            }
			
?>