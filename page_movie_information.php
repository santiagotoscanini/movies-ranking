<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$movie_id = 1;

if (isset($_GET["id"])) {
    $movie_id = $_GET["id"];
}

$smarty = getSmarty();
$smarty->assign("genres", getGenres());
$smarty->assign("movie", getMovie($movie_id));
$smarty->display("page_movie_information.html.tpl");