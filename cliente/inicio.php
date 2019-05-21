<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiBoda.com</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <Script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></Script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                        <img src="../img/logo.png" width="30" height="30" alt="">
                </a>
                <h5 class="logo">MiBoda</h5>
                
          
        </nav>
    <div class="pagina">
        <div class="sidebar" style="margin-bottom: 0px;">
            <h2>menu</h2>
            <ul>
               
                <li>
                    <a href=""><i class="fas fa-list-ul"></i> invitados</a>
                </li>
                <li>
                    <a href=""><i class="fas fa-box"></i> paquetes</a>
                </li>
               
                <li>
                    <a class="cl" ><h3><i class="fas fa-power-off"></i> salir</h3></a>
                </li>
            </ul>
        </div>
        <div class="body2">
                    <div class="invitado" style="width: 30%; border: 1px solid grey;padding: 20px;background-color: #D5DBDB;height:700px;">  
                        <h2>nuevo invitado</h2> 
                            <form method="post" action="#">  
                                    <div class="form-group">
                                    <label for="formGroupExampleInput">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="israel gomez">
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">telefono</label>
                                    <input type="text" class="form-control"  name="telefono" placeholder="0003030303">
                                    </div>
                                    <div class="form-group">
                                            <label for="formGroupExampleInput2">correo</label>
                                            <input type="email" class="form-control" name="correo"  placeholder="correo@dominio.com">
                                    </div>
                                    <button type="submit" class="btn btn-primary">guardar</button>
                                </form>
                    </div>
                    <div class="invitados" style=" width: 70%;border: 1px solid grey;padding: 20px;background-color: #D5DBDB;overflow-y:scroll;height: 700px;">
                            <h2>mis invitados</h2>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th style="width:40%;">Nombre Invitado</th>
                                            <th style="width:20%;">Telefono</th>
                                            <th  style="width:30%;">Correo</th>
                                            <th style="width:10%;">Eliminar</th>
                                            <th style="width:10%;">Enviar Nota</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a></td>
                                            <td><button class="btn btn-success" ><i class="fas fa-share-square"></i></button></a></td>
                                        </tr>
                                        
                                </tbody>
                            </table>
                    </div>
                  
            </div>
      
    </div>

</body>
</html>