<?php
include("conexion.php");

$id_usuario = $_GET['id_usuario'];

$sql="SELECT * FROM usuario WHERE id_usuario='$id_usuario'";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PaginaWeb/style.css">
    <link rel="stylesheet" href="../PaginaWeb/stylePropio.css">
    <title>Actualizar</title>
</head>
<body class="body-principal">
    <div class = "container-fluid">
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
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main class="d-flex justify-content-center mt-5">
        <form class="row bg-color-extra1 container-especial p-3" action="update.php" method="POST">
            <h2 class="display-6 text-center py-3 my-3">MODIFICACIÓN</h2>
            <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'] ?>">

            <div class="form-group col-12">
                <label for="nombreCompleto">Nombre y Apellido</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $row['nombre'] ?>">
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $row['apellido'] ?>">
                </div>
            </div>
            <div class="form-group col-6">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ej: name@example.com" name="correo" value="<?php echo $row['correo'] ?>">
            </div>
            <div class="form-group col-6">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" placeholder="Ej: 123456789" name="telefono" value="<?php echo $row['telefono'] ?>">
            </div>
            <div class="form-group col-3">
                <label for="inputGroupSelect01">Región</label>
                <select class="form-select custom-input" id="inputGroupSelect01" name="region" value="<?php echo $row['region']?>">
                    <option value="Atacama">Atacama</option>
                    <option value="Valparaíso">Valparaíso</option>
                    <option value="Metropolitana">Metropolitana</option>
                    <option value="Biobío">Biobío</option>
                    <option value="Otra">Otra</option>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="validationDefault03">Comuna</label>
                <input type="text" class="form-control" id="validationDefault03" name="comuna" value="<?php echo $row['comuna'] ?>">
            </div>
            <div class="form-group col-6">
                <label for="inputPassword5">Contraseña</label>
                <input type="password" id="inputPassword5" class="form-control" name="clave" value="<?php echo $row['clave'] ?>">
            </div>
            <input type="submit" class="btn btn-color-extra4 btn-lg col-4 mt-4 mb-2 mx-auto" value="Actualizar"></input>
        </form>
        </main>

        <footer class="bg-color-secundario py-5 px-4 mt-5">
            <div class="container-fluid">
                <section id="Links" class="row mb-5">
                    <div class="col-12 col-md-3 mb-3">
                        <h3 class="text-color-principal text-center">Conócenos</h3>
                        <!-- list-unstyled = le quita los puntitos a la lista -->
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
</body>

</html>