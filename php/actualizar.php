<?php
include("conexion.php");

$nombre = "giare";
$apellido = "varas";
$region = "atacama";
$ciudad = "copiapo";
$pass = "3107";
$correo = "giare@gmail.com";

$id = 10;
$newnombre = "david";
$newclave = "1302";

mysqli_query($conexion, "UPDATE usuario SET nombre = '$newnombre', clave = '$newclave' WHERE id_usuario = $id");
mysqli_close($conexion);
?>