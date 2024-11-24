CREATE SCHEMA tienda_bd;
USE tienda_bd;

DROP TABLE productos;

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

INSERT INTO categorias VALUES ('Manga', 'Se va a borrar');
INSERT INTO categorias VALUES ('NULL', 'De apoyo');

INSERT INTO productos (nombre, precio, categoria, stock, descripcion) VALUES ('desde mysql', 1, 'Manga', 1, 'a1');
INSERT INTO productos (nombre, precio, categoria, stock, descripcion) VALUES ('desde mysql', 2, 'Manga', 2, 'b2');
INSERT INTO productos (nombre, precio, categoria, stock, descripcion) VALUES ('desde mysql', 3, 'Manga', 3, 'c3');