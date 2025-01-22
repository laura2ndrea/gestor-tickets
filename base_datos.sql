-- Creación de las tablas en la base de datos 
CREATE TABLE usuario_rol (
    id_usuario_rol SERIAL PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE usuario_estado (
    id_usuario_estado SERIAL PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    nick VARCHAR(45) UNIQUE NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasenia VARCHAR(256) NOT NULL,
    id_estado INTEGER NOT NULL REFERENCES usuario_estado(id_usuario_estado),
    id_rol INTEGER NOT NULL REFERENCES usuario_rol(id_usuario_rol)
);

CREATE TABLE estado_ticket (
    id_estado_ticket SERIAL PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE ticket (
    id_ticket SERIAL PRIMARY KEY,
    asunto VARCHAR(100) NOT NULL,
    descripcion VARCHAR(1000),
    usuario_creacion INTEGER NOT NULL REFERENCES usuario(id_usuario),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    respuesta VARCHAR(1000),
    usuario_respuesta INTEGER REFERENCES usuario(id_usuario),
    fecha_respuesta TIMESTAMP,
    id_estado_ticket INTEGER NOT NULL REFERENCES estado_ticket(id_estado_ticket)
);

CREATE TABLE log_accion (
    id_log_accion SERIAL PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE log (
    id_log SERIAL PRIMARY KEY,
    sql_text VARCHAR(1000) NOT NULL,
    table_text VARCHAR(50) NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_log_accion INTEGER NOT NULL REFERENCES log_accion(id_log_accion),
    id_usuario INTEGER REFERENCES usuario(id_usuario)
);

-- Inserción de datos iniciales
INSERT INTO usuario_rol (descripcion) VALUES 
('Administrador'),
('Responsable de Soporte'),
('Usuario');

INSERT INTO usuario_estado (descripcion) VALUES 
('Activo'),
('Inactivo');

INSERT INTO estado_ticket (descripcion) VALUES 
('Abierto'),
('En Proceso'),
('Cerrado'),
('Cancelado');

INSERT INTO log_accion (descripcion) VALUES 
('Creación'),
('Actualización'),
('Eliminación'),
('Consulta');