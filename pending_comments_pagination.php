<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");
$smarty = getSmarty();
session_start();

$page = 1;
if (isset($_GET["pag"])) $page = $_GET["pag"];
$smarty->assign("page", $page);

$smarty->assign("pending_comments", getPendingComments($page));
$smarty->assign("pages", cantOfPendingCommentsPages());

$smarty->display("movie_pending_comments_container.html.tpl");
