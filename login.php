<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$pass = $_POST["pass"];
$site = $_GET["site"];
$getvariable = $_GET["getvariable"];

$logged_user = areValidCredentials($email, $pass);

if (isset($logged_user)) {
    session_start();
    $_SESSION["logged_user"] = $logged_user;

    if (isset($getvariable))
        header('location:' . $site . '.php?id=' . $getvariable);
    else
        header('location:' . $site . '.php');
} else {
    if (isset($getvariable))
        header('location:' . $site . '.php?err=1&id=' . $getvariable);
    else
        header('location:' . $site . '.php?err=1');
}