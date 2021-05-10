<?php include'partials/menu.php'?>

<div class="main-content">
    <div class="wrapper">
    <h1>Gestionar Categorias</h1>

    <br/>  <br/>
    <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br><br>
        <!-- boton para agregar botton -->
        <a href="<?php echo SITEURL;?>admin/agregar-categoria.php" class="btn-primary">Agregar Categoria</a>
        <br/>  <br/>  <br/>
        <table class="tbl-full">
            <tr>
                <th>Numero de serie</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Caracteristica</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
                <?php 
                    //Query para obtener las categorias de la base de datos
                    $sql="SELECT *FROM tbl_categoria";
                    //ejecutar QUERY
                    $res=mysqli_query($conn,$sql);
                    //contar filas
                    $count=mysqli_num_rows($res);
                    //ver si tenemos datos en la BD
                    //crear variable numero serie
                    $sn=1;


                    if($count>0){
                        //tenemos datos en la BD
                        while($row=mysqli_fetch_assoc($res)){
                            $id=$row['id'];
                            $titulo=$row['titulo'];
                            $imagen_nombre=$row['imagen_nombre'];
                            $caracteristica=$row['caracteristica'];
                            $activo=$row['activo'];
                            ?>
                                                    <tr>  
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $titulo;?></td>

                                    <td>

                                    <?php 
                                        //ver si el nombre de la imagen esta disponible
                                        if($imagen_nombre!=""){
                                            //colocar la imagen
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/categoria/<?php echo $imagen_nombre;?>" width="100px" >
                                          
                                            <?php


                                        }
                                        else{
                                            //colocar el mensaje
                                            echo"<div class='error'>Ninguna Imagen Agregada</div>";

                                        }

                                    ?>
                                    </td>

                                    <td><?php echo $caracteristica;?> </td>
                                    <td><?php echo $activo;?> </td>
                                    <td>
                                    <a href="#" class="btn-secundario">actualizar Categoria</a>
                                    <a href="#" class="btn-primary">Borrar Categoria</a>

                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else{
                        ?>
                            <tr>
                                <td colspan="6"><div class="error">Ninguna categoria Agregada</div></td>
                            </tr>
                        <?php
                    }
                ?>

          
          
            
        </table>
</div>
</div>
<?php include'partials/footer.php'?>