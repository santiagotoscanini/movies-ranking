<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tarjeta de pelicula</title>
    <script href="js/cards.js"></script>

    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">
    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>
    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <script type="text/javascript" src="lib/popper/1.14.7/popper.min"></script>
</head>

<body>
<div class="card flex-row flex-wrap" style="width:400px">
    <img src="img/dog.jpg" height="200" widht="300" alt="">
    <div class="px-2">
        <h4 class="card-title">{$movie.titulo}</h4>
        <p class="card-text">{$movie.puntuacion}</p>
    </div>
</div>
</body>
</html>