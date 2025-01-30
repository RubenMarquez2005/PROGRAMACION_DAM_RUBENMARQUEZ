CREATE DATABASE IF NOT EXISTS streamweb;

USE streamweb;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    edad INT NOT NULL CHECK (edad > 0),
    plan_base set('Basico', 'Estandar', 'Premium') NOT NULL,
    paquete_adicional set('Deporte', 'Cine', 'Infantil'),
    duracion set('mensual', 'anual') NOT NULL
);

-- Tabla de planes
CREATE TABLE planes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('Basico', 'Estandar', 'Premium') NOT NULL,
    precio DECIMAL(5, 2) NOT NULL,
    precio_anual DECIMAL(5, 2) NOT NULL
);

-- Tabla de paquetes
CREATE TABLE paquetes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('Deporte', 'Cine', 'Infantil') NOT NULL,
    precio DECIMAL(5, 2) NOT NULL,
    precio_anual DECIMAL(5, 2) NOT NULL
);

-- Insertar datos en planes
INSERT INTO planes (nombre, precio, precio_anual) VALUES
('Básico', 9.99, 119.88),
('Estándar', 13.99, 167.88),
('Premium', 17.99, 215.88);

-- Insertar datos en paquetes
INSERT INTO paquetes (nombre, precio, precio_anual) VALUES
('Deporte', 6.99, 83.88),
('Cine', 7.99, 95.88),
('Infantil', 4.99, 59.88);

use streamweb;

INSERT INTO usuarios (nombre, correo, edad, plan_base, paquete_adicional, duracion) 
                  VALUES ('sdgsgfgdf', 'mariofberasdnardfssdgfdgddino', 24, 'Premium', 'Cine,Infantil', 'Mensual');
                  
UPDATE usuarios SET nombre = 'sdgsgfgdf', correo = 'mariofberasdnardfssdgfdgddino@gmail.com', edad = 24, plan_base = 'Premium', paquete_adicional = 'Cine, Infantil,Deporte', duracion = 'Anual' WHERE id = 1;