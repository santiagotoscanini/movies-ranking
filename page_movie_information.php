<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();
session_start();

$movie_id = 1;
if (isset($_GET["id"])) {
    $movie_id = $_GET["id"];
}
$movie = getMovie($movie_id);

$logged_user = null;
if (isset($_SESSION["logged_user"])) {
    $logged_user = $_SESSION["logged_user"];
}

$err = null;
if (isset($_GET["err"])) {
    $err = $_GET["err"];
}

$smarty->assign("logged_user", $logged_user);
$smarty->assign("err", $err);
$smarty->assign("genres", getGenres());

$userComment = getCommentFromUser($movie_id, $logged_user);

$smarty->assign("site", "page_movie_information");
$smarty->assign("getvariable", $movie_id);
$smarty->assign("movie", $movie);
$smarty->assign("user_comment", $userComment);
$smarty->display("page_movie_information.html.tpl");