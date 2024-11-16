<?php

$server = "localhost";
$user = "root";
$pass = "giare3107";
$bd = "DeliciasGiamGiAm";

$conexion = new mysqli($server, $user, $pass, $bd);

if($conexion->connect_error){
    die("LA CONEXIÓN HA FALLADO" . $conexion->connect_error);
} 
?>