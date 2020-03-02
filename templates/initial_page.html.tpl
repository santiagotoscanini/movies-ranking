<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>MoviesSSTT</title>

    <link rel="stylesheet" type="text/css" href="css/initial_page.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">

    <script type="text/javascript" src="js/initial_page.js"></script>
    <script type="text/javascript" src="lib/jquery/jquery.min"></script>
    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>
</head>

<body style="margin:0 0 0 0" class="body">

{include file="header.html.tpl" genres=$genres}

<div class="cards-container">
    {foreach from=$movies item=movie}
        {include file="card.html.tpl" movie=$movie}
    {/foreach}
</div>

<div class="buttons-container">
    <button type="button" class="btn btn-prymary" id="start-button">
        <<-
    </button>
    <button type="button" class="btn btn-outline-info nav-button" id="back-button">
        <-
    </button>
    <button type="button" class="btn btn-outline-info nav-button" id="next-button">
        ->
    </button>
    <button type="button" class="btn btn-outline-info nav-button" id="end-button">
        ->>
    </button>
</div>

</body>
</html>