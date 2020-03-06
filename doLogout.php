<?php
$site = $_GET["site"];
session_start();
session_destroy();
header('location:' . $site . '.php');