<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_operations.php";


$status = 'RECHAZADO';
if(isset($_GET["status"])){
    $status = $_GET["status"];
}

$id = null;
if(isset($_GET["id"])){
    $id = $_GET["id"];
}


setCommentToApprovedOrRejected($id, $status);

header('location:page_comments_request.php');
