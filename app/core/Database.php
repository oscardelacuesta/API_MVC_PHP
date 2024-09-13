<?php

class Database
{
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $dbname = 'refranes';
            $username = 'refranero';
            $password = 'Ponloquetuquieras';

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]);
            } catch (PDOException $e) {
                die(json_encode(['mensaje' => 'Error al conectar a la base de datos']));
            }
        }
        return self::$instance;
    }
}
