<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_operations.php";


$status = 'RECHAZADO';
if (isset($_GET["status"])) {
    $status = $_GET["status"];
}

$id_movie = null;
if (isset($_GET["id_movie"])) {
    $id_movie = $_GET["id_movie"];
}


$id = null;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

setCommentToApprovedOrRejected($id, $status);

if($status == 'APROBADO'){
    $approvedComments = getApprovedCommentsOfMovie($id_movie);
    $cant_of_comments = 0.00;
    $total_points = 0.00;
    foreach ($approvedComments as $m_comment){
        $cant_of_comments = $cant_of_comments + 1.00;
        $total_points = $total_points + $m_comment["puntuacion"];
    }
    $total_points = $total_points / $cant_of_comments;
    setPoints($total_points, $id_movie);
}

header('location:page_comments_request.php');
