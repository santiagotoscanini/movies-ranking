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
    <ul class="nav navbar-nav navbar-left mr-auto">
        {if (isset($logged_user)) && $logged_user["es_administrador"]==1}
            <!-- TODO: falta verificar que sea admin-->
            <li class="nav-item active">
                <a href="page_comments_request.php" class="nav-link">Comentarios</a>
            </li>
            <li class="nav-item">
                <a href="page_create_movie.php" class="nav-link">Nueva pelicula</a>
            </li>
        {/if}
    </ul>
    <ul class="nav navbar-nav d-flex justify-content-end">
        {if isset($initial_page)}
            <li class="nav-item dropdown">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Generos</a>
                <ul class="dropdown-menu">
                    {foreach from=$genres item=genre}
                        <li><a href="#" class="dropdown-item genre-selected" catId="{$genre.id}">{$genre.nombre}</a>
                        </li>
                    {/foreach}
                </ul>
            </li>
        {/if}
    </ul>

    <ul style="margin-right: 7px" class="nav navbar-nav navbar-right ml-auto">
        {if isset($initial_page)}
            <li class="nav-item">
                <div class="navbar-form form-inline">
                    <div class="input-group search-box">
                        <input type="text" class="form-control search-movie" placeholder="Movie name..."/>
                        <span class="input-group-addon">
                    <i class="material-icons">&#xE8B6;</i>
                </span>
                    </div>
                </div>
            </li>
        {/if}

        {if isset($err)}
            <!-- TODO: falta verificar que el error sea 1,2 o 3 para ver si los datos estan mal al loggear,ya existe usuario al registrar o la contraseña es de menos de 6 caracteres-->
            {if $err==1}
                <li>
                    <p style="margin-top:15px; margin-right: 10px" class="text-danger align-self-center">
                        Error, datos incorrectos
                    </p>
                </li>
            {elseif $err==2}
                <li>
                    <p style="margin-top:15px; margin-right: 10px" class="text-danger align-self-center">
                        Error, usuario ya registrado
                    </p>
                </li>
            {elseif $err==3}
                <li>
                    <p style="margin-top:15px; margin-right: 10px" class="text-danger align-self-center">
                        Error, contraseña menor a 6 caracteres
                    </p>
                </li>
            {elseif $err==4}
                <li>
                    <p style="margin-top:15px; margin-right: 10px" class="text-success align-self-center">
                        Cuenta creada exitosamente
                    </p>
                </li>
            {/if}
        {/if}

        {if (isset($logged_user))}
            <a style="margin-left:25px" class="logged-user-alias navbar-brand">
                <b>Bienvenido, {$logged_user.alias}!</b>
            </a>
            <div class="logged-user-container">
                {if isset($getvariable)}
                    <a href="logout.php?site={$site}&getvariable={$getvariable}"
                       class="btn btn-danger dropdown-toggle get-started-btn mt-1 mb-1">Logout</a>
                {else}
                    <a href="logout.php?site={$site}"
                       class="btn btn-danger dropdown-toggle get-started-btn mt-1 mb-1">Logout</a>
                {/if}
                <ul class="dropdown-menu form-wrapper">
            </div>
        {else}
            <li class="nav-item mr-4">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
                <ul class="dropdown-menu form-wrapper">
                    <li>
                        {if isset($getvariable)}
                            <form action="login.php?getvariable={$getvariable}&site={$site}" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" required="required"
                                           name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password"
                                           required="required"
                                           name="pass">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                            </form>
                        {else}
                            <form action="login.php?site={$site}" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" required="required"
                                           name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password"
                                           required="required"
                                           name="pass">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                            </form>
                        {/if}
                    </li>
                </ul>
            </li>
            <li class="nav-item mt-2">
                <a href="#" data-toggle="dropdown"
                   class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1">Sign
                    up</a>
                <ul class="dropdown-menu form-wrapper">
                    <li>
                        {if isset($getvariable)}
                            <form action="create_user.php?site={$site}&getvariable={$getvariable}" method="post">
                                <p class="hint-text">Completa los campos para registrarte!</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Correo" required="required"
                                           name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" required="required"
                                           name="user">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Contraseña"
                                           required="required" name="pass">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                            </form>
                        {else}
                            <form action="create_user.php?site={$site}" method="post">
                                <p class="hint-text">Completa los campos para registrarte!</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Correo" required="required"
                                           name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" required="required"
                                           name="user">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Contraseña"
                                           required="required" name="pass">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                            </form>
                        {/if}
                    </li>
                </ul>
            </li>
        {/if}
    </ul>
</nav>