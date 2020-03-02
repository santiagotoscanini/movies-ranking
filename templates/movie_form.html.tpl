<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/form.css" />
</head>

<body>

    <div class="movie-form">

        <h1>
            Registro de pelicula
        </h1>

        <form class="fields">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Name of the movie</label>
                    <input class="form-control" placeholder="Movie name">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Movie genre</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="description" placeholder="Resume..."></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Director</label>
                    <input class="form-control" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Cast</label>
                    <small class="text-muted">(put the names separated by commas)</small>
                    <input class="form-control" placeholder="Name1, Name2, ...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Link to the movie trailer</label>
                    <input type="text" class="form-control" placeholder="Link here">
                </div>
                <form>
                    <div class="form-group form-group-input">
                        <label>Movie Poster</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </form>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>

    </div>



</body>