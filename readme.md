# 💼 Proyecto: Gestión de Trabajadores - AgroVet

Sistema simple de gestión de trabajadores con CRUD (Crear, Leer, Actualizar, Eliminar) implementado en PHP, PDO, JavaScript, DataTables y Bootstrap 5.

## ✨ Características Principales

-   **CRUD Completo:** Gestión de la tabla `trabajadores`.
-   **Validación de Negocio:**
    -   Mayoría de edad (18 años) al 2025.
    -   Validación de longitud de documento (DNI 8, RUC 11).
-   **Ubicación Geográfica:** Carga dinámica de Departamento, Provincia y Distrito de Perú usando archivos **JSON estáticos** (sin consultas a BD para las listas).
-   **Base de Datos:** Almacena códigos de ubicación (`id_departamento`, `id_provincia`, `id_distrito`) como `VARCHAR`.

---

## ⚙️ Requisitos del Sistema

-   **Servidor Web:** Apache / Nginx.
-   **PHP:** Versión 7.4 o superior (con extensión `pdo_mysql` habilitada).
-   **Composer:** Para la gestión de dependencias (principalmente `Dotenv`).
-   **Base de Datos:** MySQL o MariaDB.

---

## 🛠️ Instalación y Configuración

Sigue estos pasos para desplegar el proyecto en un entorno local (XAMPP/WAMP/MAMP) o de producción.

### 1. Clonar el Repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd nombre-del-proyecto
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configuración del Entorno (.env)

configuracion del host y base de datos

# Configuración del servidor de base de datos  
considera cambiar el port (DB_PORT_TEST) --  default 3306

DB_HOST_TEST=localhost
DB_PORT_TEST=3306
DB_USERNAME_TEST=root
DB_PASSWORD_TEST=
DB_NAME=db_agrovet

# Otras configuraciones globales
HOST=http://localhost/test_agrovet/
