<?php
ini_set('display_errors', 1);

require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");

$smarty = getSmarty();

$pending_comments = getPendingComments();

$smarty -> assign("pending_comments", $pending_comments);
$smarty -> assign("genres", getGenres());
$smarty->display("page_comments_request.html.tpl");