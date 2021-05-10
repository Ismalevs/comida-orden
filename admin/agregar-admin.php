<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Agregar Usuario</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add'])){//verificar si session esta activo
                echo $_SESSION['add'];//mostrar si esta activo
                unset($_SESSION['add']);//remover session mensaje
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Nombre completo</td>
                    <td><input type="text" name="nombre_completo" placeholder="Ingresa tu nombre"></td>
                </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="text" name="usuario" placeholder="Tu usuario"></td>
                    </tr>
                    <tr>
                        <td>contraseña</td>
                        <td><input type="password" name="contraseña" placeholder="Tu contraseña"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Agrega usuario" class="btn-secundario"></td>
                    </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php');?>

<?php 
//procesar el valor de form i guardar en basedatos
if(isset($_POST['submit'])){
    //si el botton es presionado
    // echo 'Boton Presionado';
    //1-obtener la informacion de form
     $nombre_completo=$_POST['nombre_completo'];
     $usuario=$_POST['usuario'];
     $contraseña=md5($_POST['contraseña']);//md5 encripta contraseña
     //2-sql query para guardar datos en la base de datos
     $sql="INSERT INTO tbl_admin SET
     nombre_completo='$nombre_completo',
     usuario='$usuario',  
     contraseña='$contraseña'
        ";
   //3-ejecutar Qjry y guardar el base de datos
   $res=mysqli_query($conn,$sql,) or die(mysqli_error());//conectar a la base de datos
   //4ver si los datos fueron ingresados(si query esta ejecutando)
    if($res==TRUE){
        // echo "Datos ingresados";
        //crear variable con session
        $_SESSION['add']="Usuario agregado exitosamente";
        //redireccionar
        header("location:".SITEURL.'admin/control.admin.php');
    }
    else{
        // echo "False fallo ingresar datos";
        $_SESSION['add']="Error al agregar usuario";
        //redireccionar
        header("location:".SITEURL.'admin/agregar-admin.php');
    }

}

?>