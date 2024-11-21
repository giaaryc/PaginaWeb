<?php
include("conexion.php");

$id = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$clave = $_POST['clave'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$confirmacion_clave = $_POST['confirmar_clave'];


$VerificarCorreo_sql = "SELECT * FROM usuario WHERE correo = '$correo'";
$resultado=mysqli_query($conexion,$VerificarCorreo_sql);

#VERIFICACION:
#mysqli_num_rows es para encontrar la cantidad de filas de la consulta
if (mysqli_num_rows($resultado) > 0){
    echo "El correo ya está registrado. Por favor, utiliza otro.";
}else{
    if($clave === $confirmacion_clave){
        $sql="INSERT INTO usuario (nombre, apellido, region, comuna, clave, correo, telefono) VALUES ('$nombre','$apellido','$region','$comuna','$clave','$correo', '$telefono')";
        $query=mysqli_query($conexion,$sql);
    
        if($query){
            Header("Location: ../PaginaWeb/index.html");
        } else{
            echo "No se pudo registrar el usuario";
        }    
    }else{
        echo "No se pudo registrar el usuario";
    }
    
}
