DROP DATABASE IF EXISTS test;
CREATE DATABASE test CHARSET utf8mb4;
use test;

CREATE USER 'alumno'@'LOCALHOST' IDENTIFIED BY 'NdS[69_3xaQ2>*pA';
CREATE USER 'docente'@'LOCALHOST' IDENTIFIED BY 'bm*2&]\Vs%E#F)jC';
CREATE USER 'admin'@'LOCALHOST' IDENTIFIED BY '*o:VQ\\48W~w.j]R';


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
    docenteId varchar(8)
);

create table respuesta(
    respuestaId int AUTO_INCREMENT PRIMARY KEY,
    respuestaContenido varchar(500),
    fecha DATETIME NOT NULL,
    userId varchar(8),
    consultaId int
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

/*

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
*/

/* Permisos de  alumno */
GRANT SELECT, INSERT, UPDATE ON user TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON consulta TO "alumno"@"localhost";
GRANT SELECT, UPDATE ON respuesta TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON grupo TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON asignatura TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON grupoTieneAsignatura TO "alumno"@"localhost";
GRANT SELECT, INSERT, UPDATE ON alumnoAnotaGrupo TO "alumno"@"localhost";

/* Permisos de  docente */
GRANT SELECT, INSERT, UPDATE ON user TO "docente"@"localhost";
GRANT SELECT, UPDATE ON consulta TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON respuesta TO "docente"@"localhost";
GRANT SELECT ON grupo TO "docente"@"localhost";
GRANT SELECT ON asignatura TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON grupoTieneAsignatura TO "docente"@"localhost";
GRANT SELECT, INSERT, UPDATE ON alumnoAnotaGrupo TO "docente"@"localhost";

/* Permisos de  admin */
GRANT SELECT, INSERT, UPDATE, DELETE ON user TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON consulta TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON respuesta TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON grupo TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON asignatura TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON grupoTieneAsignatura TO "admin"@"localhost";
GRANT SELECT, INSERT, UPDATE, DELETE ON alumnoAnotaGrupo TO "admin"@"localhost";