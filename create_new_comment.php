<?php
ini_set('display_errors', 1);
require_once("auxiliar_files/db_operations.php");
require_once("auxiliar_files/smarty.php");
$smarty = getSmarty();
session_start();

$movie_id = 1;
if (isset($_POST["movie_id"])) $movie_id = $_POST["movie_id"];
print_r("MID: " . $movie_id);
$logged_user = null;
if (isset($_SESSION["logged_user"])) $logged_user = $_SESSION["logged_user"];

$points = 0.0;
if (isset($_POST["points"])) $points = $_POST["points"];

$new_comment = "";
if (isset($_POST["comment"])) $new_comment = $_POST["comment"];

$canComment = setNewComment($new_comment, $logged_user, $movie_id, $points);
//$smarty->assign("err", );
$smarty->display("movie_new_comment.html.tpl");
header("movie_new_comment.html.tpl");
