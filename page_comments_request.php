<?php
ini_set('display_errors', 1);

require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();

$logged_user = null;
if (isset($_SESSION["logged_user"])) {
    $logged_user = $_SESSION["logged_user"];
}

$err = null;
if (isset($_GET["err"])) {
    $err = $_GET["err"];
}

$smarty->assign("logged_user", $logged_user);
$smarty->assign("err", $err);
$smarty->assign("genres", getGenres());


$pending_comments = getPendingComments();

$smarty -> assign("pending_comments", $pending_comments);
$smarty -> assign("genres", getGenres());
$smarty->display("page_comments_request.html.tpl");