<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Comments request</title>

    <link rel="stylesheet" href="lib/font-awesome/4.7.0/font-awesome.min">
    <link rel="stylesheet" href="lib/bootstrap/4.4.1/css/bootstrap.min">

    <script type="text/javascript" src="lib/bootstrap/4.4.1/js/bootstrap.min"></script>
    <script type="text/javascript" src="lib/jquery/3.4.1/jquery.min"></script>
    <link rel="stylesheet" href="css/form.css"/>
</head>

<body>
{include file="header.html.tpl" genres=$genres}

<div class="comments">

    <h1 style="margin: 30px;">
        Comments request
    </h1>

    <div class="comments-container">
        {if (isset($pending_comments))}
            {foreach from=$pending_comments item=comment}
                {include file="movie_comment_request.html.tpl" movie=$comment}
            {/foreach}
        {else}
            <div>No pendding comments</div>
        {/if}
    </div>
</div>

</body>