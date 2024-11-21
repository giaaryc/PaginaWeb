<?php
include("conexion.php");

if (isset($_GET['buscador'])) {
    $dato_buscado=$_GET['dato_buscado'];

    $sql="SELECT * FROM usuario WHERE id_usuario LIKE '%$dato_buscado%' OR nombre LIKE'%$dato_buscado%' OR apellido LIKE'%$dato_buscado%' OR region LIKE'%$dato_buscado%' OR comuna LIKE'%$dato_buscado%' OR correo LIKE'%$dato_buscado%' OR telefono LIKE'%$dato_buscado%'";
    $query=mysqli_query($conexion, $sql);
}

$alerta = "";
if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case 'registro':
            $alerta = "¡Registro de usuario exitoso!";
            break;
        case 'eliminar':
            $alerta = "¡Eliminación de usuario exitosa!";
            break;
        case 'actualizar':
            $alerta = "¡Modificación de usuario exitosa!";
            break;
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
    <title>Panel de control</title>
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

        <main class="container">
            <!--
            #<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h4><?php echo $alerta; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            -->
            <form action="" method="GET" class="d-flex align-items-center mb-4 my-5">
                <input type="search" name="dato_buscado" placeholder="Ingrese palabra clave" class="form-control me-3 py-2" aria-label="Search" >
                <input type="submit" name="buscador" class="btn btn-outline-dark btn-lg me-3">
                <a href="../PaginaWeb/registro.html" class="btn btn-outline-dark btn-lg text-nowrap">Añadir usuario</a>
            </form>
            <table class="table align-middle table-hover text-center">
                <thead class="table-active">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">REGIÓN</th>
                        <th scope="col">COMUNA</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">TELÉFONO</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                        while ($row=mysqli_fetch_array ($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id_usuario']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['apellido']?></td>
                        <td><?php echo $row['region']?></td>
                        <td><?php echo $row['comuna']?></td>
                        <td><?php echo $row['correo']?></td>
                        <td><?php echo $row['telefono']?></td>
                        <td><a href="actualizar.php?id_usuario=<?php echo $row['id_usuario']?>" class="btn btn-info">Editar</a></td>
                        <!--https://es.stackoverflow.com/questions/367584/alerta-confirmar-eliminar-registro-->
                        <td><a class="btn btn-danger" href="eliminar.php?id_usuario=<?php echo $row['id_usuario']?>" onclick="return confirm('¿Realmente desea eliminar?')">Eliminar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
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