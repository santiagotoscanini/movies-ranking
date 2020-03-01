<?php

class DatabaseConnection
{
    var $dsn;
    var $user;
    var $password;
    var $connection;
    var $statment;
    var $lastError;
    var $debugMode;

    function __construct($address, $db, $user, $password, $debug = false)
    {
        $this->dsn = "mysql:dbname=" . $db . ";host=" . $address;
        $this->user = $user;
        $this->password = $password;
        $this->debugMode = $debug;
    }

    function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
            if ($this->debugMode) {
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } else {
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            $return = true;
        } catch (PDOException $e) {
            $this->connection = null;
            $this->lastError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
            $return = false;
        }
        return $return;
    }

    function disconnect()
    {
        unset($this->connection);
    }

    function lastError()
    {
        return $this->lastError;
    }

    function query($sql, $params = array())
    {
        try {
            $this->statment = $this->connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            if (is_array($params)) {
                foreach ($params as $param) {
                    switch ($param[2]) {
                        case "bool":
                            $tipo = PDO::PARAM_BOOL;
                            break;
                        case "int":
                            $tipo = PDO::PARAM_INT;
                            break;
                        case "string":
                            $tipo = PDO::PARAM_STR;
                            break;
                    }
                }
                $this->statment->bindParam($param[0], $param[1], $tipo);
            }
            $this->statment->execute();
            $return = true;
        } catch (PDOException $e) {
            $this->statment = null;
            $this->lastError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
            $return = false;
        }
        return $return;
    }

    function lastInsertId()
    {
        try {
            $return = $this->connection->lastInsertId();
        } catch (PDOException $e) {
            $this->lastError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
            $return = false;
        }
        return $return;
    }

    function fetchAssoc()
    {
        try {
            $return = $this->statment->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->lastError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
            $return = false;
        }
        return $return;
    }

    function fetchAll()
    {
        try {
            $return = $this->statment->fetchAll();
        } catch (PDOException $e) {
            $this->lastError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
            $return = false;
        }
        return $return;
    }

    function columnCount()
    {
        return $this->statment->columnCount();
    }

    function rowCount()
    {
        return $this->statment->rowCount();
    }
}