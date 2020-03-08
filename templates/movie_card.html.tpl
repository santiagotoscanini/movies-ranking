<div class="card flex-row flex-wrap body row" style="margin:22px 22px 0px 22px;border-radius: 0px 25px 25px 0px;">
    <div class=" align-self-center"><img src="movie_posters/{$movie.id}" width="230" alt=""></div>
    <div class="pl-5 pt-4 pb-4 col-10">
        <h4 class="card-title">{$movie.titulo}</h4>
        <p class="card-text"><b>Genero:</b> {$movie.nombre}</p>
        <p class="card-text"><b>Fecha lanzamiento:</b> {$movie.fecha_lanzamiento}</p>
        <p class="card-text"><b>Puntuación:</b> {$movie.puntuacion}</p>
        <p class="card-text">
            <b>Resumen:</b> {$movie.resumen}
        </p>

        <a class="btn btn-info mt-1" href="page_movie_information.php?id={$movie.id}"
           style="background-color:#33cabb ;border-color: #33cabb;">
            Ver mas información
        </a>
    </div>
</div>