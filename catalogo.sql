
CREATE DATABASE catalogo;

USE catalogo;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(65) NOT NULL,
    descripcion VARCHAR(100),
    precio DECIMAL(10,2),
    estado VARCHAR(10)
);

CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_img VARCHAR(65) NOT NULL,
    ruta VARCHAR(100) NOT NULL,
    id_producto INT NOT NULL
);
