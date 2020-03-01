<?php
ini_set('display_errors', 1);

require_once "db_conn.php";
$config = require_once 'config.php';
define('DB_ADDRESS', $config["DB_ADDRESS"]);
define('DB_NAME', $config["DB_NAME"]);
define('DB_USER', $config["DB_USER"]);
define('DB_PASS', $config["DB_PASS"]);

function connectDB()
{
    $cn = new DatabaseConnection(DB_ADDRESS, DB_NAME, DB_USER, DB_PASS);
    $cn->connect();
    return $cn;
}

function getGenres()
{
    $cn = connectDB();
    $cn->query("SELECT * FROM generos");
    return $cn->fetchAll();
}

function getMovies()
{
    $cn = connectDB();
    $cn->query("SELECT * FROM peliculas");
    return $cn->fetchAll();
}

/*function getMovie($id)
{
    $cn = connectDB();
    $
    $cn->query(
            'SELECT * FROM peliculas '\
. 'WHERE id = :id ', array(
    array("id", $id, 'int')
));
return $cn->fetchAssoc();
}*/

/*function getComments($id)
{
    $cn = connectDB();
    $cn->query(
        'SELECT comentarios.mensaje,comentarios.puntuacion,usuarios.alias '
        . 'FROM comentarios,usuarios '
        . 'WHERE comentarios.id_pelicula = :id AND '
        . 'usuarios.id = comentarios.id AND '
        . 'comentarios.estado = 'APROBADO'', array(
    array("id", $id, 'int')
));
return $cn->fetchAll();
} */