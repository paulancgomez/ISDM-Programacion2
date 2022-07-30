DROP DATABASE IF EXISTS cardozop;
CREATE DATABASE cardozop;
USE cardozop;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
	idUsuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    apenom VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    usuario VARCHAR(60) NOT NULL,
    clave VARCHAR(60) NOT NULL
);

DROP TABLE IF EXISTS alumnos;
CREATE TABLE alumnos(
	apellido VARCHAR(20),
    nombre VARCHAR(20),
	dni INT,
    fechaNac INT,
    domicilio VARCHAR(20)
);

INSERT INTO alumnos(apellido, nombrem, dni, fechaNac, domicilio)
VALUES ('Cardozo Gomez', 'Paula Nicole', 41000111, 04061998, 'General Guemes'),
	   ('Luna', 'Olivia', 42000111, 0406200, 'General Guemes'),
        ('Perez', 'Emma', 43000111, 04062001, 'General Guemes');

DROP TABLE IF EXISTS materias;
CREATE TABLE materias(
	idMateria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20),
	dniProfesor INT,
    horario INT,
    descuento INT(20)
);

DROP TABLE IF EXISTS matriculas;
CREATE TABLE matriculas(
	dniAlumno INT,
    idMateria INT,
    PRIMARY KEY(dniAlumno, idMateria),
    FOREIGN KEY (dniAlumno) REFERENCES alumnos(dni),
    FOREIGN KEY (idMateria) REFERENCES alumnos(idMateria)
);

 de 3 (tres) Alumnos y 3 (tres) Profesores cada 
uno de ellos con 3(tres) Materias, Horario, Sueldo Bruto, Descuento para el Profesor y 3(tres) 
Materias, Nota para el Alumno. 