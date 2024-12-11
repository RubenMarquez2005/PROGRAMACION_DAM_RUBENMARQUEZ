-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Gimnasio;
USE Gimnasio;

-- Tabla clientes
CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    tipo_membresia VARCHAR(20) NOT NULL
);

-- Tabla entrenadores
CREATE TABLE entrenadores (
    id_entrenador INT PRIMARY KEY AUTO_INCREMENT,
    nombre_entrenador VARCHAR(50) NOT NULL,
    especialidad VARCHAR(50) NOT NULL
);

-- Tabla actividades
CREATE TABLE actividades (
    id_actividad INT PRIMARY KEY AUTO_INCREMENT,
    nombre_actividad VARCHAR(50) NOT NULL,
    horario VARCHAR(50) NOT NULL,
    duracion INT NOT NULL,
    id_entrenador INT,
    FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id_entrenador)
);

-- Tabla inscripciones
CREATE TABLE inscripciones (
    id_inscripcion INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_actividad INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
	FOREIGN KEY (id_actividad) REFERENCES actividades(id_actividad)
);