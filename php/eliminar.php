<?php
include("conexion.php");

$id = 11;

mysqli_query($conexion, "DELETE FROM usuario WHERE id_usuario = '$id'");
mysqli_close($conexion);
?>