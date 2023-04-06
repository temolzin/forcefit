CREATE TABLE rol (
	id_rol INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombreRol VARCHAR(60),
	descripcion VARCHAR(60)
);

CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY NOT NULL,
    nombreUsuario VARCHAR(30),
    apellidoPaternoUsuario VARCHAR(30),
    apellidoMaternoUsuario VARCHAR(30),
    emailUsuario VARCHAR (30),
    passwordUsuario VARCHAR(30),
    imagen TEXT,
    calleUsuario TEXT,
    estadoUsuario TEXT,
    municipioUsuario TEXT,
    coloniaUsuario TEXT,
    codigoPostalUsuario INT,
    id_rol INT NOT NULL,
    KEY id_rol (id_rol),
    CONSTRAINT rol_FK FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
);

CREATE TABLE modulo (
	id_modulo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_modulo VARCHAR (30),
	icono TEXT
);

CREATE TABLE permiso (
	id_permiso INT PRIMARY KEY AUTO_INCREMENT,
	id_rol INT,
	KEY id_rol (id_rol),
	CONSTRAINT id_rolFK FOREIGN KEY (id_rol) REFERENCES rol (id_rol),
	id_modulo INT,
	KEY id_modulo (id_modulo),
	CONSTRAINT id_moduloFK FOREIGN KEY (id_modulo) REFERENCES modulo (id_modulo),
	c INT,
	r INT,
	u INT,
	d INT
);

CREATE TABLE submodulo (
	id_submodulo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_submodulo VARCHAR (30),
	icono TEXT,
	id_modulo INT NOT NULL,
	KEY id_modulo (id_modulo),
	CONSTRAINT idmodulo_FK FOREIGN KEY (id_modulo) REFERENCES modulo (id_modulo)
);

CREATE TABLE plan_sistema (
	id_plan_sistema INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_plan_sistema VARCHAR (30),
	descripcion_plan_sistema VARCHAR (30),
	costo decimal(9,2);
);

CREATE TABLE pago_plan_sistema (
	id_pago INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	fecha_hora_pago DATETIME,
	vencimiento DATE,
	id_plan_sistema INT NOT NULL,
	KEY id_plan_sistema (id_plan_sistema),
	CONSTRAINT plan_sistema_FK FOREIGN KEY (id_plan_sistema) REFERENCES plan_sistema (id_plan_sistema),
	id_usuario INT NOT NULL,
	KEY id_usuario (id_usuario),
	CONSTRAINT usuario_FK FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE gimnasio(
	id_gimnasio INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_gimnasio VARCHAR (40),
	telefono VARCHAR (10),
	imagen TEXT
);

CREATE TABLE usuario_gimnasio (
	id_usuario INT NOT NULL,
	KEY id_usuario (id_usuario),
	CONSTRAINT idusuario_FK FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
	id_gimnasio INT NOT NULL AUTO_INCREMENT,
	KEY id_gimnasio (id_gimnasio),
	CONSTRAINT gimnasio_FK FOREIGN KEY (id_gimnasio) REFERENCES gimnasio (id_gimnasio),
	fecha_inicio DATE,
	fecha_termino DATE,
	status VARCHAR (20)
);

CREATE TABLE cliente(
    id_cliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_cliente VARCHAR (30),
    apellido_paterno_cliente VARCHAR (30),
    apellido_materno_cliente VARCHAR (30),
    municipio_cliente VARCHAR (60),
    colonia_cliente VARCHAR(30),
    calle_cliente VARCHAR (30),
    codigo_postal_cliente VARCHAR (30),
    numero_cliente VARCHAR (10),
    imagen_cliente TEXT
);

CREATE TABLE entrada_salida (
	id_cliente INT NOT NULL,
	KEY id_cliente (id_cliente),
	CONSTRAINT idcliente_FK FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
	tipo VARCHAR (15),
	fecha_hora DATETIME,
	PRIMARY KEY (id_cliente)
);

CREATE TABLE plan_gym (
    id_planGym INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombrePlanGym VARCHAR (30),
    descripcionPlanGym VARCHAR (100),
    costoPlanGym decimal(9,2);

);

CREATE TABLE pago_plan_gym_cliente (
	id_pago INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cantidad_pago INT,
	fecha_hora_pago DATETIME,
	vencimiento DATE,
	id_cliente INT NOT NULL,
	KEY id_cliente (id_cliente),
	CONSTRAINT cliente_FK FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
	id_plan INT NOT NULL,
	KEY id_plan (id_plan),
	CONSTRAINT plan_FK FOREIGN KEY (id_plan) REFERENCES plan_gym (id_plan)
);

CREATE TABLE gimnasio_cliente (
	id_gimnasio INT NOT NULL,
	KEY id_gimnasio (id_gimnasio),
	CONSTRAINT idgimnasio_FK FOREIGN KEY (id_gimnasio) REFERENCES gimnasio (id_gimnasio),
	id_cliente INT NOT NULL,
	KEY id_cliente (id_cliente),
	CONSTRAINT id_cliente_FK FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
	PRIMARY KEY (id_gimnasio,id_cliente)
);

