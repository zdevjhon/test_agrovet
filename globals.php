<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('FILE_UPLOAD_PATH', '../../src/uploads/');

define('URL_BASE', $_ENV['HOST']);

define('STATUS_OK', 2);
define('STATUS_FAIL', 1);

define('DB_TRUE', 1);
define('DB_FALSE', 0);

// ESTADO DE LOS REGISTROS DE EMPLEOS
define('ST_NUEVO', 1);
define('ST_ACTIVO', 2);
define('ST_INACTIVO', 3);
define('ST_ELIMINADO', -1);

// TIPOS DE USUARIO
define('TP_ADMINISTRADOR', 1);
define('TP_INSTITUCION', 2);

// ESTADO DE LAS POSTULACIONES
define('ST_REVISADO', 2);
define('ST_RECHAZADO', 3);