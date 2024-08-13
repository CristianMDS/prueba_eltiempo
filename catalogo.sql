
CREATE DATABASE catalogo;

USE catalogo;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(65) NOT NULL,
    descripcion VARCHAR(100),
    precio DECIMAL(10,2),
    estado VARCHAR(10)
);
