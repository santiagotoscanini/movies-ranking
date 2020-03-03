<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();
$smarty->assign("genres", getGenres());
$smarty->display("page_create_movie.html.tpl");