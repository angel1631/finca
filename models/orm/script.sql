-- Table reservacion

CREATE TABLE reservacion
(
  id Int NOT NULL AUTO_INCREMENT,
  mesa Int,
  restaurante Int,
  cliente Varchar(250),
  dia Varchar(20),
  hora Time,
  comensales Int,
  en_sitio Int,
  estatus Int,
  PRIMARY KEY (id)
);

CREATE INDEX IX_Relationship23 ON reservacion (mesa,restaurante);

-- Table mesa

CREATE TABLE mesa
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  ubicacion Varchar(250),
  fumador Int,
  capacidad Int,
  estatus Int,
  PRIMARY KEY (id)
)
;

-- Table restaurante

CREATE TABLE restaurante
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  direccion Varchar(250),
  estatus Int,
  padre Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship5 ON restaurante (padre)
;

-- Table mesa_restaurante

CREATE TABLE mesa_restaurante
(
 mes Int NOT NULL,
 restaurant Int NOT NULL,
 estatu Int
)
;

ALTER TABLE mesa_restaurante ADD  PRIMARY KEY (mesa,restaurante)
;

-- Table tpr

CREATE TABLE tpr
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  direccion Varchar(250),
  estatu Int,
  PRIMARY KEY (id)
)
;

-- Table unidad_medida

CREATE TABLE unidad_medida
(
  id Int NOT NULL AUTO_INCREMENT,
  titul Varchar(250),
  PRIMARY KEY (id)
)
;

-- Table producto

CREATE TABLE producto
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  cantidad Int NOT NULL,
  estatus Int,
  id Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship6 ON producto (id)
;

-- Table platillo

CREATE TABLE platillo
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  principal Int,
  estatus Int,
  PRIMARY KEY (id)
)
;

-- Table platillo_producto

CREATE TABLE platillo_producto
(
  id Int NOT NULL,
  id Int NOT NULL,
  cantidad Int,
  estatus Int
)
;

ALTER TABLE platillo_producto ADD  PRIMARY KEY (id,id)
;

-- Table pedido

CREATE TABLE pedido
(
  id Char(20) NOT NULL AUTO_INCREMENT,
  forma_pago Int,
  reservacion Int,
  numero Int,
  serie Varchar(50),
  estatus Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship15 ON pedido (forma_pago)
;

CREATE INDEX IX_Relationship24 ON pedido (reservacion)
;

-- Table forma_pago

CREATE TABLE forma_pago
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(250),
  PRIMARY KEY (id)
)
;

-- Table linea_pedido

CREATE TABLE linea_pedido
(
  id Int NOT NULL AUTO_INCREMENT,
  id_pedido Int NOT NULL AUTO_INCREMENT,
  cantidad Int,
  id Int,
  Attribute1 Char(20) NOT NULL
)
;

CREATE INDEX IX_Relationship18 ON linea_pedido (id)
;

ALTER TABLE linea_pedido ADD  PRIMARY KEY (id_pedido,id,Attribute1)
;

-- Table linea_guarnicion

CREATE TABLE linea_guarnicion
(
  id_pedido Int NOT NULL,
  id_platillo Int NOT NULL,
  id Int NOT NULL,
  Attribute1 Char(20) NOT NULL
)
;

ALTER TABLE linea_guarnicion ADD  PRIMARY KEY
(id_pedido,id_platillo,id,Attribute1)
;

-- Table alerta_producto

CREATE TABLE alerta_producto
(
  id Int NOT NULL,
  cantidad Int,
  estatus Int
)
;

ALTER TABLE alerta_producto ADD  PRIMARY KEY (id)
;

-- Create relationships section
-------------------------------------------------

ALTER TABLE mesa_restaurante ADD CONSTRAINT Relationship2 FOREIGN
KEY (mesa) REFERENCES mesa (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE mesa_restaurante ADD CONSTRAINT Relationship3 FOREIGN
KEY (restaurante) REFERENCES restaurante (id) ON DELETE RESTRICT
ON UPDATE RESTRICT
;

ALTER TABLE restaurante ADD CONSTRAINT Relationship5 FOREIGN KEY
(padre) REFERENCES restaurante (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE producto ADD CONSTRAINT Relationship6 FOREIGN KEY
(id) REFERENCES unidad_medida (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE platillo_producto ADD CONSTRAINT Relationship12
FOREIGN KEY (id) REFERENCES producto (id) ON DELETE RESTRICT ON
UPDATE RESTRICT
;

ALTER TABLE platillo_producto ADD CONSTRAINT Relationship13
FOREIGN KEY (id) REFERENCES platillo (id) ON DELETE RESTRICT ON
UPDATE RESTRICT
;

ALTER TABLE pedido ADD CONSTRAINT Relationship15 FOREIGN KEY
(forma_pago) REFERENCES forma_pago (id) ON DELETE RESTRICT ON
UPDATE RESTRICT
;

ALTER TABLE linea_pedido ADD CONSTRAINT Relationship17 FOREIGN KEY
(Attribute1) REFERENCES pedido (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE linea_pedido ADD CONSTRAINT Relationship18 FOREIGN KEY
(id) REFERENCES platillo (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE linea_guarnicion ADD CONSTRAINT Relationship19 FOREIGN
KEY (id_pedido, id_platillo, Attribute1) REFERENCES
linea_pedido (id_pedido, id, Attribute1) ON DELETE RESTRICT ON
UPDATE RESTRICT
;

ALTER TABLE linea_guarnicion ADD CONSTRAINT Relationship21 FOREIGN
KEY (id) REFERENCES platillo (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE alerta_producto ADD CONSTRAINT Relationship22 FOREIGN
KEY (id) REFERENCES producto (id) ON DELETE RESTRICT ON UPDATE
RESTRICT
;

ALTER TABLE reservacion ADD CONSTRAINT Relationship23 FOREIGN KEY
(mesa, restaurante) REFERENCES mesa_restaurante (mesa,
restaurante) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE pedido ADD CONSTRAINT Relationship24 FOREIGN KEY
(reservacion) REFERENCES reservacion (id) ON DELETE RESTRICT ON
UPDATE RESTRICT
;