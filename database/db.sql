create database estructuramvc;
use estructuramvc;
create table alumno (
    matricula int primary key auto_increment,
    nombre varchar(30),
    apellido varchar(30)
);
CREATE TABLE computer(
	id_computer int primary key auto_increment,
	name_computer varchar(30),
	price_computer varchar(30),
	model_computer varchar(30),
	color_computer varchar(10)
);

CREATE TABLE materia(
    id_materia int primary key auto_increment,
    nombre_materia varchar(50),
    grupo_materia varchar(50),
	alumnos_materia int
);

CREATE TABLE maestro(
	id_maestro int primary key auto_increment,
	nombre_maestro varchar(30),
	apppat_maestro varchar(30),
	appmat_maestro varchar(30),
	edad_maestro varchar(2)
);