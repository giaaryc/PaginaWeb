<?php
include("conexion.php");

$id_usuario=$_GET['id_usuario'];

$sql="DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
$query=mysqli_query($conexion, $sql);

if($query){
    Header("Location: usuario.php");
}


mysqli_close($conexion);

?>