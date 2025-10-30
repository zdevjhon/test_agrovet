<?php
// FILE: src/Models/TrabajadorModel.php

namespace App\Models;

use App\DB\ConnectionDB;
use PDO;
use Exception;

class TrabajadorModel extends ConnectionDB
{
    // --- MÉTODOS DE VALIDACIÓN PRIVADOS ---

    private static function validarLongitudDocumento($tipo_documento, $numero_documento)
    {
        $len = strlen($numero_documento);
        if (!is_numeric($numero_documento)) {
            return false;
        }

        switch ($tipo_documento) {
            case 'RUC':
                return $len === 11;
            case 'DNI':
                return $len === 8;
            case 'Pasaporte':
                return $len === 12;
            default:
                return false;
        }
    }

    private static function validarEdad($fecha_nacimiento)
    {
        // Debe ser mayor de edad (18 años) al final del año actual (2025)
        $fecha_nacimiento_dt = new \DateTime($fecha_nacimiento);
        // Fecha de corte para ser mayor en 2025: Nacer antes de 2007-01-01
        $fecha_limite = new \DateTime('2007-01-01'); 
        return $fecha_nacimiento_dt <= $fecha_limite;
    }

    /**
     * @throws Exception Si alguna validación falla.
     */
    private static function validateWorkerData($params)
    {
        // Validación de Documento
        if (!self::validarLongitudDocumento($params['tipo_documento'], $params['numero_documento'])) {
            throw new Exception("Error de validación: La longitud del documento no es correcta para el tipo '{$params['tipo_documento']}'.");
        }
        
        // Validación de Edad (Mayoría de edad a 2025)
        if (!self::validarEdad($params['fecha_nacimiento'])) {
            throw new Exception("Error de validación: El trabajador debe ser mayor de edad (18 años) para el año 2025.");
        }
        
        // Validación básica de códigos de ubicación
        if (empty($params['id_departamento']) || empty($params['id_provincia']) || empty($params['id_distrito'])) {
             throw new Exception("Error de validación: Debe seleccionar el Departamento, Provincia y Distrito.");
        }
    }
    
    // --- MÉTODOS CRUD PÚBLICOS ---

    public static function create($params)
    {
        self::validateWorkerData($params); 
        
        $con = self::conexion();
        $sql = "INSERT INTO trabajadores (
            nombre, apellido_paterno, apellido_materno, tipo_documento, 
            numero_documento, sexo, fecha_nacimiento, 
            id_departamento, id_provincia, id_distrito, 
            direccion
        ) VALUES (
            :nombre, :apellido_paterno, :apellido_materno, :tipo_documento, 
            :numero_documento, :sexo, :fecha_nacimiento, 
            :id_departamento, :id_provincia, :id_distrito, 
            :direccion
        )";
        $stmt = $con->prepare($sql);
        
        try {
            $stmt->execute([
                ':nombre' => $params['nombre'], 
                ':apellido_paterno' => $params['apellido_paterno'], 
                ':apellido_materno' => $params['apellido_materno'], 
                ':tipo_documento' => $params['tipo_documento'], 
                ':numero_documento' => $params['numero_documento'], 
                ':sexo' => $params['sexo'], 
                ':fecha_nacimiento' => $params['fecha_nacimiento'], 
                // Códigos de ubicación (VARCHAR)
                ':id_departamento' => $params['id_departamento'], 
                ':id_provincia' => $params['id_provincia'], 
                ':id_distrito' => $params['id_distrito'], 
                
                ':direccion' => $params['direccion']
            ]);
            return $con->lastInsertId();
        } catch (\PDOException $e) {
            // Manejo específico para DUPLICATE ENTRY
            if ($e->getCode() === '23000' || strpos($e->getMessage(), 'Duplicate entry') !== false) {
                throw new Exception("Error: El número de documento '{$params['numero_documento']}' ya se encuentra registrado. Verifique.");
            }
            throw $e;
        }
    }

    public static function read($id_trabajador)
    {
        $con = self::conexion();
        $sql = "SELECT * FROM trabajadores WHERE id_trabajador = :id_trabajador";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_trabajador', $id_trabajador, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function readAll()
    {
        $con = self::conexion();
        $sql = "SELECT 
            t.*
            -- Nota: No se une con tablas geográficas ya que la info está en JSON en el front.
            FROM trabajadores t"; 
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($params)
    {
        self::validateWorkerData($params);
        
        $con = self::conexion();
        $sql = "UPDATE trabajadores SET 
            nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, 
            tipo_documento = :tipo_documento, numero_documento = :numero_documento, sexo = :sexo, 
            fecha_nacimiento = :fecha_nacimiento, 
            -- ACTUALIZACIÓN DE UBICACIÓN
            id_departamento = :id_departamento, id_provincia = :id_provincia, id_distrito = :id_distrito, 
            direccion = :direccion 
            WHERE id_trabajador = :id_trabajador";
        
        $stmt = $con->prepare($sql);
        
        try {
            return $stmt->execute([
                ':nombre' => $params['nombre'], 
                ':apellido_paterno' => $params['apellido_paterno'], 
                ':apellido_materno' => $params['apellido_materno'], 
                ':tipo_documento' => $params['tipo_documento'], 
                ':numero_documento' => $params['numero_documento'], 
                ':sexo' => $params['sexo'], 
                ':fecha_nacimiento' => $params['fecha_nacimiento'], 
                // Códigos de ubicación (VARCHAR)
                ':id_departamento' => $params['id_departamento'], 
                ':id_provincia' => $params['id_provincia'], 
                ':id_distrito' => $params['id_distrito'], 
                
                ':direccion' => $params['direccion'], 
                ':id_trabajador' => $params['id_trabajador']
            ]);
        } catch (\PDOException $e) {
            if ($e->getCode() === '23000' || strpos($e->getMessage(), 'Duplicate entry') !== false) {
                throw new Exception("Error: El número de documento '{$params['numero_documento']}' ya existe. No se puede actualizar.");
            }
            throw $e;
        }
    }

    public static function delete($id_trabajador)
    {
        $con = self::conexion();
        $sql = "DELETE FROM trabajadores WHERE id_trabajador = :id_trabajador";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_trabajador', $id_trabajador, PDO::PARAM_INT);
        return $stmt->execute();
    }
}