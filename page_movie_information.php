<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");
$smarty = getSmarty();
session_start();

$logged_user = null;
if (isset($_SESSION["logged_user"])) $logged_user = $_SESSION["logged_user"];
$smarty->assign("logged_user", $logged_user);

$err = null;
if (isset($_GET["err"])) $err = $_GET["err"];
$smarty->assign("err", $err);

$movie_id = 1;
if (isset($_GET["id"])) $movie_id = $_GET["id"];
$smarty->assign("getvariable", $movie_id);
$movie = getMovie($movie_id);
$smarty->assign("movie", $movie);

$smarty->assign("genres", getGenres());
$smarty->assign("user_comment", getCommentFromUserInMovie($movie_id, $logged_user));
$smarty->assign("site", "page_movie_information");

$cast_array = getCast($movie_id);
$cast_to_string = "";
foreach ($cast_array as $actor) {
    $cast_to_string = $cast_to_string . ", " . $actor["nombre"];
}
if (strlen($cast_to_string) > 0) $cast_to_string = substr($cast_to_string, 2);
$smarty->assign("cast", $cast_to_string);
$smarty->display("page_movie_information.html.tpl");