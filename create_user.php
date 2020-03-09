<?php
ini_set('display_errors', 1);
require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$user = $_POST["user"];
$pass = $_POST["pass"];

$site = $_GET["site"];
$getvariable = $_GET["getvariable"];

$base_site_name = 'location:' . $site . '.php?';
$movie_id = 'id=' . $getvariable;
$error_id = "err=2";
$site_name = $base_site_name;
if (isset($getvariable)) $base_site_name = $base_site_name . $movie_id . '&';


$userAlreadyExist = existUserWithEmail($email);

if(strlen($pass) < 6){
    $error_id = "err=3";
    header($base_site_name . $error_id);
}
else if ($userAlreadyExist) {
    header($base_site_name . $error_id);
} else {
    createUser($email, $user, $pass);
    header($base_site_name . "err=4");
}