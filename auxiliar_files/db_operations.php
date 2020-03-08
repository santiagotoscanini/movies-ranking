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

function cantOfMoviePages($idCat = 0, $filtro = "")
{
    $filtro = '%' . $filtro . '%';
    $elemCant = 6;

    $cn = connectDB();

    if ($idCat == 0) {
        $cn->query(
            'SELECT count(*) as total FROM peliculas
            WHERE peliculas.titulo LIKE :filtro ', array(
            array("filtro", $filtro, 'string')
        ));
    } else {
        $cn->query(
            'SELECT count(*) as total FROM peliculas
            WHERE pelicula.id_genero = :id AND peliculas.titulo LIKE :filtro ', array(
            array("id", $idCat, 'int'),
            array("filtro", $filtro, 'string')
        ));
    }

    $row = $cn->fetchAssoc();
    $total = $row["total"];
    $pag = ceil($total / $elemCant);
    if ($pag == 0) {
        $pag = 1;
    };
    return $pag;
}

function getMovies($idCat, $pag, $filtro = "")
{
    $elemCant = 6;
    $offset = ($pag - 1) * $elemCant;
    if ($filtro == '' || $filtro == "" || $filtro == " ") {
        $filtro = '%';
    } else {
        $filtro = '%' . $filtro . '%';
    }

    $cn = connectDB();
    if ($idCat == 0) {
        $cn->query(
            'SELECT peliculas.*, generos.nombre 
            FROM peliculas, generos
            WHERE generos.id = peliculas.id_genero AND peliculas.titulo LIKE :filtro 
            ORDER BY peliculas.fecha_lanzamiento DESC 
            LIMIT :offset, :tamano', array(
            array("offset", $offset, 'int'),
            array("tamano", $elemCant, 'int'),
            array("filtro", $filtro, 'string')
        ));
    } else {
        $cn->query(
            'SELECT peliculas.*, generos.nombre 
            FROM peliculas, generos
             WHERE peliculas.id_genero = :id AND generos.id = peliculas.id_genero AND peliculas.titulo LIKE :filtro
            ORDER BY peliculas.fecha_lanzamiento DESC 
            LIMIT :offset, :tamano', array(
            array("id", $idCat, 'int'),
            array("offset", $offset, 'int'),
            array("tamano", $elemCant, 'int'),
            array("filtro", $filtro, 'string')
        ));
    }
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
    if ($cn->rowCount() == 0) {
        return null;
    }
    return $cn->fetchAssoc();
}

function getApprovedComments($movieId, $page)
{
    $elemCant = 5;
    $offset = ($page - 1) * $elemCant;

    $cn = connectDB();
    $cn->query(
        "SELECT comentarios.mensaje, comentarios.puntuacion, usuarios.alias
        FROM comentarios, usuarios
        WHERE comentarios.id_pelicula = :id AND
        usuarios.id = comentarios.id_usuario AND
        comentarios.estado = 'APROBADO'
        LIMIT :offset, :tamano",
        array(array("offset", $offset, 'int'),
            array("tamano", $elemCant, 'int'),
            array("id", $movieId, 'int')
        ));
    return $cn->fetchAll();
}

function getPendingComments()
{
    $cn = connectDB();
    $cn->query("SELECT comentarios.*, peliculas.titulo, usuarios.alias
            FROM peliculas, comentarios, usuarios
            WHERE comentarios.estado = 'PENDIENTE' AND peliculas.id = comentarios.id_pelicula 
                AND usuarios.id = comentarios.id_usuario");
    return $cn->fetchAll();
}

function setCommentToApprovedOrRejected($id, $status)
{

    $cn = connectDB();
    $cn->query('UPDATE comentarios SET estado = :status WHERE id = :id',
        array(
            array("status", $status, "string"),
            array("id", $id, "int")
        )
    );
}

function getCommentFromUserInMovie($movie_id, $logged_user)
{

    if (isset($logged_user)) {
        $cn = connectDB();
        $cn->query("SELECT *
                FROM comentarios
                WHERE comentarios.id_pelicula = :movie_id
                AND comentarios.id_usuario = :user_id",
            array(
                array("movie_id", $movie_id, "int"),
                array("user_id", $logged_user["id"], "int")
            )
        );
        return $cn->fetchAssoc();
    }
}

function existUserWithEmail($email)
{
    $cn = connectDB();
    $cn->query('SELECT * FROM usuarios WHERE email=:email',
        array(
            array("email", $email, "string")
        ));
    $result = $cn->fetchAssoc();
    return isset($result["email"]);
}

function createUser($email, $user, $pass)
{
    $cn = connectDB();
    $cn->query('INSERT INTO usuarios (id, email, alias, password, es_administrador) VALUES (NULL, :mail, :user, :pass, 0)',
        array(
            array("mail", $email, "string"),
            array("user", $user, "string"),
            array("pass", $pass, "string")
        )
    );
}

function createMovie($titulo, $gen, $fecha, $resumen, $director, $trailer, $reparto)
{
    $cn = connectDB();
    $cn->query('INSERT INTO peliculas(titulo, id_genero, fecha_lanzamiento, resumen, director, youtube_trailer, puntuacion) '
        . 'VALUES (:titulo, :gen, :fecha, :resumen, :director, :trailer, :puntuacion)', array(
        array("titulo", $titulo, 'string'),
        array("gen", $gen, 'int'),
        array("fecha", $fecha, 'string'),
        array("resumen", $resumen, 'string'),
        array("director", $director, 'string'),
        array("trailer", $trailer, 'string'),
        array("puntuacion", 0, 'int'),
    ));

    $arr = explode(",", $reparto);
    $id = $cn->lastInsertId();
    foreach ($arr as $nombre) {
        $cn->query("INSERT INTO elencos(id_pelicula, nombre) VALUES (:id, :nombre)", array(
            array("id", $id, "int"),
            array("nombre", $nombre, "string"),
        ));
    }
    return $id;
}

function getCast($movie_id)
{
    $cn = connectDB();
    $cn->query("SELECT * from elencos WHERE elencos.id_pelicula = :movie_id", array(
        array("movie_id", $movie_id, "string")
    ));
    return $cn->fetchAll();
}