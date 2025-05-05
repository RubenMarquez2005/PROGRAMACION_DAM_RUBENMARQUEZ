-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS cine_rubenmarquezperez;
USE cine_rubenmarquezperez;
-- Crear tabla de directores 
CREATE TABLE IF NOT EXISTS directores (
    id_director INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50)
);

-- Creamos la tabla películas (con clave primaria manual tipo VARCHAR)
CREATE TABLE IF NOT EXISTS peliculas (
    id_pelicula VARCHAR(10) PRIMARY KEY, 
    titulo VARCHAR(100),
    duracion INT,
    genero VARCHAR(50),
    anio INT,
    id_director INT,
    FOREIGN KEY (id_director) REFERENCES directores(id_director)
);

-- Insertamos los directores
INSERT INTO directores (nombre, apellido) VALUES
('Steven', 'Spielberg'),
('Christopher', 'Nolan'),
('Quentin', 'Tarantino'),
('Tina', 'Serrano');

-- Insertamos las  películas
INSERT INTO peliculas (id_pelicula, titulo, duracion, genero, anio, id_director) VALUES
('P001', 'Jurassic Park', 127, 'Aventura', 1993, 1),
('P002', 'Inception', 148, 'Ciencia ficción', 2010, 2),
('P003', 'Pulp Fiction', 154, 'Crimen', 1994, 3),
('P004', 'A través de mi ventana', 120, 'Romance', 2022, 4),
('P005', 'A través del mar', 115, 'Romance', 2023, 4),
('P006', 'A través de tu mirada', 118, 'Romance', 2023, 4),
('P007', 'Culpa tuya', 110, 'Romance', 2023, 4),
('P008', 'Culpa mía', 108, 'Romance', 2023, 4);
