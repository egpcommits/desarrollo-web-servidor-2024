CREATE SCHEMA tienda_bd;
USE tienda_bd;

DELETE FROM usuarios WHERE usuario = "estela";

CREATE TABLE usuarios (
	usuario VARCHAR(15) PRIMARY KEY,
    contrasena VARCHAR(255) NULL
);

CREATE TABLE categorias (
	nombre VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE productos (
	id_producto INT(6) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio NUMERIC(6,2),
    categoria VARCHAR(30),
    stock INT(3) DEFAULT 0,
    imagen VARCHAR(60),
    descripcion VARCHAR(255),
    CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria) REFERENCES categorias(nombre) ON DELETE CASCADE ON UPDATE CASCADE
);

SET sql_safe_updates = 0;