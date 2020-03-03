<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min"/>
    <link rel="stylesheet" href="lib/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="lib/bootstrap/3.3.7/js/bootstrap.min"></script>
</head>
<nav class="navbar navbar-default navbar-expand-lg navbar-light" style="padding-left: 0">
    <div class="navbar-header d-flex" style="margin-left: 22px">
        <a class="navbar-brand" href="index.php">
            Movies<b>SSTT</b>
        </a>
    </div>
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Generos</a>
                <ul class="dropdown-menu">
                    {foreach from=$genres item=genre}
                        <li><a href="#" class="dropdown-item">{$genre.nombre}</a></li>
                    {/foreach}
                </ul>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link">Comentarios</a>
            </li>
            <li class="nav-item">
                <a href="page_create_movie.php" class="nav-link">Nueva pelicula</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right ml-auto">
            <li class="nav-item">
                <form class="navbar-form form-inline">
                    <div class="input-group search-box">
                        <input type="text" id="search" class="form-control" placeholder="Nombre de película..."/>
                        <span class="input-group-addon">
                    <i class="material-icons">&#xE8B6;</i>
                </span>
                    </div>
                </form>
            </li>
            {if (isset($logged_user))}
                    <a class="logged-user-alias navbar-brand">
                        <b>{$logged_user.alias}</b>
                    </a>
                <div class="logged-user-container">
                    <a class="btn btn-info mt-1 btn-logout" href="doLogout.php?"
                       style="background-color:#33cabb ;border-color: #33cabb;">
                        Logout
                    </a>
                </div>
            {else}
            <li class="nav-item mr-4">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
                <ul class="dropdown-menu form-wrapper">
                    <li>
                        <form action="doLogin.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="required"
                                       name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="required"
                                       name="pass">
                            </div>
                            {if ($err == 1)}
                                <small class="text-muted worning">Incorrect data</small>
                            {/if}
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </form>
                    </li>
                </ul>
            </li>
            <li class="nav-item mt-2">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1">Sign
                    up</a>
                <ul class="dropdown-menu form-wrapper">
                    <li>
                        <form action="/examples/actions/confirmation.php" method="post">
                            <p class="hint-text">Completa los campos para registrarte!</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Correo" required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Usuario" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña"
                                       required="required">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                        </form>
                    </li>
                </ul>
            </li>
            {/if}

        </ul>

    </div>
</nav>