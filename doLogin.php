<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_operations.php";

$email = $_POST["email"];
$pass = $_POST["pass"];

$logged_user = areValidCredentials($email, $pass);

if (isset($logged_user)) {
    session_start();
    $_SESSION["logged_user"] = $logged_user;
    header('location:index.php');
} else {
    header('location:index.php?err=1');
}