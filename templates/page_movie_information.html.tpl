<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>MoviesSSTT</title>

    <link rel="stylesheet" type="text/css" href="css/content_page">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">

    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>

    <script type="text/javascript" src="js/approved_comments_container.js"></script>
</head>
<body>
{include file="header.html.tpl" genres=$genres site=$site getvariable=$getvariable}

<div class="cards-container">
    <div class="card flex-row flex-wrap body row" style="margin:22px 22px 0px 22px;border-radius: 0px 25px 25px 0px;">
        <div class="align-self-center"><img src="movie_posters/{$movie.id}" width="230" alt=""></div>
        <div class="pl-5 pt-4 pb-4 col-10">
            <input type="hidden" id="movie-id" value={$movie.id}>
            <h4 class="card-title">{$movie.titulo}</h4>
            <p class="card-text"><b>Fecha de lanzamiento:</b> {$movie.fecha_lanzamiento}</p>
            <p class="card-text"><b>Genero:</b> {$movie.nombre}</p>
            <p class="card-text"><b>Puntuación:</b> {$movie.puntuacion}</p>
            <p class="card-text"><b>Director:</b> {$movie.director}</p>
            <p class="card-text"><b>Elenco:</b> {$cast}</p>
            <p class="card-text"><b>Resumen:</b> {$movie.resumen}</p>
            <p class="card-text"><b>Trailer:</b></p>
            <iframe
                    width="300"
                    height="200"
                    src={"https://www.youtube.com/embed/{$movie.youtube_trailer}"}
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>
    </div>

    {include file="movie_new_comment.html.tpl" }
    <div id="a_comments"></div>
</div>
</body>