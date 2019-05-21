<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tabla alumnos</title>
     <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/estilos.css">
</head>
<body>
      <div class="body2">
        <div class="registro2" id="registro" >
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">info</th>                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        include 'database.php';
                         try {
                          
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT nombre,apellido,id FROM usuario"); 
                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach($result as $row) { 
                                
                                echo "<tr><td>". $row['nombre']."</td>";
                                echo "<td>". $row['apellido']."</td>";
                                echo '<td><a href="info.php?id='.$row['id'].'" class="btn btn-primary btn-lg" role="button" >info</a></td></tr>';
                                
                            }
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        ?>
                       
                      
                    
                   <a href=''></a>
                </tbody>
                </table>
         </div>
       
      </div>
</body>
</html>