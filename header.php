<?php
require_once("db_operations.php");
require_once("smarty.php");

$smarty = getSmarty();
$smarty->assign("genres", getGenres());
$smarty->display("header.html.tpl");