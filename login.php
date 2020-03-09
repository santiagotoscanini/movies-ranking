<?php
ini_set('display_errors', 1);
require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$pass = $_POST["pass"];
$logged_user = areValidCredentials($email, $pass);

$site = $_GET["site"];
$getvariable = $_GET["getvariable"];

$base_site_name = 'location:' . $site . '.php?';
$movie_id = 'id=' . $getvariable;
$error_id = "err=1";

$site_name = $base_site_name;
if (isset($getvariable)) $base_site_name = $base_site_name . $movie_id . '&';

if (isset($logged_user)) {
    session_start();
    $_SESSION["logged_user"] = $logged_user;
    header($base_site_name);
} else
    header($base_site_name . $error_id);