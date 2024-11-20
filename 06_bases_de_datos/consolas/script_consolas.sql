CREATE SCHEMA consolas_bd;
USE consolas_bd;

CREATE TABLE fabricantes (
	fabricante VARCHAR(45) PRIMARY KEY,
    pais VARCHAR(45)
);

CREATE TABLE consolas (
  id_consola INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL UNIQUE,
  fabricante VARCHAR(45),
  generacion INT NOT NULL,
  unidades_vendidas INT DEFAULT NULL,
  FOREIGN KEY (fabricante) REFERENCES fabricantes(fabricante)
);

INSERT INTO fabricantes VALUES
	('Sony', 'Japón'),
    ('Nintendo', 'Japón'),
    ('Sega', 'Japón'),
    ('Microsoft', 'Estados Unidos'),
    ('Philips', 'Estados Unidos'),
    ('Atari', 'Estados Unidos');
    
INSERT INTO consolas VALUES 
	(1,'Magnavox Odyssey','Philips',1,2000000),
    (2,'Pong','Atari',1,NULL),
    (3,'Atari','Atari',2,30000000),
    (4,'Atari 5200','Atari',2,1000000),
    (5,'Famicom','Nintendo',3,61910000),
    (6,'Nintendo Enternainment System','Nintendo',3,61910000),
    (7,'Mega Drive','Sega',4,30700000),
    (8,'Game Boy','Nintendo',4,NULL),
    (9,'Super Nintendo','Nintendo',4,49100000),
    (10,'Nintendo 64','Nintendo',4,NULL),
    (11,'Playstation','Sony',4,102490000),
    (12,'Sega Saturn','Sony',4,9260000),
    (32,'Atari Jaguar','Atari',5,1250000),
    (13,'Dreamcast','Sega',6,9130000),
    (14,'GameCube','Nintendo',6,21740000),
    (15,'Playstation 2','Sony',6,155000000),
    (16,'Game Boy Advance','Nintendo',6,81510000),
    (17,'Xbox','Microsoft',6,NULL),
    (18,'Xbox 360','Microsoft',7,84000000),
    (19,'Playstation 3','Sony',7,87400000),
    (20,'Nintendo Wii','Nintendo',7,101630000),
    (21,'Nintendo DS','Nintendo',7,154020000),
    (22,'PSP','Sony',7,NULL),
    (23,'Wii U','Nintendo',9,NULL),
    (24,'Playstation 4','Sony',8,117200000),
    (25,'Nintendo 3DS','Nintendo',8,NULL),
    (26,'Playstation Vita','Sony',8,NULL),
    (27,'Xbox One','Microsoft',8,NULL),
    (28,'Playstation 5','Sony',9,30000000),
    (29,'Xbox Series X','Microsoft',9,12000000),
    (30,'Xbox Series S','Microsoft',9,12000000),
    (31,'Nintendo Switch','Nintendo',9,114330000);