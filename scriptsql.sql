use base;

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