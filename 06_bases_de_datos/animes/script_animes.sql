CREATE SCHEMA animes_bd;
USE animes_bd;

CREATE TABLE estudios (
	nombre_estudio VARCHAR(30) PRIMARY KEY,
    ciudad VARCHAR(40),
    anno_fundacion NUMERIC(4,0)
);

CREATE TABLE animes (
	id_anime INT PRIMARY KEY AUTO_INCREMENT, -- Se va a ir poniendo automaticamente
    titulo VARCHAR(80) UNIQUE,
    nombre_estudio VARCHAR(30),
    anno_estreno NUMERIC(4,0),
    num_temporadas NUMERIC(2,0),
    FOREIGN KEY (nombre_estudio) REFERENCES estudios(nombre_estudio)
);

SELECT * FROM animes_bd.animes;

ALTER TABLE animes
	ADD COLUMN imagen VARCHAR(80);

INSERT INTO estudios VALUES ('Kyoto Animation', 'Kioto', 1981);
INSERT INTO estudios VALUES ('Diomedéa', 'Tokio', 2005);
INSERT INTO estudios VALUES ('Studio Deen', 'Nanto', 1975);
INSERT INTO estudios VALUES ('Mappa', 'Tokio', 2011);
INSERT INTO estudios VALUES ('Studio Ghibli', 'Tokio', 1985);
INSERT INTO estudios VALUES ('A-1 Pictures', 'Tokio', 2005);
INSERT INTO estudios VALUES ('CloverWorks', 'Tokio', 2018);
INSERT INTO estudios VALUES ('Toei Animation', 'Tokio', 1948);
INSERT INTO estudios VALUES ('Trigger', 'Tokio', 2011);
INSERT INTO estudios VALUES ('Madhouse', 'Tokio', 1972);
INSERT INTO estudios VALUES ('Bones', 'Tokio', 1998);
INSERT INTO estudios VALUES ('TOHO Animation', 'Tokio', 2012);
INSERT INTO estudios VALUES ('Wit Studio', 'Tokio', 2012);
INSERT INTO estudios VALUES ('OLM', 'Tokio', 1990);

INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Hibike! Euphonium', 'Kyoto Animation', 2015, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Frieren', 'Madhouse', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Violet Evergarden', 'Kyoto Animation', 2018, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Sword Art Online', 'A-1 Pictures', 2012, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Kaguya-sama: Love is War', 'A-1 Pictures', 2019, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('86 Eighty Six', 'A-1 Pictures', 2021, 3);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Bocchi the Rock!', 'CloverWorks', 2022, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Tragones y Mazmorras', 'Trigger', 2024, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Little Witch Academia', 'Trigger', 2017, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('The Magical Revolution of the Reincarnated Princess and the Genius Young Lady', 'Diomedéa', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Shinsekai Yori', 'A-1 Pictures', 2012, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Fullmetal Alquemist', 'Bones', 2009, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Los diarios de la boticaria', 'TOHO Animation', 2023, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Ataque a los titanes', 'Wit Studio', 2013, 4);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('One Piece', 'Toei Animation', 1999, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Hunter x Hunter', 'Madhouse', 2011, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Death Note', 'Madhouse', 2006, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Nana', 'Madhouse', 2006, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Spy x Family', 'CloverWorks', 2022, 2);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('A Place Further than the Universe', 'Madhouse', 2018, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Summertime Render', 'OLM', 2022, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Nichijou', 'Kyoto Animation', 2011, 1);
INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
	VALUES ('Girls Band Cry', 'Toei Animation', 2024, 1);
    
USE animes_db; /* Para usar la base de datos */
SELECT * FROM animes;

SELECT titulo, nombre_estudio FROM animes ORDER BY titulo DESC; /* Ordenar por titulo */

SELECT * FROM animes WHERE titulo = "Frieren";

SELECT * FROM animes WHERE titulo LIKE "F%"; /* Incluye tanto mayusculas como minusculas. */
SELECT * FROM animes WHERE titulo LIKE "%F"; -- que acabe en f
SELECT * FROM animes WHERE titulo LIKE "%a%"; -- Que contenga una a en cualquier posicion
SELECT * FROM animes WHERE titulo LIKE "%frieren%"; -- para hacer un buscador, habra que usar el like, porque a lo mejor el usuario no sabe el nombre completo
-- para un login, si tendria que ser exacto

SELECT * FROM animes;
SELECT * FROM estudios;

-- Nombre anime, estudio, ciudad
SELECT a.titulo, e.nombre_estudio, e.ciudad
	FROM animes a JOIN estudios e -- 'a' y 'e' son alias
		ON e.nombre_estudio = a.nombre_estudio
	WHERE titulo LIKE "F%"
    ORDER BY titulo;

INSERT INTO estudios VALUES ("Pierrot", "Tokio", 1979);
INSERT INTO animes VALUES (26, "Black Clover", "Pierrot", 2017, 1);

SELECT * FROM animes;

UPDATE animes SET num_temporadas = 2 WHERE titulo = "Black Clover";

SELECT * FROM animes WHERE titulo = "Black Clover";

DELETE FROM animes WHERE titulo = "Black Clover";

SELECT * FROM animes WHERE id_anime = 15;

SET AUTOCOMMIT = 0; -- Commit: crea un "punto de guardado"
INSERT INTO estudios VALUES ("Ufotable", "Tokio", 2000);
INSERT INTO animes VALUES (26, "Kimetsu no Yaiba", "Ufotable", 2019, 5); -- Se puede poner el id, pero como esta en auto_increment no haría falta
ROLLBACK; -- Rollback: Borra todo hasta el ultimo "punto de guardado"
SELECT * FROM animes;
SET sql_safe_updates = 0; -- Para poder hacer un delete from de todo
ROLLBACK;
DELETE FROM animes;
-- Transaccion atomica: todas las instrucciones se ejecutan como si fuera una sola. O se ejecuta todo o nada.