DROP DATABASE IF exists projecte;
CREATE DATABASE projecte;
USE projecte;

CREATE TABLE tipo_usuari (
    id_tipo_usuari INT NOT NULL PRIMARY KEY,
    nom_tipo VARCHAR(20) NOT NULL,
    permisos VARCHAR(255) NOT NULL
);

CREATE TABLE usuari (
    id_usuari INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    nom VARCHAR(30) NOT NULL,
    cognom VARCHAR (30) NOT NULL,
    dni VARCHAR (15) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    numero_telefono INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_tipo_usuari INT NOT NULL,
    FOREIGN KEY (id_tipo_usuari) REFERENCES tipo_usuari(id_tipo_usuari)
);

CREATE TABLE profesors (
    id_profesor INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    cognom VARCHAR (30) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    numero_telefono INT NOT NULL,
    dni VARCHAR(9) NOT NULL
);

CREATE TABLE curs (
    id_curs INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_curs VARCHAR(60),
    curs_descripcio VARCHAR(1000),
    data_inici DATE,
    data_fi DATE,
    id_profesor INT,
    preu FLOAT,
    placesDisponibles INT CHECK(placesDisponibles>=0),
    FOREIGN KEY (id_profesor) REFERENCES profesors(id_profesor)
);

CREATE TABLE img_cursos (
    id_img_curs INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img VARCHAR(100),
    id_curs INT NOT NULL UNIQUE,
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs)
);

CREATE TABLE dies (
    id_dia_semana INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dia VARCHAR(30) NOT NULL
);

CREATE TABLE horarios (
    id_horario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_dia_semana INT NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    id_curs INT NOT NULL,
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs),
    FOREIGN KEY (id_dia_semana) REFERENCES dies(id_dia_semana)
);

CREATE TABLE continguts (
    id_contingut INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_contingut VARCHAR(50),
    continguts_descripcio VARCHAR(250),
    hores INT,
    id_profesor INT NOT NULL,
    FOREIGN KEY (id_profesor) REFERENCES profesors(id_profesor)
);

CREATE TABLE reserva (
    id_reserva INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuari INT NOT NULL,
    id_curs INT NOT NULL,
    FOREIGN KEY (id_usuari) REFERENCES usuari(id_usuari),
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs)
);

CREATE TABLE curs_contingut (
    id_curs_contingut INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_curs INT NOT NULL,
    id_contingut INT NOT NULL,
    FOREIGN KEY (id_contingut) REFERENCES continguts(id_contingut),
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs)
);

INSERT INTO tipo_usuari VALUES
(1, "Admin", "Crear, eliminar y modificar crusos."),
(2, "Profesor", "Accede a información privilegiada sobre los cursos que hace."),
(3, "Usuari", "Solo puede ver los crusos y reservarlos.");

INSERT INTO usuari (username, nom, cognom, dni, email, numero_telefono, password, id_tipo_usuari) VALUES 
("rcosta","Roger", "Costa", "20572037D", "rcosta@insdanielblanxart.cat", 660302942, "$2y$10$.lucc7ufxNEcCnYjhvm9l.fkSWJTNQkr6RoIFx12NQgDoHFRZm29C", 1),
('jlopez', 'Joel', 'López', '39501002C', 'jlopez@insdanielblanxart.cat', 660054836, '$2y$10$3kr9T2r.quQhgcnQ52a99O5zRZ0tONh/JO1v9rwip8JuBidk8AKHm', 1),
('alonso33', 'Fernando', 'Alonso', '33333333A', 'alonsin@gmail.com', 684093827, '$2y$10$szwgUCaQm.y5JZDuPCWPoOkbSjppTFVWMmSGpBAgi.LEa0MIwSlmS', 3),
('paula12', 'Paula', 'Martin', '29292929K', 'paulita@gmail.com', 622334455, '$2y$10$cjKXCaWpUHab0a0gXFJv7OuNI3367WYnuqfxWCWgTllLkME58V61G', 3);

INSERT INTO profesors (nom, cognom, email, numero_telefono, dni) VALUES
-- id_profesor, nom, email, numero_telefono, dni
("Juan", "Costa", "jgarcia@gmail.com",666555444,"20802090F"),
("Alberto", 'López', "adiaz@gmail.com",656755948,"10101091D"),
("Sandra", 'López', "sgomez@gmail.com",624357894,"56864293N");

INSERT INTO curs (nom_curs, curs_descripcio, data_inici, data_fi, id_profesor, preu, placesDisponibles) VALUES
('Àngles per a principiants', "El curs bàsic d'anglès, està dissenyat per als que estan començant. En finalitzar el curs, l'estudiant tindrà una comprensió dels conceptes bàsics d'anglès i serà capaç de formar construccions i oracions simples. ISBN de llibre és 9780194058186", "2023-09-12", "2024-02-17", 1, 299.99, 30),
("Curs de FOL presencial ", "L'aprenentatge que proporcionen els Cursos de Formació i Orientació Laboral permet ajudar a realitzar la millor elecció d'una professió, així com a afrontar tant la cerca d'ocupació com el dia a dia en un lloc de treball.", "2023-09-12", "2024-02-17", 1, 269.99, 30),
("Curs de RRHH", "El curs de Gestió de Recursos Humans s'enfoca en el fet que les empreses són plenament conscients que un dels seus principals actius per a competir en el mercat són els seus professionals.","2023-09-12", "2024-02-17", 1, 239.99, 30),
("Curs de Comptabilitat", "La comptabilitat és una àrea molt important en les empreses i en els negocis. Indica quant diners s'ha invertit i quan s'ha guanyat. És una professió a la qual moltes persones es dediquen ja que, encara que és numèrica, no és tan pesada com les ciències pures com ara la matemàtica o la física i pot ser emprada fins i tot en la vida personal o en l'administració d'una empresa personal en un futur.", "2023-09-12", "2024-02-17", 1, 289.99, 30),
("Curs de FOL presencial/telemàtic", "L'aprenentatge que proporcionen els Cursos de Formació i Orientació Laboral permet ajudar a realitzar la millor elecció d'una professió, així com a afrontar tant la cerca d'ocupació com el dia a dia en un lloc de treball.", "2023-09-12", "2024-02-17", 1, 229.99, 30),
("Curs de Software DELSOL", "Programari DELSOL t'ofereix programes en el núvol per a la teva empresa amb els quals cobrir totes les necessitats de gestió, incloent-hi facturació, comptabilitat, punts de venda, nòmines, etc.", "2023-09-12", "2024-02-17", 1, 149.99, 30),
("Curs de xarxes socials", "El curs de Xarxes socials de 30 hores, t'ensenyarà com compartir continguts a la xarxa i el paper de la gestió de la reputació.", "2023-09-12", "2024-02-17", 1, 210, 25);

INSERT INTO img_cursos (id_img_curs, img, id_curs) VALUES
(1, '63ef8c5ec4e586.26421442.jpeg', 2),
(2, '63ef8cc6bcdd88.54522243.jpg', 3),
(3, '63ef8cff744ab1.94262352.jpg', 4),
(4, '63ef8d17400c02.22376807.jpeg', 5),
(5, '63ef8d34788b47.24646382.jpg', 6),
(6, '63ef9256ecb2a4.34465625.jpg', 1),
(7, '63ef927229b2d7.00403923.png', 7);

INSERT INTO dies (dia) VALUES
("Dilluns"),
("Dimarts"),
("Dimecres"),
("Dijous"),
("Divendres"),
("Disabte"),
("Diumenge");

INSERT INTO horarios (id_dia_semana, hora_inicio, hora_fin, id_curs) VALUES
(1, '08:00:00', '10:00:00', 1),
(1, '08:00:00', '10:00:00', 3),
(1, '08:00:00', '10:00:00', 2),
(1, '08:00:00', '10:00:00', 5),
(2, '13:00:00', '15:00:00', 2),
(3, '10:00:00', '12:00:00', 3),
(3, '10:00:00', '12:00:00', 4),
(4, '15:00:00', '17:00:00', 4),
(5, '09:00:00', '11:00:00', 5),
(6, '14:00:00', '16:00:00', 6);

INSERT INTO continguts (nom_contingut, continguts_descripcio, hores, id_profesor) VALUES
-- id_profesor, nom, email, numero_telefono, dni
("Irregular verbs", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 5, 3),
("Pronums", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 10, 3),
("Speaking", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 40, 2),
("Writing", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 35, 2),
("Derechos de los trabajadores", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 30, 3),
("Lorem", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae libero voluptatem nisi, dicta similique magni corrupti reprehenderit maxime fugiat autem. Tenetur dolorem mollitia aperiam nemo alias esse itaque minima.", 30, 2),
("Lorem", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae libero voluptatem nisi, dicta similique magni corrupti reprehenderit maxime fugiat autem. Tenetur dolorem mollitia aperiam nemo alias esse itaque minima.", 50, 1),
("Lorem", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae libero voluptatem nisi, dicta similique magni corrupti reprehenderit maxime fugiat autem. Tenetur dolorem mollitia aperiam nemo alias esse itaque minima.", 40, 3),
("Lorem", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae libero voluptatem nisi, dicta similique magni corrupti reprehenderit maxime fugiat autem. Tenetur dolorem mollitia aperiam nemo alias esse itaque minima.", 25, 1),
("Lorem", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae libero voluptatem nisi, dicta similique magni corrupti reprehenderit maxime fugiat autem. Tenetur dolorem mollitia aperiam nemo alias esse itaque minima.", 35, 2);

INSERT INTO curs_contingut (id_curs, id_contingut) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10);

CREATE TABLE moviments (
    id_movimient INT PRIMARY KEY AUTO_INCREMENT,
    id_curs INT,
    moviment VARCHAR(200),
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs)
);

DELIMITER //

CREATE TRIGGER actualitzar_places AFTER INSERT ON moviments
FOR EACH ROW
BEGIN 

IF NEW.moviment = 'reservar' THEN
UPDATE curs SET placesDisponibles = placesDisponibles-1 WHERE id_curs = NEW.id_curs;
ELSE
UPDATE curs SET placesDisponibles = placesDisponibles+1 WHERE id_curs = NEW.id_curs;
END IF;
END //

DELIMITER ;
