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

$sql="INSERT INTO usuario (nombre, apellido, region, comuna, clave, correo, telefono) VALUES ('$nombre','$apellido','$region','$comuna','$clave','$correo', '$telefono')";
$query=mysqli_query($conexion,$sql);

if($query){
    Header("Location: usuario.php");
} else{
}

mysqli_close($conexion);
?>