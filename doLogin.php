<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$pass = $_POST["pass"];
$site = $_GET["site"];
$logged_user = areValidCredentials($email, $pass);

if (isset($logged_user)) {
    session_start();
    $_SESSION["logged_user"] = $logged_user;
    header('location:' . $site . '.php');
} else {
    header('location:' . $site . '.php?err=1');
}