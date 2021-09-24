DROP DATABASE IF EXISTS test;
CREATE DATABASE test CHARSET utf8mb4;
use test;

CREATE USER 'alumno'@'localhost' IDENTIFIED BY 'esilumapp';
CREATE USER 'docente'@'localhost' IDENTIFIED BY 'esilumapp';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'esilumapp';

/*
GRANT ALL PRIVILEGES ON test.* To 'alumno'@'localhost';
GRANT ALL PRIVILEGES ON test.* To 'docente'@'localhost';
GRANT ALL PRIVILEGES ON test.* To 'admin'@'localhost';
*/

create table user(
    id varchar(8) primary key,
    passwordhash varchar(255) not null,
    nombre varchar(20) not null,
    apellido varchar(20) not null,
    email varchar(30),
    avatar TINYINT NOT NULL,
    tipodeusuario ENUM("alumno", "docente","admin")
);

create table consulta(
    consultaId int AUTO_INCREMENT PRIMARY KEY,
    consultaTitulo varchar(70) NOT NULL,
    consultaDescripcion varchar(500),
    fecha DATETIME NOT NULL,
    resuelto ENUM("false", "true") NOT NULL,
    alumnoId varchar(8),
    nombreGrupo varchar(3),
    nombreAsignatura varchar(15)
);

create table respuesta(
    respuestaId int AUTO_INCREMENT PRIMARY KEY,
    respuestaContenido varchar(500),
    fecha DATETIME NOT NULL,
    userId varchar(8),
    consultaId int,
    FOREIGN KEY (consultaId) REFERENCES consulta(consultaId),
    FOREIGN KEY (userId) REFERENCES user(id)
);

create table grupo(
    nombreGrupo varchar(3) PRIMARY KEY
);

create table asignatura(
    nombreAsignatura varchar(15) PRIMARY KEY
);

create table grupoTieneAsignatura(
    nombreGrupo varchar(3),
    nombreAsignatura varchar(15),
    userId varchar(8),
    PRIMARY KEY (nombreGrupo, nombreAsignatura)
);

create table alumnoAnotaGrupo(
    userId varchar(8),
    nombreGrupo varchar(3),
    PRIMARY KEY (userId, nombreGrupo)
);

create table docenteAnotaAsignatura(
    userId varchar(8),
    nombreAsignatura varchar(15),
    PRIMARY KEY (userId, nombreAsignatura)
);

create table chat(
    chatId int AUTO_INCREMENT PRIMARY KEY,
    userId varchar(8) NOT NULL,
    nombreAsignatura varchar(15) NOT NULL,
    fecha DATETIME NOT NULL,
    resuelto ENUM("false", "true") NOT NULL,
    FOREIGN KEY (nombreAsignatura) REFERENCES asignatura(nombreAsignatura),
    FOREIGN KEY (userId) REFERENCES user(id)
);

create table mensaje(
    mensajeId int AUTO_INCREMENT PRIMARY KEY,
    chatId int NOT NULL,
    userId varchar(8) NOT NULL,
    fecha DATETIME NOT NULL,
    contenido varchar(500),
    FOREIGN KEY (userId) REFERENCES user(id),
    FOREIGN KEY (chatId) REFERENCES chat(chatId)
);

create table login(
    userId varchar(8) PRIMARY KEY,
    fechaLogIn DATETIME NOT NULL,
    fechaLogOut DATETIME NOT NULL,
    FOREIGN KEY (userId) REFERENCES user(id)
);

/* Permisos de  alumno */
GRANT SELECT, INSERT, UPDATE ON test.user TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.consulta TO "alumno"@"localhost";
GRANT SELECT, UPDATE ON test.respuesta TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.grupo TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.asignatura TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.grupoTieneAsignatura TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.alumnoAnotaGrupo TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.mensaje TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.chat TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.docenteAnotaAsignatura TO "alumno"@"localhost";

/* Permisos de  docente */
GRANT SELECT, INSERT, UPDATE ON test.user TO "docente"@"localhost";
GRANT SELECT, UPDATE ON test.consulta TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.respuesta TO "docente"@"localhost";
GRANT SELECT ON grupo TO "docente"@"localhost";
GRANT SELECT ON asignatura TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.grupoTieneAsignatura TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON test.alumnoAnotaGrupo TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.mensaje TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.chat TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.docenteAnotaAsignatura TO "docente"@"localhost";
/* GRANT ALL PRIVILEGES ON test.* TO "docente"@"localhost" /*

/* Permisos de  admin */
GRANT SELECT, INSERT, UPDATE, DELETE ON test.user TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.consulta TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.respuesta TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.grupo TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.asignatura TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.grupoTieneAsignatura TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.alumnoAnotaGrupo TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.mensaje TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.chat TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON test.docenteAnotaAsignatura TO "admin"@"localhost";

FLUSH PRIVILEGES;

/*
Datos precargados
*/
INSERT INTO grupo(nombreGrupo) VALUES ("1BF");
INSERT INTO grupo(nombreGrupo) VALUES ("2BD");
INSERT INTO grupo(nombreGrupo) VALUES ("3BB");
INSERT INTO grupo(nombreGrupo) VALUES ("1BD");
INSERT INTO grupo(nombreGrupo) VALUES ("2BF");

INSERT INTO asignatura(nombreAsignatura) VALUES ("Programacion1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Programacion2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Programacion3");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Diseñoweb1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Diseñoweb2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("BBDD1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("BBDD2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Ingles1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Ingles2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Ingles3");
INSERT INTO asignatura(nombreAsignatura) VALUES ("SO1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("SO2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("SO3");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Matematica1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Matimatica2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Matematica3");
INSERT INTO asignatura(nombreAsignatura) VALUES ("ADA");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Proyecto");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Sociologia");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Filosofia");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Apt1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Apt2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Geometria1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Geometria2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Electronica");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Taller1");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Taller2");
INSERT INTO asignatura(nombreAsignatura) VALUES ("Logica");