<?php
ini_set('display_errors', 1);
require_once("db_operations.php");
require_once("smarty.php");

$smarty = getSmarty();
$smarty -> assign("movies", getMovies());
$smarty -> assign("genres", getGenres());
$smarty->display("initial_page.html.tpl");