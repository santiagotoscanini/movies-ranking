<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
session_start();

$movie_id = 1;
if (isset($_POST["movie_id"])) $movie_id = $_POST["movie_id"];

$logged_user = null;
if (isset($_SESSION["logged_user"])) $logged_user = $_SESSION["logged_user"];

$points = 0.0;
if (isset($_POST["points"])) $points = $_POST["points"];

$new_comment = "";
if (isset($_POST["comment"])) $new_comment = $_POST["comment"];

setNewComment($new_comment, $logged_user, $movie_id, $points);

header("location:page_movie_information.php?id={$movie_id}");
