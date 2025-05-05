-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS cine_rubenmarquezperez;
USE cine_rubenmarquezperez;

-- Creo tabla directores
CREATE TABLE IF NOT EXISTS directores (
    id_director INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50)
);

-- Creo la tabla películas
CREATE TABLE IF NOT EXISTS peliculas (
    id_pelicula INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    duracion INT,
    genero VARCHAR(50),
    anio INT,
    id_director INT,
    FOREIGN KEY (id_director) REFERENCES directores(id_director)
);

-- Inserto unos directores
INSERT INTO directores (nombre, apellido) VALUES ('Steven', 'Spielberg');
INSERT INTO directores (nombre, apellido) VALUES ('Christopher', 'Nolan');
INSERT INTO directores (nombre, apellido) VALUES ('Quentin', 'Tarantino');
INSERT INTO directores (nombre, apellido) VALUES ('Tina', 'Serrano');  -- Nuevo director para las nuevas películas

-- Inserto algunas peliculas
INSERT INTO peliculas (titulo, duracion, genero, anio, id_director) 
VALUES 
('Jurassic Park', 127, 'Aventura', 1993, 1),
('Inception', 148, 'Ciencia ficción', 2010, 2),
('Pulp Fiction', 154, 'Crimen', 1994, 3),
('A través de mi ventana', 120, 'Romance', 2022, 4),
('A través del mar', 115, 'Romance', 2023, 4),
('A través de tu mirada', 118, 'Romance', 2023, 4),
('Culpa tuya', 110, 'Romance', 2023, 4),
('Culpa mía', 108, 'Romance', 2023, 4);