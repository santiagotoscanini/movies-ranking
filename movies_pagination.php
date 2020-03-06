<?php
ini_set('display_errors', 1);

require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();

session_start();

$catId = 0;
if (isset($_GET["catId"])) {
    $catId = $_GET["catId"];
}

$page = 1;
if (isset($_GET["pag"])) {
    $page = $_GET["pag"];
}


$busqueda = "";
if(isset($_GET["busqueda"])){
    $busqueda = $_GET["busqueda"];
}

$smarty->assign("page", $page);
$smarty->assign("pages", cantOfMoviePages());
$smarty -> assign("movies", getMovies($catId,$page,$busqueda));
$smarty->display("movies_container.html.tpl");
