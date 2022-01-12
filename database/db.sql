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

CREATE TABLE alumno(
    id_alumno int primary key auto_increment,
    nombre_alumno varchar(50),
    apellidos_alumno varchar(50)
);

CREATE TABLE maestro(
	id_maestro int primary key auto_increment,
	nombre_maestro varchar(30),
	apppat_maestro varchar(30),
	appmat_maestro varchar(30),
	edad_maestro varchar(2)
);