use club_deportivo;
create table usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255), 
    rol ENUM('admin', 'user') NOT NULL
);

INSERT INTO usuarios (usuario, password, rol) 
VALUES 
('admin', 1234, 'admin');