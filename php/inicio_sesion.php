<?php

session_start();
# $_SESSION -> es una array para guardar información del usuario
# session_start() -> funcion que inicia o reabre una sesión entre el usuario y servidor, permitiendo que los valores guardados con el array sean accesibles
# unset() o session_unset()-> sirve para desvilcular todos los valores de la sesión, pero esta sigue abierta
# session_destroy() ->  destruye la sesión
# 

include("conexion.php");


session_destroy();
mysqli_close($conexion);

?>