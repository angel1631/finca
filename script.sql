CREATE TABLE Usuario
(
  id Int NOT NULL AUTO_INCREMENT,
  tipo Int,
  jornada Int,
  nombre Varchar(50),
  apellido Varchar(50),
  ingreso Timestamp NULL,
  estado Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship6 ON Usuario (tipo)
;

CREATE INDEX IX_Relationship7 ON Usuario (jornada)
;

-- Table tipo_puesto

CREATE TABLE tipo_puesto
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(50),
  valor_hora Float,
  salario Float,
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table jornada

CREATE TABLE jornada
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(50),
  inicia Varchar(20),
  finaliza Varchar(20),
  incremento_valor_hora Float,
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table planilla

CREATE TABLE planilla
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(50),
  momento Varchar(50),
  autorizo Varchar(50),
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table descripcion_planilla

CREATE TABLE descripcion_planilla
(
  id Int NOT NULL AUTO_INCREMENT,
  planilla Int,
  usuario Int,
  monto Float,
  creado Timestamp NULL,
  creador Varchar(50),
  estado Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship9 ON descripcion_planilla (usuario)
;

CREATE INDEX IX_Relationship11 ON descripcion_planilla (planilla)
;

-- Table marcaje

CREATE TABLE marcaje
(
  id Int NOT NULL AUTO_INCREMENT,
  usuario Int NOT NULL,
  tipo Int NOT NULL,
  momento Timestamp NULL,
  estado Int,
  PRIMARY KEY (id,usuario,tipo)
)
;

-- Table tipo_marcaje

CREATE TABLE tipo_marcaje
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(40),
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table Bono

CREATE TABLE Bono
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(50),
  monto Float,
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table puesto_bono

CREATE TABLE puesto_bono
(
  tipo Int NOT NULL,
  bono Int NOT NULL,
  monto Float,
  estado Int
)
;

ALTER TABLE puesto_bono ADD  PRIMARY KEY (tipo,bono)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE marcaje ADD CONSTRAINT Relationship2 FOREIGN KEY (usuario) REFERENCES Usuario (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE marcaje ADD CONSTRAINT Relationship3 FOREIGN KEY (tipo) REFERENCES tipo_marcaje (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE Usuario ADD CONSTRAINT Relationship6 FOREIGN KEY (tipo) REFERENCES tipo_puesto (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE Usuario ADD CONSTRAINT Relationship7 FOREIGN KEY (jornada) REFERENCES jornada (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE descripcion_planilla ADD CONSTRAINT Relationship9 FOREIGN KEY (usuario) REFERENCES Usuario (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE descripcion_planilla ADD CONSTRAINT Relationship11 FOREIGN KEY (planilla) REFERENCES planilla (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE puesto_bono ADD CONSTRAINT Relationship12 FOREIGN KEY (tipo) REFERENCES tipo_puesto (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE puesto_bono ADD CONSTRAINT Relationship13 FOREIGN KEY (bono) REFERENCES Bono (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;
