<?php
#Al final no las use :)
# $_SESSION -> es una array para guardar información del usuario
# session_start() -> funcion que inicia o reabre una sesión entre el usuario y servidor, permitiendo que los valores guardados con el array sean accesibles
# unset() o session_unset()-> sirve para desvilcular todos los valores de la sesión, pero esta sigue abierta
# session_destroy() ->  destruye la sesión

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuario WHERE correo = '$usuario'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    if ($row['clave'] === $clave) {
        $alerta = "BIENVENID@ <b>" . $row['nombre'] . " " . $row['apellido'] . "</b><br>¡¿🧁 LIST@ PARA HACER TUS MÁS DULCES SUEÑOS REALIDAD 🧁?! </b><br>" ;
    } else {
        $alerta = " ❌ <b>USUARIO O CONTRASEÑA INCORRECTA</b> ❌ <br><br> Recuerda registrarte antes </b><br>";
    }
} else {
    $alerta = " ❌ <b>USUARIO O CONTRASEÑA INCORRECTA</b> ❌ <br><br> Recuerda registrarte antes </b><br>";
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PaginaWeb/style.css">
    <link rel="stylesheet" href="../PaginaWeb/stylePropio.css">
    <title>Login</title>
</head>

<body class="body-principal">
    <div class="container-fluid">
        <header>
            <div class="container-fluid d-flex justify-content-center align-item-center bg-fondo-arcoiris" >
                <img class="LogoSuperior" src="../imagenes/Logo.png" alt="Logo de la tienda">
            </div>
            <nav class="navbar navbar-expand-lg bg-color-secundario">
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../PaginaWeb/index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../PaginaWeb/nosotros.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../php/usuario.php">Panel de Control</a>
                    </li>
                    </ul>
                    <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
                </div>
            </nav>
        </header>
            <div class="alert alert-info alert-dismissible fade show py-5 mt-5 mb-5 text-center" role="alert">
                <h3 class="my-auto"><?php echo $alerta; ?></h3>
                <!--onclick="location.href='index.php'" AL HACER CLICK TE LLEVA AL INICIO-->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='../PaginaWeb/index.html'"></button>
            </div>
        <footer class="bg-color-secundario py-5 mt-5">
            <div class="container-fluid">
                <section id="Links" class="row mb-5">
                    <div class="col-12 col-md-3 mb-3">
                        <h3 class="text-color-principal text-center">Conócenos</h3>
                        <ul class="list-unstyled">
                            <li><a href="Nosotros.html" class="text-color-principal text-decoration-none">Quiénes somos</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Preguntas frecuentes</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Comentarios</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Link 1</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h3 class="text-color-principal text-center">Nuestros productos</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-color-principal text-decoration-none">Galletas</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Cupcakes y Muffins</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Tartas</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Postres veganos y/o sin gluten</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h3 class="text-color-principal text-center">Acompáñanos</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-color-principal text-decoration-none">Eventos</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Cursos</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">Sorpresas</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">...</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <h3 class="text-color-principal text-center">Navegación</h3>
                        <ul class="list-unstyled">
                            <li><a href="indexPropio.html" class="text-color-principal text-decoration-none">Inicio</a></li>
                            <li><a href="Login.html" class="text-color-principal text-decoration-none">Iniciar Sesión</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">...</a></li>
                            <li><a href="#" class="text-color-principal text-decoration-none">...</a></li>
                        </ul>
                    </div>
                </section>
                <section class="Social text-center mb-4">
                    <!--img-fluid = para que sea 100% (responsiva)-->
                    <a href="#" class="mx-2"><img src="../imagenes/face.png" alt="Facebook" class="img-fluid img-social"></a>
                    <a href="#" class="mx-2"><img src="../imagenes/wsp.png" alt="WhatsApp" class="img-fluid img-social"></a>
                    <a href="#" class="mx-2"><img src="../imagenes/instagram.png" alt="Instagram" class="img-fluid img-social"></a>
                    <a href="#" class="mx-2"><img src="../imagenes/tiktok.png" alt="TikTok" class="img-fluid img-social"></a>
                    <a href="#" class="mx-2"><img src="../imagenes/correo.png" alt="Correo" class="img-fluid img-social"></a>
                </section>
                <div class="text-center">
                    <p>&copy; 2024 Giarella Varas C.</p>
                </div>
            </div>
        </footer>    
    </div>
    <!--COSA DEL BOOTSTRAP-->
    <script src="../BOOTSTRAP/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>