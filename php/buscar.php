<?php
include("conexion.php");

mysqli_query($conexion, "SELECT * FROM usuario");
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
        <main>
        </main>
    </div>
</body>

</html>