CREATE DATABASE IF NOT EXISTS gestion_tareas; -- Crear base de datos si no existe
USE gestion_tareas; -- Seleccionar base de datos

CREATE TABLE IF NOT EXISTS usuarios ( -- Crear tabla usuarios si no existe
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tareas ( -- Crear tabla tareas si no existe
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    descripcion TEXT NOT NULL,
    completada BOOLEAN DEFAULT FALSE,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

ALTER TABLE tareas ADD COLUMN fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP; -- Añadir columna fecha_creacion a la tabla tareas si no existe