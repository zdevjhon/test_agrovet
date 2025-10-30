<?php
// FILE: src/DB/ConnectionDB.php

namespace App\DB;

use App\Config\ResponseHttp;
use Dotenv\Dotenv;
use PDO;

$dotenv = Dotenv::createImmutable(\dirname(__DIR__, 2));
$dotenv->load();

class ConnectionDB {
    private static $username;
    private static $password;
    private static $host;
    private static $port;
    private static $bdname;

    public function __construct() {
        // Cargar las variables de entorno
        self::$username = $_ENV['DB_USERNAME_TEST'] ?? 'root';
        self::$password = $_ENV['DB_PASSWORD_TEST'] ?? '';
        self::$host     = $_ENV['DB_HOST_TEST'] ?? '127.0.0.1';
        self::$port     = $_ENV['DB_PORT_TEST'] ?? '3306';
        self::$bdname   = $_ENV['DB_NAME'] ?? 'agrovet';
    }
    
    final public static function conexion() { 	
        try {
            // Crear instancia de la clase si no se ha hecho aún
            if (!isset(self::$host)) {
                new self(); // Ejecuta el constructor para cargar las variables
            }

            $opt = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
            ];
            
            // Construir la DSN dinámicamente con el puerto desde el .env
            $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$bdname . ";charset=utf8";
            
            return new PDO($dsn, self::$username, self::$password, $opt);
        } catch (\PDOException $p) {
            // Mostrar error de conexión
            print "¡Error de Conexión o BD!: " . $p->getMessage() . "<br/>";
            
            // En producción :
            // error_log('Error de conexión: ' . $p->getMessage());
            // die(json_encode(ResponseHttp::status500()));
        }
    } 	
}

// No es necesario crear una instancia aquí manualmente
// $m = new ConnectionDB();
