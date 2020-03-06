<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$movie_id = 1;
$smarty = getSmarty();

if (isset($_GET["id"])) {
    $movie_id = $_GET["id"];
}

session_start();
$logged_user = null;
if (isset($_SESSION["logged_user"])){
    $logged_user = $_SESSION["logged_user"];
}
$smarty -> assign("logged_user", $logged_user);
$err = null;
if (isset($_GET["err"])) {
    $err = $_GET["err"];
}
$smarty -> assign("err", $err);

$smarty->assign("genres", getGenres());
$movie = getMovie($movie_id);
$smarty->assign("movie", $movie);
$smarty -> assign("site", "page_movie_information");
$smarty->display("page_movie_information.html.tpl");