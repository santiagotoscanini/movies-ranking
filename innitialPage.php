<!DOCTYPE html>
<?php
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/ppage-style.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bar-style.css">
    <script type="text/javascript">
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".navbar-right .dropdown-menu", function(e) {
            e.stopPropagation();
        });
    </script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="margin:0 0 0 0" class="body">

    <script language="JavaScript">
        //Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
        function autofitIframe(id) {
            if (!window.opera && document.all && document.getElementById) {
                id.style.height = id.contentWindow.document.body.scrollHeight;
            } else if (document.getElementById) {
                id.style.height = id.contentDocument.body.scrollHeight + "px";
            }
        }
    </script>
    <!--     
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">
        <div class="navbar-header d-flex col">
            <a class="navbar-brand" href="#">Movies<b>SSTT</b></a>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Generos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item">Terror</a></li>
                        <li><a href="#" class="dropdown-item">Comedia</a></li>
                    </ul>
                </li>
                <li class="nav-item active"><a href="#" class="nav-link">Comentarios</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Nueva pelicula</a></li>
            </ul>
            <form class="navbar-form form-inline">
                <div class="input-group search-box">
                    <input type="text" id="search" class="form-control" placeholder="Search here...">
                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right ml-auto">
                <li class="nav-item">
                    <a data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1" href="#">Login</a>
                    <ul class="dropdown-menu form-wrapper">
                        <li>
                            <form action="/examples/actions/confirmation.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" required="required">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav> -->

    <iframe id="header-frame" src="header.html" frameborder="0" width="100%" height="0" onload="autofitIframe(this);"></iframe>
    <div class="cards-container">
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
        <iframe class="cards-frame" src="cards.php" frameborder="0"></iframe>
    </div>

    <div class="buttons-container">
        <button type="button" class="btn btn-prymary" id="start-button">
            <<-</button> <button type="button" class="btn btn-outline-info nav-button" id="back-button">
                <-</button> <button type="button" class="btn btn-outline-info nav-button" id="next-button">->
        </button>
        <button type="button" class="btn btn-outline-info nav-button" id="end-button">->></button>
    </div>

</body>

</html>