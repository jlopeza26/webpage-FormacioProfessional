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
    continguts_descripcio VARCHAR(200),
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
('alonso33', 'Fernando', 'Alonso', '33333333A', 'alonsin@gmail.com', 684093827, '$2y$10$szwgUCaQm.y5JZDuPCWPoOkbSjppTFVWMmSGpBAgi.LEa0MIwSlmS', 3);

INSERT INTO profesors (nom, cognom, email, numero_telefono, dni) VALUES
-- id_profesor, nom, email, numero_telefono, dni
("Juan", "Costa", "jgarcia@gmail.com",666555444,"20802090F"),
("Alberto", 'López', "adiaz@gmail.com",656755948,"10101091D"),
("Sandra", 'López', "sgomez@gmail.com",624357894,"56864293N");

INSERT INTO curs (nom_curs, curs_descripcio, data_inici, data_fi, id_profesor, preu, placesDisponibles) VALUES
('Inglés para principiantes', 'El curso básico de inglés, está diseñado para los que están empezando. Al finalizar el curso, el estudiante tendrá una comprensión de los conceptos básicos de inglés y será capaz de formar construcciones y oraciones simples. ISBN de libro es 9780194058186', "2023-09-12", "2024-02-17", 1, 299.99, 30),
("Curso de FOL presencial ", "Material incluido, no hace falta que lo compren.", "2023-09-12", "2024-02-17", 1, 269.99, 30),
("Curso de RRHH", "Material incluido, no hace falta que lo compren.","2023-09-12", "2024-02-17", 1, 239.99, 30),
("Curso de Contabilidad", "Material incluido, no hace falta que lo compren.", "2023-09-12", "2024-02-17", 1, 289.99, 30),
("Curso de FOL presencial/telematico", "Material incluido, no hace falta que lo compren.", "2023-09-12", "2024-02-17", 1, 229.99, 30),
("Curso de Software DELSOL", "Material incluido, no hace falta que lo compren.", "2023-09-12", "2024-02-17", 1, 149.99, 30),
("Curso de redes sociales", "Material incluido, no hace falta que lo compren.", "2023-09-12", "2024-02-17", 1, 210, 25);

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
("Derechos de los trabajadores", "Els verbs irregulars en anglès representen un dels reptes més importants per a aprendre anglès ja que es tracta d'un dels elements gramaticals indispensables per a parlar o escriure.", 30, 3);

INSERT INTO curs_contingut (id_curs, id_contingut) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5);