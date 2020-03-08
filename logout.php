<?php
session_start();
session_destroy();

$site = $_GET["site"];
$getvariable = $_GET["getvariable"];

$base_site_name = 'location:' . $site . '.php?';
$movie_id = 'id=' . $getvariable;

if (isset($getvariable))
    header($base_site_name . $movie_id);
else
    header($base_site_name);