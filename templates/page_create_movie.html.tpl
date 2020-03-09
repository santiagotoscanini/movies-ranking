<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registro de película</title>

    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">

    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>
    <link rel="stylesheet" href="css/form.css"/>
</head>

<body>
{include file="header.html.tpl" site=$site}
{if isset($logged_user) && ($logged_user.es_administrador==1)}
    <div class="movie-form">
        <h1>
            Registro de película
        </h1>
        <form method="POST" action="do_create_movie.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nombre de la película</label>
                    <input required class="form-control" name="movie_name" placeholder="Nombre película">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Género de la película</label>
                    <select required name="genre_id" id="inputState" class="form-control">
                        {foreach from=$genres item=genre}
                            <option value="{$genre.id}">{$genre.nombre}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Fecha de estreno</label>
                    <input required name="date" type="date" id="inputState" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Descripción:</label>
                <textarea required name="description" class="form-control" rows="5" id="description"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Director</label>
                    <input name="director" class="form-control" required placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label>Reparto</label>
                    <small class="text-muted">(escribe los nombres separados por coma)</small>
                    <input class="form-control" required name="cast" placeholder="Nombre1, Nombre2, ...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Código del trailer de youtube.</label>
                    <input type="text" name="youtube_trailer" class="form-control" placeholder="Link aquí">
                </div>
                <div class="form-group col-md-6">
                    <label>Poster de la película</label>
                    <div class="custom-file form-group">
                        <input name="poster" type="file" class="custom-file-input form-control" accept=".jpg,.png"
                               id="customFile" required>
                        <label class="custom-file-label" for="customFile">Selecciona un archivo</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-save">Guardar</button>
        </form>
    </div>
{else}
    <div class="card" style="border-color: red; width: 400px; margin: 30px">
        <div class="card-body" style="border-color: red">
            Lo sentimos, no tienes permiso para acceder a este sitio.
        </div>
    </div>
{/if}
</body>