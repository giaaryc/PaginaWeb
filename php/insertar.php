<?php
include("conexion.php");

$nombre = "giare";
$apellido = "varas";
$region = "atacama";
$ciudad = "copiapo";
$pass = "3107";
$correo = "giare@gmail.com";

mysqli_query($conexion, 'INSERT INTO usuario (nombre, apellido, region, ciudad, clave, correo) VALUES ("$nombre","$apellido","$region","$ciudad","$pass","$correo")');
mysqli_close($conexion);
?>