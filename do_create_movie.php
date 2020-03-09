<?php
ini_set('display_errors', 1);
require_once "auxiliar_files/db_operations.php";

$movie_name = $_POST["movie_name"];
$genre_id = $_POST["genre_id"];
$date = $_POST["date"];
$description = $_POST["description"];
$date = $_POST["date"];
$director = $_POST["director"];
$cast = $_POST["cast"];
$youtube_trailer = $_POST["youtube_trailer"];
$file = $_FILES["poster"];

$id = createMovie($movie_name, $genre_id, $date, $description, $director, $youtube_trailer, $cast);

$file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$file_name = "movie_posters/{$id}." . $file_ext;

move_uploaded_file($file['tmp_name'], $file_name);

header('location:page_create_movie.php');