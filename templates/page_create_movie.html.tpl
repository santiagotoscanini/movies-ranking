<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Movie register</title>

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
            Movie register
        </h1>
        <form method="POST" action="do_create_movie.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Name of the movie</label>
                    <input required class="form-control" name="movie_name" placeholder="Movie name">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Movie genre</label>
                    <select required name="genre_id" id="inputState" class="form-control">
                        {foreach from=$genres item=genre}
                            <option value="{$genre.id}">{$genre.nombre}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Date</label>
                    <input required name="date" type="date" id="inputState" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea required name="description" class="form-control" rows="5" id="description"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Director</label>
                    <input name="director" class="form-control" required placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Cast</label>
                    <small class="text-muted">(put the names separated by commas)</small>
                    <input class="form-control" required name="cast" placeholder="Name1, Name2, ...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Code of the youtube trailer</label>
                    <input type="text" name="youtube_trailer" class="form-control" placeholder="Link here">
                </div>
                <label>Movie Poster</label>
                <div class="custom-file">
                    <input name="poster" type="file" class="custom-file-input" accept=".jpg,.png"
                           id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-save">Save</button>
        </form>
    </div>
{else}
    <!-- TODO hacer un componente para mostrar cuando se accede a un lugar prohibido-->
    error
{/if}
</body>