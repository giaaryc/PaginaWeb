<?php
include("conexion.php");

$alerta = "INGRESA TODOS LOS DATOS PARA LA RECUPERACIÓN";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['correo'];
    $clave = $_POST['clave'];
    $confirmar_clave = $_POST['confirmar_clave'];
    
    $VerificarCorreo_sql = "SELECT * FROM usuario WHERE correo = '$usuario'";
    $resultado = mysqli_query($conexion, $VerificarCorreo_sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        if ($clave === $confirmar_clave) {
            $ActualizarClave_sql = "UPDATE usuario SET clave = '$clave' WHERE correo = '$usuario'";
            $query = mysqli_query($conexion, $ActualizarClave_sql);
            if ($query) {
                $alerta = " 🧁 ¡RECUPERACIÓN DE CLAVE EXITOSA! 🧁 <br><br>
                    <button type='button' class='btn btn-color-extra4 mx-auto btn-lg' onclick=\"location.href='../PaginaWeb/index.html'\">Volver al inicio</button>
                ";
            } else {
                $alerta = "❌ ERROR: NO SE PUDO ACTUALIZAR CONTRASEÑA ❌";
            }
        }else{
            $alerta = "❌ ERROR: CONTRASEÑAS NO COINCIDEN ❌";
        }
    }else{
        $alerta = "❌ ERROR: USUARIO NO EXISTE ❌ <br><br>
        <button type='button' class='btn btn-color-extra4 mx-auto btn-lg' onclick=\"location.href='../PaginaWeb/registro.html'\">Registrarse</button>
        ";
    }    
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

    <main class="bg-color-terciario container py-3 mx-auto my-5">
        <div class="alert alert-info alert-dismissible fade show py-5 mt-2 mb-3 text-center" role="alert">
            <h3 class="my-auto"><?php echo $alerta; ?></h3>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <h3 class = "display-4 text-light text-center mt-2">RECUPERACIÓN DE CONTRASEÑA</h3>
        <form class=" col-8  mx-auto"  action="" method="POST">
            <div class="py-3 mb-2 mx-auto">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ej: name@example.com" name="correo" value="<?php echo $row['correo'] ?>">
            </div>
            <div class="my-2 py-2 mx-auto">
                <label for="inputPassword5">Nueva contraseña</label>
                <input type="password" id="inputPassword5" class="form-control" name="clave" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Tu contraseña debe tener entre 8 y 20 caracteres. <br>
                </small>                    
            </div>
            <div class="my-3 mx-auto">
                <label for="inputPassword5">Confirmar contraseña</label>
                <input type="password" id="inputPassword5" class="form-control" name="confirmar_clave" required>                
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Ingresa tu contraseña nuevamente.<br>
                </small>    
            </div>
            <button type="submit" class="btn btn-lg btn-color-secundario mb-3">Cambiar Contraseña</button>                
        </form>
    </main> 

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
    <!--COSA DEL BOOTSTRAP-->
    <script src="../BOOTSTRAP/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>