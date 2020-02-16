<!DOCTYPE html>
<?php
require_once 'datos.php';
ini_set('display_errors', 1);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Sitio de Ventas</title>
    <link rel="stylesheet" type="text/css" href="css/ventas.css">
    <script type="text/javascript" src="js/libraries/jquery/jquery-3.4.1.min"></script>
    <link rel="stylesheet" href="js/libraries/bootstrap/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/libraries/bootstrap/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
</nav>

<div id="encabezado">
    <img src="img/logo.png">
    <?php
    echo("<h1>" . "Titulo desde php" . "</h1>");
    ?>
    <h2>El mejor sitio de compras en la web</h2>
</div>
<div id="menu">
    <ul>
        <li><a href="#">Pagina Principal</a></li>
        <li><a href="#">Inicio de Sesion</a></li>
        <li><a href="#">Contacto</a></li>
        <ul>
</div>
<div id="buscador">
    <label>Ingresa tu busqueda</label>
    <input type="text"/>
    <input type="button" value="Buscar"/>
</div>
<div id="categorias">
    <h2>Categorias</h2>
    <ul>
        <?php
        foreach (getCategorias() as $categoria) {
            echo('<li><a href="#">' . $categoria .
                '</a></li>');
        }
        ?>
        <ul>
</div>
<div id="productos">
    <div class="producto">
        <img src="img/logo.png"/>
        <span class="nombre-producto">Pentium III</span>
        <p>Procesador muy lento y viejo</p>
        <span class="precio-producto">U$S 10</span>
    </div>
    <div class="producto">
        <img src="img/logo.png"/>
        <span class="nombre-producto">Pentium IV</span>
        <p>Procesador lento y viejo</p>
        <span class="precio-producto">U$S 15</span>
    </div>
    <div class="producto">
        <img src="img/logo.png"/>
        <span class="nombre-producto">i3</span>
        <p>Procesador lento y moderno</p>
        <span class="precio-producto">U$S 20</span>
    </div>
    <div class="producto">
        <img src="img/logo.png"/>
        <span class="nombre-producto">i5</span>
        <p>Procesador moderno y rapido</p>
        <span class="precio-producto">U$S 20</span>
    </div>
    <div class="producto">
        <img src="img/logo.png"/>
        <span class="nombre-producto">i7</span>
        <p>Procesador moderno y muy bueno</p>
        <span class="precio-producto">U$S 20</span>
    </div>
</div>
</body>
</html>