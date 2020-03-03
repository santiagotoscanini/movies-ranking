<?php
ini_set('display_errors', 1);

require_once "auxiliar_files/db_conn.php";

$config = require_once 'auxiliar_files/config.php';
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
    $cn->query("SELECT peliculas.titulo, peliculas.resumen, peliculas.id, peliculas.puntuacion, generos.nombre FROM peliculas, generos WHERE generos.id = peliculas.id_genero");
    return $cn->fetchAll();
}

function getMovie($id)
{
    $cn = connectDB();
    $cn->query(
        '
            SELECT 
                peliculas.*,
                generos.nombre 
            FROM peliculas, generos WHERE peliculas.id = :id AND generos.id = peliculas.id_genero ',
        array(
            array("id", $id, 'int')
        ));
    return $cn->fetchAssoc();
}

function areValidCredentials($email, $pass)
{
    $cn = connectDB();
    $cn->query(
        'SELECT * FROM usuarios WHERE email=:email AND password=:pass ',
        array(
            array('email', $email, 'string'),
            array('pass', $pass, 'string')
        ));
    if ($cn->rowCount() == 0){
        return null;
    }
    return $cn->fetchAssoc();
}

function getMovieFilteredByGenre($genre)
{
    $cn = connectDB();
    $cn->query(
        'SELECT * FROM movies WHERE id_genero=:genre ',
        array(
            array('genre', $genre, 'int')
        ));
    return $cn->fetchAll();
}


/*function getComments($id)
{
    $cn = connectDB();
    $cn->query(
        'SELECT comentarios.mensaje,comentarios.puntuacion,usuarios.alias '
        . 'FROM comentarios,usuarios '
        . 'WHERE comentarios.id_pelicula = :id AND '
        . 'usuarios.id = comentarios.id AND '
        . 'comentarios.estado = 'APROBADO'',
    array(
        array("id", $id, 'int')
    ));
    return $cn->fetchAll();
}*/