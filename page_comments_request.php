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

$page = 1;
if (isset($_GET["pag"])) $page = $_GET["pag"];
$smarty->assign("page", $page);

$smarty->assign("genres", getGenres());
$smarty->assign("pending_comments", getPendingComments($page));
$smarty->assign("site", "page_comments_request");
$smarty->assign("pages", cantOfPendingCommentsPages());


$smarty->display("page_comments_request.html.tpl");