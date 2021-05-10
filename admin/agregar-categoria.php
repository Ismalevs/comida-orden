<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Agregar Categoria</h1>
        <br> <br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>
        <!-- agregar categoria forma -->
        <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                    <td>titulo    </td>
                    <td><input type="text" name="titulo" placeholder="titulo de Categoria"></td>
                    </tr>
                    <tr>
                    <td>Caracteristica:</td>
                    <td>
                        <input type="radio" name="caracteristica" value="si">Si
                        <input type="radio" name="caracteristica" value="no">No
                    </td>
                    </tr>

                    <tr>
                        <td>Selecciona Imagen:</td>
                        <td><input type="file" name="imagen"></td>
                    </tr>

                    <tr>
                        <td>Activo:</td>
                        <td><input type="radio" name="active" value="si">Si
                        <input type="radio" name="active" value="no">No
                        </td>
                    </tr>
                        <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Agregar categoria" class="btn-secundario"></td>
                        </tr>

                </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
           
            //obtenr el valor de form
            $titulo=$_POST['titulo'];
            //necesitamos ver si el boton es seleccionado
            if(isset($_POST['caracteristica'])){
                $caracteristica=$_POST['caracteristica'];
            }
            else{
                $caracteristica="No";
            }
            if(isset($_POST['activo'])){
                $activo=$_POST['activo'];
            }
            else{
                $activo="No";
            }
                //ver si la imagen fue seleccionada y poner el valor de la imagen
            if(isset($_FILES['imagen']['name'])){
                //subir imagen
                $imagen_nombre=$_FILES['imagen']['name'];
                //renombrar imagen obtenemos la extencion de imagen eje(jpg.jpn,gift)
                $ext=end(explode('.',$imagen_nombre));
                //renombrar imagen
                $imagen_nombre="comida_categoria_".rand(000,999).'.'.$ext;

                $source_path=$_FILES['imagen']['tmp_name'];
                $destination_path="../images/categoria/".$imagen_nombre;
                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false){

                    $_SESSION['upload']="<div class='error'>error al subir la imagen</div>";
                    header('location:'.SITEURL.'admin/agregar-categoria.php');
                    die();
                }
            }
            else{
                $imagen_nombre="";
            }

            //crear query para guardar en BD
            $sql="INSERT INTO tbl_categoria SET
            titulo='$titulo',
            imagen_nombre='$imagen_nombre',
            caracteristica='$caracteristica',
            activo='$activo'
            

            ";
            //3-ejecutar los querys y guardar en la BD
            $res=mysqli_query($conn,$sql);
            //4comprobar si la query se ejecuto y se guardo los datos
            if($res==true){
                $_SESSION['add']="<div class='exitosamente'>Categoria agregada exitosamente.</div>";
                //redireccionar a la pagina categoria
                header('location:'.SITEURL.'admin/control-categoria.php');
            }
            else{
                //no se añadio a la bd
                $_SESSION['add']="<div class='error'>error.</div>";
                //redireccionar a la pagina categoria
                header('location:'.SITEURL.'admin/agregar-categoria.php');
            }
        }
        ?>

    </div>
</div>


<?php include('partials/footer.php');?>