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
$confirmacion_clave = $_POST['confirmar_clave'];


$VerificarCorreo_sql = "SELECT * FROM usuario WHERE correo = '$correo'";
$resultado=mysqli_query($conexion,$VerificarCorreo_sql);

#VERIFICACION:
#mysqli_num_rows es para encontrar la cantidad de filas de la consulta
if (mysqli_num_rows($resultado) > 0){
    $alerta = " ❌ ERROR: EL CORREO YA ESTA EN USO ❌ <br><br>";
}else{
    if($clave === $confirmacion_clave){
        $sql="INSERT INTO usuario (nombre, apellido, region, comuna, clave, correo, telefono) VALUES ('$nombre','$apellido','$region','$comuna','$clave','$correo', '$telefono')";
        $query=mysqli_query($conexion,$sql);
    
        if($query){
            $alerta = "¡USUARIO REGISTRADO CORRECTAMENTE! </b><br>";
        } else{
            $alerta = " ❌ ERROR: NO SE PUDO CONECTAR A LA BD ❌ <br><br>";
        }    
    }else{
        $alerta = " ❌ ERROR: CONTRASEÑAS NO COINCIDEN ❌ <br><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PaginaWeb/style.css">
    <link rel="stylesheet" href="../PaginaWeb/stylePropio.css">
    <title>Sesión inicida</title>
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
            <h3><?php echo $alerta; ?></h3>       
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-color-extra4 mx-2 btn-lg" data-bs-dismiss="alert" onclick="location.href='../PaginaWeb/registro.html'">Registro</button>
                <button type="button" class="btn btn-color-extra4 mx-2 btn-lg" data-bs-dismiss="alert" onclick="location.href='../PaginaWeb/index.html'">Inicio</button>
            </div>
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