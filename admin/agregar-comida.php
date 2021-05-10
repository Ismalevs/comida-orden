<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Agregar Comida</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Titulo:</td>
                    <td>
                        <input type="text" name="Titulo" placeholder="Titulo de la comida">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><textarea name="descripcion"  cols="30" rows="7" placeholder="Descripcion de la comida"></textarea></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td>
                    <input type="number" name="precio" >
                    </td>
                </tr>

                <tr>
                    <td>Seleccionar Imagen</td>
                    <td><input type="file" name="imagen"></td>
                </tr>
                    <tr>
                        <td>Categoria</td>
                        <td>
                        <select name="categoria" >
                            <?php 
                            //colocar categorias desde la bD y crear sql para obtener las categorias activas
                            $sql="SELECT* FROM tbl_categoria where active='si'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);

                            if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        //obtener los detalles de categoria
                                        $id=$row['id'];
                                        $title=$row['title'];
                                     
                                    }
                            }
                            else{
                                ?>
                                    <option value="0">No categorias Encontradas</option>
                                <?php
                            }

                            ?>
                             <option value="1">Comida</option>
                            <option value="2">Aperitivo</option>
                        </select>
                        </td>
                    </tr>
                        <tr>
                            <td>Caracteristicas:</td>
                            <td><input type="radio" name="caracteristica" value="Si">Si
                                <input type="radio" name="caracteristica" value="No" >No
                            </td>
                        </tr>

                        <tr>
                        <td>Activo:</td>
                        <td>
                        <input type="radio" name="activo" value="Si">Si
                                <input type="radio" name="activo" value="No" >No
                        </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <input type="submit" name="submit" value="Agregar comida" class="btn-secundario">
                        </td>
                        </tr>

            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php');?>