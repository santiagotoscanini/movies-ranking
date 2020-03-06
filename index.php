<?php
ini_set('display_errors', 1);

require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();

session_start();

$logged_user = null;
if (isset($_SESSION["logged_user"])) {
    $logged_user = $_SESSION["logged_user"];
}
$err = null;
if (isset($_GET["err"])) {
    $err = $_GET["err"];
}
$smarty->assign("err", $err);
$smarty->assign("logged_user", $logged_user);
$smarty->assign("genres", getGenres());
$smarty->assign("site", "index");
$smarty->assign("initial_page", true);
$smarty->display("page_initial.html.tpl");
