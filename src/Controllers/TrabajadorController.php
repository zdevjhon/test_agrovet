<?php
// FILE: src/Controllers/TrabajadorController.php

require '../../vendor/autoload.php';
require_once '../../globals.php';

use App\Config\ResponseHttp;
use App\Models\TrabajadorModel;

header("Content-Type: application/json");

// Intenta leer el cuerpo JSON del request
$data = json_decode(file_get_contents('php://input'), true) ?? [];

switch ($_GET["action"]) {
    case 'create':
        try {
            // Se pasa el array $data, que incluye los ids de ubicación como strings
            $id = TrabajadorModel::create($data);
            ResponseHttp::json(['success' => true, 'message' => 'Trabajador registrado con éxito', 'id_trabajador' => $id]);
        } catch (\Exception $e) {
            // Error de Validación/Negocio (400 Bad Request)
            ResponseHttp::json(['success' => false, 'message' => $e->getMessage()], 400); 
        } catch (\PDOException $e) {
            // Error de BD/Servidor (500 Internal Server Error)
            ResponseHttp::json(['success' => false, 'message' => 'Error de BD: ' . $e->getMessage()], 500);
        }
        break;

    case 'read':
        $id = $data['id_trabajador'] ?? null;
        if (!$id) {
             ResponseHttp::json(['success' => false, 'message' => 'ID de trabajador requerido'], 400);
             break;
        }

        try {
            $trabajador = TrabajadorModel::read($id);
            if ($trabajador) {
                // Devuelve los datos incluyendo los códigos (id_departamento, id_provincia, id_distrito)
                ResponseHttp::json($trabajador); 
            } else {
                ResponseHttp::json(['success' => false, 'message' => 'Trabajador no encontrado'], 404);
            }
        } catch (\PDOException $e) {
            ResponseHttp::json(['success' => false, 'message' => 'Error de servidor: ' . $e->getMessage()], 500);
        }
        break;

    case 'read_all':
        try {
            // Devuelve todos los trabajadores (incluyendo los códigos de ubicación)
            $trabajadores = TrabajadorModel::readAll();
            ResponseHttp::json($trabajadores);
        } catch (\PDOException $e) {
            ResponseHttp::json(['success' => false, 'message' => 'Error de servidor: ' . $e->getMessage()], 500);
        }
        break;

    case 'update':
        try {
            // Se pasa el array $data, que incluye los ids de ubicación como strings
            TrabajadorModel::update($data);
            ResponseHttp::json(['success' => true, 'message' => 'Trabajador actualizado con éxito']);
        } catch (\Exception $e) {
            // Error de Validación/Negocio (400 Bad Request)
            ResponseHttp::json(['success' => false, 'message' => $e->getMessage()], 400); 
        } catch (\PDOException $e) {
            ResponseHttp::json(['success' => false, 'message' => 'Error de BD: ' . $e->getMessage()], 500);
        }
        break;
    
    case 'delete':
        $id = $data['id_trabajador'] ?? null;
         if (!$id) {
             ResponseHttp::json(['success' => false, 'message' => 'ID de trabajador requerido'], 400);
             break;
        }

        try {
            TrabajadorModel::delete($id);
            ResponseHttp::json(['success' => true, 'message' => 'Trabajador eliminado con éxito']);
        } catch (\PDOException $e) {
            ResponseHttp::json(['success' => false, 'message' => 'Error de servidor: ' . $e->getMessage()], 500);
        }
        break;
    
    default:
        ResponseHttp::json(['success' => false, 'message' => 'Acción no válida'], 404);
        break;
}