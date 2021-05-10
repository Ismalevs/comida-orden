<?php include('partials/menu.php');?>

      <div class="main-content">
      <div class="wrapper"> <h1>Control de Usuarios</h1>
      <br/>  
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);//remover session
            }
        ?>
        <br> <br><br>
        <!-- boton para agregar botton -->
        <a href="agregar-admin.php" class="btn-primary">Agregar Usuario</a>
        <br/>  <br/>  <br/>
        <table class="tbl-full">
            <tr>
                <th>Numero de serie</th>
                <th>Nombre completo</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
                <?php
                //Query para obtener todos los usuarios
                $sql="SELECT*FROM tbl_admin";
                //Ejecutar el Query
                $res=mysqli_query($conn,$sql);
                //checar si el query es ejecutado
                if($res==TRUE){
                    //contar si tenemos datos en la base de datos
                    $count=mysqli_num_rows($res);//funcion obtener las filas en la BD
                    //verificar el numero de filas
                    $sn=1;//variable asignar valor
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            //bucle obtener datos de la BD
                            $id=$rows['id'];
                            $nombre_completo=$rows['nombre_completo'];
                            $usuario=$rows['usuario'];
                            ?>
                                         
                                            <tr>  
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $nombre_completo; ?></td>
                                <td><?php echo $usuario; ?></td>
                                <td>
                                <a href="#" class="btn-secundario">actualizar Usuario</a>
                                <a href="#" class="btn-primary">Borrar Usuario</a>

                                </td>
                                </tr>

                            <?php
                        }
                    }
                    else{

                    }
                }

                ?>


           
                  </table>

        <div class="clearfix"></div>
    </div>
        </div>

        <?php include('partials/footer.php');?>     