CREATE SCHEMA fma_bd;

USE fma_bd;

CREATE TABLE personajes (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (20),
    apellido VARCHAR (25),
    alias VARCHAR (35),
    anio_nacimiento INT,
    nacionalidad VARCHAR (15),
    especie VARCHAR (10),
    ocupacion VARCHAR (40),
    seiyu VARCHAR (30)
);

DROP TABLE personajes;

DELETE FROM personajes;

SELECT * FROM personajes;


-- Familia Elric
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Van", "Hohenheim", "Esclavo número 23", 1464, "Xerxes", "Humano", "Alquimista", "Ishizuka Unshou");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Trisha", "Elric", NULL, 1878, "Amestris", "Humano", "Ama de casa", "Takamori Yoshino");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Edward", "Elric", "Alquimista de acero", 1899, "Amestris", "Humano", "Alquimista Estatal", "Park Romi");
     
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Alphonse", "Elric", "Al",  1900, "Amestris", "Humano", "Alquimista", "Kugimiya Rie");


-- Familia Rockbell
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Pinako", "Rockbell", "Abuela Pinako", NULL, "Amestris", "Humano", "Mecánica de automails", "Asou Miyoko");

INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Yuriy", "Rockbell", "Doctor Rockbell", 1873, "Amestris", "Humano", "Cirujano", "Terasoma Masaki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Sarah", "Rockbell", "Doctora Rockbell", 1879, "Amestris", "Humano", "Cirujano", "Amano Yuri");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Winry", "Rockbell", "Fanática de los automails", 1899, "Amestris", "Humano", "Mecánica de automails", "Takamoto Megumi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Den", NULL, NULL, NULL, "Amestris", "Perro", "Mascota", NULL);
    
    
-- Familia Hughes
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Maes", "Hughes", NULL, 1885, "Amestris", "Humano", "Oficial de comunicaciones", "Fujiwara Keiji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Gracia", "Hughes", NULL, NULL, "Amestris", "Humano", "Ama de casa", "Hanba Tomoe");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Elicia", "Hughes", NULL, 1911, "Amestris", "Humano", NULL, "Fukuen Misato");
    
    
-- Familia Bradley
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("King", "Bradley", "Wrath", 1854, "Amestris", "Homúnculo", "Generalísimo", "Shibata Hidekatsu");

INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Mrs.", "Bradley", NULL, NULL, "Amestris", "Humano", "Primera dama", "Sato Ai");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Selim", "Bradley", "Pride el Arrogante", NULL, "Amestris", "Homúnculo", "Segundo al mando de los Homúnculo", "Senpei Yuko");
    
    
-- Familia Armstrong
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Philip Gargantos", "Armstrong", NULL, NULL, "Amestris", "Humano", NULL, "Utsumi Kenji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Mrs.", "Armstrong", NULL, NULL, "Amestris", "Humano", NULL, "Park Romi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Olivier Mira", "Armstrong", "Reina de hielo", NULL, "Amestris", "Humano", "Comandante de Briggs", "Soumi Youko");

INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Alex Louis", "Armstrong", "Alquimista del brazo fuerte", 1881, "Amestris", "Humano", "Alquimista Estatal", "Utsumi Kenji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Catherine Elle", "Armstrong", NULL, NULL, "Amestris", "Humano", NULL, "Kugimiya Rie");
    
    
-- Familia Curtis
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Sigmund", "Curtis", NULL, 1880, "Amestris", "Humano", "Carnicero", "Sasaki Seiji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Izumi", "Curtis", "Ama de casa que pasaba por aqui", 1879, "Amestris", "Humano", "Alquimista", "Tsuda Shoko");
   
   
-- Familia Hawkeye-Grumman
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES (NULL, "Grumman", NULL, NULL, "Amestris", "Humano", "Comandante del cuartel del este", "Naya Rokuro");

INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Berthold", "Hawkeye", "Maestro Hawkeye", 1860, "Amestris", "Humano", "Alquimista", "Tani Atsuki");

INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Riza", "Hawkeye", "La Reina", 1889, "Amestris", "Humano", "Especialista en armas", "Orikasa Fumiko");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Black Hayate", NULL, NULL, NULL, "Amestris", "Perro", "Mascota", NULL);


-- Familia Tucker
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Shou", "Tucker", "Alquimista de fusión de almas", NULL, "Amestris", "Humano", "Alquimista Estatal", "Nagai Makoto");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Nina", "Tucker", NULL, NULL, "Amestris", "Humano", NULL, "Morohoshi Sumire");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Alexander", NULL, NULL, NULL, "Amestris", "Perro", "Mascota", NULL);


-- Alquimistas estatales
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Basque", "Grand", "Alquimista de sangre de hierro", NULL, "Amestris", "Humano", "Alquimista Estatal", "Aomori Shin");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Tim", "Marcoh", "Dr. Mauro", NULL, "Amestris", "Humano", "Doctor", "Omoro Masayuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Roy", "Mustang", "Alquimista de fuego", 1885, "Amestris", "Humano", "Alquimista Estatal", "Miki Shinichiro");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Solf J.", "Kimblee", "Alquimista carmesí", NULL, "Amestris", "Humano", "Alquimista Estatal", "Yoshino Hiroyuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Isaac", "McDougal", "Alquimista de hielo", NULL, "Amestris", "Humano", "Alquimista Estatal", "Yamadera Kouichi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Giolio", "Comanche", "Alquimista de plata", NULL, "Amestris", "Humano", "Alquimista Estatal", "Miyazawa Tadashi");
    

-- Cuartel del este
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Heymans", "Breda", "La Torre", NULL, "Amestris", "Humano", "Especialista en investigación", "Satou Bichii");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Jean", "Havoc", "El Caballo", NULL, "Amestris", "Humano", "Oficial al mando", "Ueda Yûji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Kayn", "Fuery", "El Peón", NULL, "Amestris", "Humano", "Especialista en comunicación", "Kakihara Tetsuya");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Vato", "Falman", "El Alfil", NULL, "Amestris", "Humano", "Especialista en información", "Hamada Kenji");
    

-- Tropas de Briggs
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Miles", NULL, NULL, NULL, "Amestris", "Humano", "General adjunto en Briggs", "Nakai Kazuya");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Buccaneer", NULL, NULL, NULL, "Amestris", "Humano", "Capitán de Briggs", "Otomo Ryuzaburo");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Henschel", NULL, NULL, NULL, "Amestris", "Humano", "Segundo teniente de Briggs", "Yanada Kiyoyuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Karley", NULL, NULL, NULL, "Amestris", "Humano", "Oficial de comunicaciones de Briggs", "Horikawa Jin");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Neil", "Flint", NULL, NULL, "Amestris", "Humano", "Ingeniero de Briggs", "Nara Tooru");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Patricia", NULL, NULL, NULL, "Amestris", "Humano", "Mecánica de automails", "Hayamizu Risa");
    

-- Otros militares
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Doctor diente de oro", NULL, "Doctor alquimista", NULL, "Amestris", "Humano", "Alquimista", "Ishihara Bon");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Dr. Knox", NULL, NULL, NULL, "Amestris", "Humano", "Doctor", "Arimoto Kinryuu");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Denny", "Brosh", NULL, NULL, "Amestris", "Humano", "Sargento", "Hayashi Yuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Maria", "Ross", NULL, NULL, "Amestris", "Humano", "Sargento", "Nazuka Kaori");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Sheska", NULL, "Ratónde biblioteca", NULL, "Amestris", "Humano", "Bibliotecaria", "Fujimura Chika");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Yoki", NULL, NULL, NULL, "Amestris", "Humano", "Soldado", "Yao Kazuki");
    



-- Ishvalíes
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Logue", "Love", "Clérigo supremo", NULL, "Ishval", "Humano", "Líder religioso", NULL);
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Master", NULL, NULL, NULL, "Ishval", "Humano", "Sacerdote guerrero", "Fujimoto Yuzuru");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Scar", NULL, "El hombre de la cicatriz", NULL, "Ishval", "Humano", "Monje guerrero ishvalí", "Miyake Kenta");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Scar's brother", NULL, "Hermano", NULL, "Ishval", "Humano", "Académico ishvalí", "Koyasu Takehito");
    
    
-- Pueblo de Xing
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Fu", NULL, NULL, NULL, "Xing", "Humano", "Guardaespaldas", "Hori Katsunosuke");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Lan", "Fan", NULL, NULL, "Xing", "Humano", "Guardaespaldas", "Nana Mizuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Ling", "Yao", "Principe Ling", NULL, "Xing", "Humano", "Líder del Clan Yao", "Miyano Mamoru");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Mei", "Chang", "Princesa Chang", NULL, "Xing", "Humano", "Princesa", "Goto Mai");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Xiao-Mei", NULL, NULL, NULL, "Xing", "Oso panda", "Mascota", "Kugimiya Rie");
    

-- Pueblo de Xerxes
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Rey de Xerxes", NULL, NULL, NULL, "Xerxes", "Humano", "Rey de Xerxes", "Ishimori Takkô");
    

-- Quimeras
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Bido", NULL, NULL, NULL, "Amestris", "Quimera", "Mensajero y espía de Greed", "Ueda Yûji");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Darius", NULL, "Gori-san", NULL, "Amestris", "Quimera", "Soldado", "Amada Masuo");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Dolcetto", NULL, NULL, NULL, "Amestris", "Quimera", "Guardaespaldas de Greed", "Katsu Anri");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Heinkel", NULL, "Rey león", NULL, "Amestris", "Quimera", "Soldado", "Tsuji Shinpachi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Jerso", NULL, NULL, NULL, "Amestris", "Quimera", NULL, "Shimura Tomoyuki");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Zampano", NULL, NULL, NULL, "Amestris", "Quimera", NULL, "Hikida Takashi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Roa", NULL, NULL, NULL, "Amestris", "Quimera", "Guardaespaldas de Greed", "Inada Tetsu");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Martel", NULL, NULL, NULL, "Amestris", "Quimera", "Guardaespaldas de Greed", "Honda Takako");
    

-- Ouroboros
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Padre", NULL, "El pequeño dentro del frasco", 1484, "Xerxes", "Homúnculo", "Gobernador de Amestris", "Kayumi Iemasa");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Lust", NULL, "La lanza definitiva", NULL, "Amestris", "Homúnculo", "Emisaria de Padre", "Inoue Kikuko");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Greed", NULL, "El escudo definitivo", NULL, "Amestris", "Homúnculo", "Jefe de banda", "Nakamura Yuichi");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Sloth", NULL, "El homúnculo más rápido", NULL, "Amestris", "Homúnculo", "Excavador de los túneles subterráneos", "Tachiki Fumihiko");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Envy", NULL, "Envy el Celoso", NULL, "Amestris", "Homúnculo", "Emisario de Padre", "Takayama Minami");
    
INSERT INTO personajes (nombre, apellido, alias, anio_nacimiento, nacionalidad, especie, ocupacion, seiyu)
	VALUES ("Gluttony", NULL, "Gluttony el Voraz", NULL, "Amestris", "Homúnculo", "Localizador de objetivos", "Shiratori Tetsu");