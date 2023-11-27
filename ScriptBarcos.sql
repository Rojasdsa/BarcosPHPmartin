/*
https://es.wikipedia.org/wiki/Categor%C3%ADa:Batallas_navales_de_la_Segunda_Guerra_Mundial
https://es.wikipedia.org/wiki/Categor%C3%ADa:Buques_de_guerra_de_la_Segunda_Guerra_Mundial
https://es.wikipedia.org/wiki/Categor%C3%ADa:Buques_de_la_Segunda_Guerra_Mundial_del_Reino_Unido
https://es.wikipedia.org/wiki/Categor%C3%ADa:Acorazados_brit%C3%A1nicos_de_la_Segunda_Guerra_Mundial
*/
#CREAR BASE DE DATOS
CREATE SCHEMA `bbdd_barcos` ;

#BORRAR BASE DE DATOS
DROP DATABASE `bbdd_barcos`;

#CREAR TABLAS
CREATE TABLE BARCOS (
	NOMBRE_BARCO VARCHAR(30),
    CAPITAN VARCHAR(30),
    PRIMARY KEY (NOMBRE_BARCO)
);
CREATE TABLE CLASES (
	CLASE VARCHAR(30),
    TIPO VARCHAR(30),
    PAIS VARCHAR(30),
    NRO_CANIONES INT,
    CALIBRE INT,
    DESPLAZAMIENTO INT,
    PRIMARY KEY (CLASE)
);
CREATE TABLE BARCO_CLASE (
	NOMBRE_BARCO VARCHAR(30),
	CLASE VARCHAR(30),
    LANZADO DATE,
    PRIMARY KEY (NOMBRE_BARCO, CLASE),
    FOREIGN KEY (NOMBRE_BARCO) REFERENCES BARCOS(NOMBRE_BARCO),
    FOREIGN KEY (CLASE) REFERENCES CLASES(CLASE)
);
CREATE TABLE BATALLAS (
	NOMBRE_BATALLA VARCHAR(30),
    FECHA DATE,
    PRIMARY KEY (NOMBRE_BATALLA)
);
CREATE TABLE RESULTADOS (
	NOMBRE_BARCO VARCHAR(30),
	NOMBRE_BATALLA VARCHAR(30),
    RESULTADO VARCHAR(30),
    PRIMARY KEY (NOMBRE_BARCO, NOMBRE_BATALLA),
    FOREIGN KEY (NOMBRE_BARCO) REFERENCES BARCOS(NOMBRE_BARCO),
    FOREIGN KEY (NOMBRE_BATALLA) REFERENCES BATALLAS(NOMBRE_BATALLA)
);
ALTER TABLE CLASES ADD CONSTRAINT Check_Tipo CHECK (TIPO IN ('ACORAZADO', 'CRUCERO'));
ALTER TABLE RESULTADOS ADD CONSTRAINT Check_Estado CHECK (RESULTADO IN ('HUNDIDO', 'AVERIADO', 'OK'));

#INSERCION DE DATOS
INSERT INTO BARCOS VALUES
    ('YAMATO', 'KŌSAKU ARUGA'), #ACORAZADO
    ('LITTORIO', 'ARDITI'), #ACORAZADO 
    ('KONGO', 'NOBUTAKE KONDO'), #CRUCERO
    #2ª GUERRA MUNDIAL
    #ALEMANIA
	('BISMARK', 'OTTO ERNST LINDERMANN'), #ACORAZADO
	('TIRPITZ', 'FRIEDRICH KARL TOPP'), #ACORAZADO
	('ADMIRAL SCHEER', 'WILHELM MARSCHALL'), #CRUCERO
	('ADMIRAL GRAF SPEE', 'CONRAD PATZIG'), #CRUCERO
	('ADMIRAL HIPPER', 'HELLMUTH GUIDO ALEXANDER HEYE'), #CRUCERO
	('BLÜCHER', 'OSKAR KUMMETZ'), #CRUCERO
	('PRINZ EUGEN', 'HELMUTH BRINKMANN'), #CRUCERO
    #EEUU
    ('USS ALABAMA', 'JOHN THORPE'), #ACORAZADO
    ('USS ARIZONA', 'JOHN D. MCDONALD'), #ACORAZADO
    ('USS CALIFORNIA', 'JOEL BUNKLEY'), #ACORAZADO
    #FRANCIA
    ('BRETAGNE', 'LOUIS RENÉ EDMOND LE PIVAIN'), #ACORAZADO 
    ('COURBET', 'CHARLES CHARLIER'), #ACORAZADO
    ('DUNKERQUE', 'JEAN-LOUIS NÉGADELLE'), #ACORAZADO
    #REINO UNIDO
    ('HMS ANSON', 'CECIL HARCOURT'), #ACORAZADO
    ('HMS HOWE', 'CECIL HARCOURT'), #ACORAZADO
    ('HMS BARHAM', 'G. C. COOKE'), #ACORAZADO
    ('HMS REPULSE', 'WILLIAM G. TENNANT'), #CRUCERO
    
    #HELIOGOLAN
    ('HMS NEW ZEALAND', 'LIONEL HALSEY'),		
    ('HMS CRESSY', 'HENRY TUDOR'),		
    ('SMS MAINZ', 'FRIEDRICH TIESMEYER'),	
    ('SMS STRASSBURG', NULL),
    ('SMS COLN', 'LEBERECHT MAASS'),
    
    #GUERRA RUSO JAPONESA
    ('ASAHI', 'HIKOHACHI YAMADA'),
    ('MIKASA', 'HAYASAKI'),
    ('NISSHIN', 'SHOJI NISHIMURA'),
    ('KASUGA', NULL),
    ('NOKIV', 'NIKOLAIO VON ESSEN'),
    ('VARYAG', 'VLADIMI BEHR'),
    
    #MALVINAS
    ('SMS SCHARNHORST', 	NULL),
    ('SMS GNEISENAU', 'FRANZ VON HIPPE'),
    ('SMS DRESDEN', 'FREDERICK STURDEE'),
    
     #BATALLAS JUTLANDIA
    ('HMS QUEEN MARY', 'REGINALD HALL'),
    ('HMS IRON DUKE', NULL),
    ('HMS HERCULES', 'LEWIS CLINTON BAKER'),
    ('SMS LUTZOW', NULL),
    ('SMS ELBING', NULL),
    
    #BATALLA DE LOS COCOS#
    ('HMAS SYDNEY',	'JOSEPH BURNETT'),
    ('HMAS MELBOURNE', 'JOHN PHILIIP STEVENSON'),
    ('HMS MINOTAUR', NULL),
    ('SMS EMDEN', 'KARL VON MULLER'),
    ('IBUKI', 'KANJI KATO')
;
INSERT INTO CLASES VALUES
    ('KURE', 'ACORAZADO', 'JAPON', 201, 18.11, 72800),
    ('LITTORIO', 'ACORAZADO', 'ITALIA', 83, 15, 45963), 
    ('KONGO', 'CRUCERO',  'JAPON', 32, 14.01, 26230),
    #2ª GUERRA MUNDIAL
    #ALEMANIA
	('BISMARK', 'ACORAZADO', 'ALEMANIA', 8, 14.96, 42000),
	('DEUTSCHLAND', 'CRUCERO', 'ALEMANIA', 4, 11.02, 15000),
	('ADMIRAL HIPPER', 'CRUCERO', 'ALEMANIA', 8, 7.99, 14000),
    #EEUU
    ('SOUTH DAKOTA', 'ACORAZADO', 'EEUU', 9, 15.98, 35000),
    ('PENNSYLVANIA', 'ACORAZADO', 'EEUU', 12, 14.02, 31917),
    ('TENESSEE', 'ACORAZADO', 'EEUU', 12, 14.02, 33000),
    #FRANCIA
    ('BRETAGNE', 'ACORAZADO', 'FRANCIA', 10, 13.49, 25000),
    ('COURBET', 'ACORAZADO', 'FRANCIA', 12, 12, 23475),
    ('DUNKERQUE', 'ACORAZADO', 'FRANCIA', 8, 12.99, 36000),
    #REINO UNIDO
    ('KING GEORGE V', 'ACORAZADO', 'REINO UNIDO', 10, 14.01, 36727),
    ('QUEEN ELIZABETH', 'ACORAZADO', 'REINO UNIDO', 8, 15, 36500),
    ('RENOWN', 'CRUCERO', 'REINO UNIDO', 6, 15, 38300),
    
    #HELIOGOLAN
	('INDEFATIGABLE', 'CRUCERO', 'REINO UNIDO', 8, 12, 22080),
	('CRESSY', 'CRUCERO', 'REINO UNIDO', 2, 9.2, 12000),
    ('KOLBERG', 'CRUCERO', 'ALEMANIA', 12, 4.1, 4889),
    ('MAGDEBURG', 'CRUCERO', 'ALEMANIA', 12, 4.1, 4570),
    ('COLOGNE', 'CRUCERO', 'ALEMANIA', 12, 4.1, 4889),
    
     #GUERRA RUSO JAPONESA
    ('ASAHI', 'ACORAZADO', 'JAPON', 4, 12, 15200),
    ('MIKASA', 'ACORAZADO', 'JAPON', 4, 12, 15140),
    ('GIUSEPPE GARIBALDI', 'CRUCERO', 'JAPON', 4, 7.87, 7698),
    ('CRUCERO PROTEGIDO', 'CRUCERO', 'RUSIA', 6, 4.72, 3080),
    
    #MALVINAS
    ('SCHARNHORST', 'ACORAZADO', 'ALEMANIA', 8, 8.26, 12985),
    ('GNEISENAU', 'ACORAZADO', 'ALEMANIA', 8, 8.26, 12985),
    ('EMDEN', 'CRUCERO', 'ALEMANIA', 10, 4.13, 4268),
    
    #BATALLAS JUTLANDIA#
    ('LION-CLASS BATTLECRUISER', 'CRUCERO', 'REINO UNIDO', 8, 13.5, 32160),
	('IRON DUKE', 'ACORAZADO', 'REINO UNIDO', 10, 13.5, 29500),
    ('COLOSSUS', 'ACORAZADO', 'REINO UNIDO', 10, 13.5, 22700),
    ('DERFFLINGER', 'CRUCERO', 'ALEMANIA', 8, 12, 26641),
    ('PILLAU', 'CRUCERO', 'ALEMANIA', 8, 5.90, 5252),
    
    #BATALLA DE LOS COCOS#
    ('CHATHAM', 'CRUCERO', 'AUSTRALIA', 8, 6, 5400),
    ('TOWN CLASS', 'CRUCERO', 'AUSTRALIA', 8, 6, 5400),
    ('MINOTAUR', 'ACORAZADO','REINO UNIDO', 2, 9.2, 14800),
    ('DRESDEN', 'CRUCERO', 'ALEMANIA', 10, 10.5, 4201),
    ('BUKI', 'CRUCERO', 'JAPON', 2, 12, 14636)
;
INSERT INTO BARCO_CLASE VALUES
    ('YAMATO', 'KURE', '1937-11-04'),
    ('LITTORIO', 'LITTORIO', '1934-10-28'),
    ('KONGO', 'KONGO', '1912-05-18'),
    #2ª GUERRA MUNDIAL
    #ALEMANIA
	('BISMARK', 'BISMARK', '1939-02-14'),
	('TIRPITZ', 'BISMARK', '1939-04-01'),
	('ADMIRAL SCHEER', 'DEUTSCHLAND', '1933-04-01'),
	('ADMIRAL GRAF SPEE', 'DEUTSCHLAND', '1934-06-30'),
	('ADMIRAL HIPPER', 'ADMIRAL HIPPER', '1937-02-06'),
	('BLÜCHER', 'ADMIRAL HIPPER', '1937-02-08'),
	('PRINZ EUGEN', 'ADMIRAL HIPPER', '1938-08-22'),
    #EEUU
    ('USS ALABAMA', 'SOUTH DAKOTA', '1942-02-16'),
    ('USS ARIZONA', 'PENNSYLVANIA', '1915-06-19'),
    ('USS CALIFORNIA', 'TENESSEE', '1919-11-20'),
    #FRANCIA
    ('BRETAGNE', 'BRETAGNE', '1913-04-21'),
    ('COURBET', 'COURBET', '1911-09-23'),
    ('DUNKERQUE', 'DUNKERQUE', '1935-10-02'),
    #REINO UNIDO
    ('HMS ANSON', 'KING GEORGE V', '1940-02-24'),
    ('HMS HOWE', 'KING GEORGE V', '1940-04-09'),
    ('HMS BARHAM', 'QUEEN ELIZABETH', '1914-10-31'),
    ('HMS REPULSE', 'RENOWN', '1916-01-08'),
    
    
    #HELIOGOLAN
	('HMS NEW ZEALAND', 'INDEFATIGABLE', '1911-07-11'),
    ('HMS CRESSY', 'CRESSY', '1899-12-04'),
    ('SMS MAINZ', 'KOLBERG', '1909-01-23'),
    ('SMS STRASSBURG', 'MAGDEBURG', '1912-10-01'),
    ('SMS COLN', 'COLOGNE', '1906-06-05'),
    
     #GUERRA RUSO JAPONESA
    ('ASAHI', 'ASAHI', '1899-03-13'),
    ('MIKASA', 'MIKASA', '1900-11-08'),
    ('NISSHIN', 'GIUSEPPE GARIBALDI', '1903-02-09'),
    ('KASUGA', 'GIUSEPPE GARIBALDI', '1902-11-22'),
    ('NOKIV', 'CRUCERO PROTEGIDO', '1900-08-01'),
    ('VARYAG', 'CRUCERO PROTEGIDO',	'1899-11-30'),
    
    #MALVINAS
    ('SMS SCHARNHORST', 'SCHARNHORST', '1906-03-22'),
    ('SMS GNEISENAU', 'GNEISENAU', '1906-06-14'),
    ('SMS DRESDEN', 'EMDEN', '1907-11-05'),
    
    #BATALLAS JUTLANDIA#
    ('HMS QUEEN MARY', 'LION-CLASS BATTLECRUISER', '1912-03-20'),
    ('HMS IRON DUKE', 'IRON DUKE', '1912-10-12'),
    ('HMS HERCULES', 'COLOSSUS', '1910-05-10'),
    ('SMS LUTZOW', 'DERFFLINGER', '1913-11-29'),
    ('SMS ELBING', 'PILLAU', '1914-11-21'),
    
    #BATALLA DE LOS COCOS#
    ('HMAS SYDNEY',	'CHATHAM', '1912-09-29'),
    ('HMAS MELBOURNE', 'TOWN CLASS', '1912-05-30'),
    ('HMS MINOTAUR', 'MINOTAUR', '1906-06-06'),
    ('SMS EMDEN', 'DRESDEN', '1908-05-26'),
    ('IBUKI', 'BUKI', '1907-10-21')
;
INSERT INTO BATALLAS VALUES 
    ('MAR DE FILIPINAS', '1944-06-20'),
    ('GOLFO DE LEYTE', '1944-10-23'),
    ('TARENTO', '1940-11-12'),
    ('SIRTE', '1941-12-17'),
    ('GUERRA DEL PACÍFICO', '1941-12-7'),
    ('SAMAR', '1944-11-25'),
    ('OPERACION RHEINÜBUNG', '1941-05-27'),
    ('OPERACION CATECHISM', '1944-11-12'),
    ('OPERACION WUNDERLAND', '1942-08-16'),
	('RIO DE LA PLATA', '1939-12-13'),
	('MAR DE BARENTS', '1942-12-31'),
	('OPERACION WESERÜBUNG', '1940-04-09'),
	('PEARL HARBOUR', '1941-12-07'),
	('MERS EL-KEBIR', '1940-07-03'),
	('NORMANDIA', '1944-06-06'),
	('OPERACION ICEBERG', '1945-06-15'),
	('CABO MATAPAN', '1941-03-27'),
    ('HELIOGOLAND', '1914-08-28'),
    ('RUSO-JAPONESA', '1904-02-08'),
    ('MALVINAS', '1914-12-08'),
    ('DE LOS COCOS', '1914-11-09'),
    ('JUTLANDIA', '1916-05-31')
;
INSERT INTO RESULTADOS VALUES
    ('YAMATO', 'MAR DE FILIPINAS', 'OK'),
    ('YAMATO', 'GOLFO DE LEYTE', 'OK'),
    ('LITTORIO', 'TARENTO', 'AVERIADO'),
    ('LITTORIO', 'SIRTE', 'OK'),
    ('KONGO', 'GUERRA DEL PACÍFICO', 'OK'),
    ('KONGO', 'SAMAR', 'HUNDIDO'),
    ('BISMARK', 'OPERACION RHEINÜBUNG', 'HUNDIDO'),
    ('TIRPITZ', 'OPERACION CATECHISM', 'HUNDIDO'),
    ('ADMIRAL SCHEER', 'OPERACION WUNDERLAND', 'OK'),
    ('ADMIRAL GRAF SPEE', 'RIO DE LA PLATA', 'AVERIADO'),
    ('ADMIRAL HIPPER', 'MAR DE BARENTS', 'AVERIADO'),
    ('BLÜCHER', 'OPERACION WESERÜBUNG', 'HUNDIDO'),
    ('PRINZ EUGEN', 'OPERACION WUNDERLAND', 'OK'),
    ('USS ALABAMA', 'MAR DE FILIPINAS', 'OK'),
    ('USS ARIZONA', 'PEARL HARBOUR', 'HUNDIDO'),
    ('USS CALIFORNIA', 'PEARL HARBOUR', 'HUNDIDO'),
    ('BRETAGNE', 'MERS EL-KEBIR', 'HUNDIDO'),
    ('COURBET', 'NORMANDIA', 'HUNDIDO'),
    ('DUNKERQUE', 'MERS EL-KEBIR', 'OK'),
    ('HMS ANSON', 'GUERRA DEL PACÍFICO', 'OK'),
    ('HMS HOWE', 'OPERACION ICEBERG', 'OK'),
    ('HMS BARHAM', 'CABO MATAPAN', 'OK'),
    ('HMS REPULSE', 'GUERRA DEL PACÍFICO', 'HUNDIDO'),
    
    
    #BATALLA DE HELIOGOLAND
	('HMS NEW ZEALAND', 'HELIOGOLAND', 'OK'),
    ('HMS CRESSY', 'HELIOGOLAND', 'HUNDIDO'),
    ('SMS MAINZ', 'HELIOGOLAND', 'HUNDIDO'),
    ('SMS STRASSBURG', 'HELIOGOLAND', 'OK'),
    ('SMS COLN', 'HELIOGOLAND', 'HUNDIDO'),
    
    #GUERRA RUSO JAPONESA
    ('ASAHI', 'RUSO-JAPONESA', 'OK'),
    ('MIKASA', 'RUSO-JAPONESA', 'OK'),
    ('NISSHIN', 'RUSO-JAPONESA', 'OK'),
    ('KASUGA', 'RUSO-JAPONESA', 'OK'),
    ('NOKIV', 'RUSO-JAPONESA', 'HUNDIDO'),
    ('VARYAG', 'RUSO-JAPONESA', 'AVERIADO'),
    
    
    #BATALLA DE MALVINAS
	('SMS SCHARNHORST', 'MALVINAS', 'HUNDIDO'),
    ('SMS GNEISENAU', 'MALVINAS', 'HUNDIDO'),
    ('SMS DRESDEN', 'MALVINAS', 'HUNDIDO'),
    ('SMS EMDEN', 'MALVINAS', 'OK'),
    
    #BATALLAS JUTLANDIA
    ('HMS QUEEN MARY', 'JUTLANDIA',	'HUNDIDO'),
    ('HMS IRON DUKE', 'JUTLANDIA',	'AVERIADO'),
    ('HMS HERCULES', 'JUTLANDIA', 'AVERIADO'),
    ('SMS LUTZOW', 'JUTLANDIA', 'HUNDIDO'),
    ('SMS ELBING', 'JUTLANDIA',	'HUNDIDO'),
    
    #BATALLA DE LOS COCOS#
    ('HMAS SYDNEY', 'DE LOS COCOS', 'AVERIADO'),
    ('HMAS MELBOURNE',	'DE LOS COCOS',	'AVERIADO'),
    ('HMS MINOTAUR', 'DE LOS COCOS', 'AVERIADO'),
    ('SMS EMDEN', 'DE LOS COCOS', 'HUNDIDO'),
    ('IBUKI', 'DE LOS COCOS', 'AVERIADO')
;