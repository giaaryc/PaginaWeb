<?php

include("conexion.php");

if (empty($_POST['Login'])){
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $sql="SELECT * FROM usuario WHERE correo = '$usuario' AND clave = '$clave'";
    $query=mysqli_query($conexion, $sql);
        
    if ($datos=$query->fetch_object()){
        Header("Location: ../PaginaWeb/index.html");
        echo '<div class="alert alert-info">¡ACCESO EXITOSO!</div>';
    } else {
        echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
    }
}
?>