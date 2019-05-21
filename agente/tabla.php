<table class="table">
        <thead class="thead-dark">
            <tr>
                <th style="width:40%;">nombre</th>
                <th style="width:40%;"> correo</th>
                <th style="width:10%;">asistencia</th>
                <th style="width:10%;">invitacion</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include '../php/config.php';
            $id=$_GET['id'];
            $query= "SELECT * FROM invitados WHERE idcliente='$id'";
            $resultado= $conexion->query($query);
            while($row= $resultado->fetch_assoc()){
            ?>
            <tr>
                <td><i class="fas fa-user-tag"></i> <?php echo $row['nombre']; ?></td>
                <td><?php echo $row['correo'];?></td>
                <td tyle="width:10%;"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td>
                <td tyle="width:10%;"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td>
                 </tr>
           <?php } ?>  
        </tbody>
</table>