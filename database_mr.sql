
CREATE TABLE IF NOT EXISTS operaciones (
                cod_operacion VARCHAR(10) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                PRIMARY KEY (cod_operacion)
);


CREATE TABLE IF NOT EXISTS productos (
                cod_producto VARCHAR(10) NOT NULL,
                stsprod VARCHAR(10) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                PRIMARY KEY (cod_producto)
);


CREATE TABLE IF NOT EXISTS roles (
                cod_rol VARCHAR(10) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                PRIMARY KEY (cod_rol)
);


CREATE TABLE IF NOT EXISTS companias (
                cod_compania VARCHAR(10) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                PRIMARY KEY (cod_compania)
);


CREATE TABLE IF NOT EXISTS usuarios (
                idusr NUMERIC(10) NOT NULL,
                cod_rol VARCHAR(10) NOT NULL,
                cod_compania VARCHAR(10) NOT NULL,
                nombre VARCHAR(255) NOT NULL,
                correo VARCHAR(255) NOT NULL,
                cedula NUMERIC(10) NOT NULL,
                contrasena VARCHAR(255) NOT NULL,
                PRIMARY KEY (idusr)
);

--Tabla que simulará la entidad que tenga los clientes que ya tengan adquirido el producto por el cual
--se usará la app
CREATE TABLE IF NOT EXISTS usuarios_producto (
                iduserp NUMERIC(10) NOT NULL,
                nombre VARCHAR(255) NOT NULL,
                cedula NUMERIC(10) NOT NULL,
                cod_producto VARCHAR(10) NOT NULL,
                PRIMARY KEY (iduserp)
);


CREATE TABLE IF NOT EXISTS medicos (
                idmedi NUMERIC(10) ,
                idusr NUMERIC(10) NOT NULL,
                stsmedi VARCHAR(10) NOT NULL,
                turno VARCHAR(10) NOT NULL,
                fec_ult_conec DATE NOT NULL,
                PRIMARY KEY (idmedi)
);


CREATE TABLE IF NOT EXISTS historial_operaciones (
                idoper NUMERIC(10)  NOT NULL,
                idmedi NUMERIC(10) NOT NULL,
                idusr NUMERIC(10) NOT NULL,
                cod_operacion VARCHAR(10) NOT NULL,
                causa VARCHAR(255) NOT NULL,
                sintomas VARCHAR(255) NOT NULL,
                fecha_oper DATE NOT NULL,
                PRIMARY KEY (idoper)
);


CREATE TABLE IF NOT EXISTS conversaciones (
                idconv NUMERIC(10)  NOT NULL,
                idoper NUMERIC(10) NOT NULL,
                fecha_conversacion DATE NOT NULL,
                idsesion VARCHAR(255) NOT NULL,
                PRIMARY KEY (idconv)
);


CREATE TABLE IF NOT EXISTS mensajes (
                idsms NUMERIC(10)  NOT NULL,
                idconv NUMERIC(10) NOT NULL,
                idemisor NUMERIC(10) NOT NULL,
                idreceptor NUMERIC(10) NOT NULL,
                fecha_sms DATE NOT NULL,
                PRIMARY KEY (idsms)
);


CREATE TABLE IF NOT EXISTS videollamadas (
                idllamada NUMERIC(10)  NOT NULL,
                idoper NUMERIC(10) NOT NULL,
                fecha_llamada DATE NOT NULL,
                idsesion VARCHAR(255) NOT NULL,
                token VARCHAR(255) NOT NULL,
                PRIMARY KEY (idllamada)
);


CREATE TABLE IF NOT EXISTS prod_usr (
                idprod NUMERIC(10)  NOT NULL,
                cod_producto VARCHAR(10) NOT NULL,
                idusr NUMERIC(10) NOT NULL,
                stsprodusr VARCHAR(10) NOT NULL,
                PRIMARY KEY (idprod)
);


ALTER TABLE historial_operaciones ADD CONSTRAINT tipo_operacion_historial_medico_fk
FOREIGN KEY (cod_operacion)
REFERENCES operaciones (cod_operacion)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE prod_usr ADD CONSTRAINT producto_prod_usr_fk
FOREIGN KEY (cod_producto)
REFERENCES productos (cod_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE usuarios ADD CONSTRAINT roles_usuario_fk
FOREIGN KEY (cod_rol)
REFERENCES roles (cod_rol)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE usuarios ADD CONSTRAINT tipo_companias_usuario_fk
FOREIGN KEY (cod_compania)
REFERENCES companias (cod_compania)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE prod_usr ADD CONSTRAINT usuario_prod_usr_fk
FOREIGN KEY (idusr)
REFERENCES usuarios (idusr)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE historial_operaciones ADD CONSTRAINT usuario_historial_medico_fk
FOREIGN KEY (idusr)
REFERENCES usuarios (idusr)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE medicos ADD CONSTRAINT usuario_medicos_fk
FOREIGN KEY (idusr)
REFERENCES usuarios (idusr)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE historial_operaciones ADD CONSTRAINT medicos_historial_medico_fk
FOREIGN KEY (idmedi)
REFERENCES medicos (idmedi)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE videollamadas ADD CONSTRAINT historial_medico_videollamada_fk
FOREIGN KEY (idoper)
REFERENCES historial_operaciones (idoper)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE conversaciones ADD CONSTRAINT historial_medico_conversacion_fk
FOREIGN KEY (idoper)
REFERENCES historial_operaciones (idoper)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE mensajes ADD CONSTRAINT conversacion_mensajes_fk
FOREIGN KEY (idconv)
REFERENCES conversaciones (idconv)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

--Seccion de llenado de data.
INSERT INTO `usuarios_producto`(`iduserp`, `nombre`, `cedula`) VALUES (1,'Don Julian', 20127909, '01');
INSERT INTO `usuarios_producto`(`iduserp`, `nombre`, `cedula`) VALUES (2,'Maria la bonita', 19872332, '01');
INSERT INTO `usuarios_producto`(`iduserp`, `nombre`, `cedula`) VALUES (3,'Lily la doctora', 15135925, '01');

INSERT INTO `roles`(`cod_rol`, `descripcion`) VALUES ('00','Administrador');
INSERT INTO `roles`(`cod_rol`, `descripcion`) VALUES ('01','Moderador');
INSERT INTO `roles`(`cod_rol`, `descripcion`) VALUES ('02','Paciente');
INSERT INTO `roles`(`cod_rol`, `descripcion`) VALUES ('03','Doctor');

INSERT INTO `productos`(`cod_producto`, `stsprod`, `descripcion`) VALUES ('01','ACT','Home Care');
INSERT INTO `productos`(`cod_producto`, `stsprod`, `descripcion`) VALUES ('02','ACT','Atenmedi Corporativo');
INSERT INTO `productos`(`cod_producto`, `stsprod`, `descripcion`) VALUES ('03','ACT','Atenmedi Family');

INSERT INTO `operaciones`(`cod_operacion`, `descripcion`) VALUES ('01','VideoLlamada');
INSERT INTO `operaciones`(`cod_operacion`, `descripcion`) VALUES ('02','ChatOnline');
INSERT INTO `operaciones`(`cod_operacion`, `descripcion`) VALUES ('03','Traslado Programado');
INSERT INTO `operaciones`(`cod_operacion`, `descripcion`) VALUES ('04','AMD Extendido');

INSERT INTO `companias`(`cod_compania`, `descripcion`) VALUES ('01', 'HMO');
INSERT INTO `companias`(`cod_compania`, `descripcion`) VALUES ('02', 'Clínica Fulana');
INSERT INTO `companias`(`cod_compania`, `descripcion`) VALUES ('03', 'Seguro lo que tal');

INSERT INTO `usuarios`(`idusr`, `cod_rol`, `cod_compania`, `nombre`, `correo`, `cedula`, `contrasena`) VALUES (1, '03', '01', 'Lily la doctora', 'ladoctora@gmail.com', 15135925, '123456789');

INSERT INTO `medicos`(`idmedi`, `idusr`, `stsmedi`, `turno`, `fec_ult_conec`) VALUES (1, 1, 'ACT', 1, CURRENT_DATE);