<?php
$site = $_GET["site"];
$getvariable = $_GET["getvariable"];
session_start();
session_destroy();
if(isset($getvariable))
    header('location:' . $site . '.php?id='.$getvariable);
else
    header('location:' . $site . '.php');