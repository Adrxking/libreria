<?php
namespace App\Config;
use \PDO;
use App\Config\config;

class DB {
    protected $pdo;
    public function __construct() {
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //que PDO lance las excepciones si hay errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //los resultados los regrese en un objeto
        ];
        $dsn = 
        "mysql:host=".config::DB_HOST.
        ";dbname=".config::DB_NAME.
        ";port=".config::DB_PORT.
        ";charset=".config::DB_CHARSET;
        $this->pdo = new PDO($dsn, config::DB_USER, config::DB_PASS, $opciones);
    }

    public function run($sql, $args = []){
        // Ejecutará las consulta $sql con parámetros que le pasemos
        //sql --> select * from articulos where id = ? and precio > ?
        //En args meteremos variables del where de una consulta --> $args = [10, 56.7]
        if (!$args){
            $data = $this->pdo->query($sql);
            return $data;
        }
        //manda argumentos --> preparamos la sentencia
        //hace una sustitución de variables
        $sentencia = $this->pdo->prepare($sql);
        $sentencia->execute($args);
        return $sentencia;
        //con fetchAll generamos todos los datos (array) a un array de objetos --> FETCH_MODE
    }
}
