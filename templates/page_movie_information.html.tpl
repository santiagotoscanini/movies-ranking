<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>MoviesSSTT</title>

    <link rel="stylesheet" type="text/css" href="css/content_page">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">

    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>
    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
</head>
<body>
{include file="header.html.tpl" genres=$genres}
<div class="cards-container">
    <div class="card flex-row flex-wrap body row" style="margin:22px 22px 0px 22px;border-radius: 0px 25px 25px 0px;">
        <div class=" align-self-center"><img src="img/hp.jpg" height="250" alt=""></div>
        <div class="pl-5 pt-4 pb-4 col-10">
            <h4 class="card-title">{$movie.titulo}</h4>
            <p class="card-text"><b>Genero:</b> {$movie.nombre}</p>
            <p class="card-text"><b>Puntuación:</b> {$movie.puntuacion}</p>
            <p class="card-text">
                <b>Resumen:</b> {$movie.resumen}
            </p>

            <a class="btn btn-info mt-1" href="movies_pagination.php?id={$movie.id}"
               style="background-color:#33cabb ;border-color: #33cabb;">
                Ver mas información
            </a>
        </div>
    </div>
</div>
</body>