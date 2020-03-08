<?php
ini_set('display_errors', 1);
require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$user = $_POST["user"];
$pass = $_POST["pass"];

$site = $_GET["site"];
$getvariable = $_GET["getvariable"];

$userAlreadyExist = createUser($user, $pass, $email);

$base_site_name = 'location:' . $site . '.php';
if ($userAlreadyExist) {
    if (isset($getvariable))
        header($base_site_name . '?err=2&id=' . $getvariable);
    else
        header($base_site_name . '?err=2');
} else {
    if (isset($getvariable))
        header($base_site_name . '?id=' . $getvariable);
    else
        header($base_site_name);
}