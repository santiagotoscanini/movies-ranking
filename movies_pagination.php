<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");
$smarty = getSmarty();

$page = 1;
if (isset($_GET["pag"])) $page = $_GET["pag"];
$smarty->assign("page", $page);

$catId = 0;
if (isset($_GET["catId"])) $catId = $_GET["catId"];
$search = "";
if (isset($_GET["search"])) $search = $_GET["search"];
$smarty->assign("movies", getMovies($catId, $page, $search));

$smarty->assign("pages", cantOfMoviePages($catId, $search));

$smarty->display("movies_container.html.tpl");