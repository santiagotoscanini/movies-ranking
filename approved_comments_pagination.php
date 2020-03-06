<?php
ini_set('display_errors', 1);

require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();

session_start();

$movieId = 1;
if (isset($_GET["movieId"])) {
    $movieId = $_GET["movieId"];
}

$page = 1;
if (isset($_GET["pag"])) {
    $page = $_GET["pag"];
}

$smarty->assign("page", $page);
$smarty->assign("pages", cantOfMoviePages());
$smarty -> assign("approvedComments", getApprovedComments($movieId,$page));
$smarty->display("movie_comments_approved_container.html.tpl");

