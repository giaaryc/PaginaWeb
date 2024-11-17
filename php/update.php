<?php
include("conexion.php");

$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$clave = $_POST['clave'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql="UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', region = '$region', comuna='$comuna', clave = '$clave', correo='$correo', telefono='$telefono' WHERE id_usuario = '$id_usuario'";
$query=mysqli_query($conexion,$sql);

if($query){
    Header("Location: usuario.php");
}

mysqli_close($conexion);
?>
