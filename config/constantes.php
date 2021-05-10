<?php
    //empezar session
    session_start();

    //crear constantes para almacenar valores no repetidos
    define('SITEURL','http://localhost/comida-orden/');
    define('LOCALHOST','localhost');
    define('DB_USUARIO','root');
    define('DB_CONTRASEÑA','');
    define('DB_NOMBRE','comida-orden');

  //3-ejecutar Qjry y guardar el base de datos
  $conn=mysqli_connect(LOCALHOST,DB_USUARIO,DB_CONTRASEÑA) or die(mysqli_error());//conectar a la base de datos
  $db_select=mysqli_select_db($conn,DB_NOMBRE) or die(mysqli_error());//seleccionar base de datos
// $res=mysqi_query($conn,$sql) or die(mysqi_error());




?>