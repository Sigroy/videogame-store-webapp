CREATE
DATABASE tienda_videojuegos;

USE
tienda_videojuegos;

CREATE TABLE usuario
(
    id_usuario INT(255)     NOT NULL AUTO_INCREMENT,
    nombre     VARCHAR(100) NOT NULL,
    apellidos  VARCHAR(255),
    email      VARCHAR(255) NOT NULL,
    password   VARCHAR(255) NOT NULL,
    rol        VARCHAR(20),
    imagen     VARCHAR(255),
    CONSTRAINT pk_usuario PRIMARY KEY (id_usuario),
    CONSTRAINT uq_email UNIQUE (email)
) ENGINE = InnoDb;

INSERT INTO usuario
VALUES (NULL, 'Admin', 'Admin', 'admin@admin.com', 'provisional', 'admin', NULL);

CREATE TABLE categoria
(
    id_categoria INT(255)     NOT NULL AUTO_INCREMENT,
    nombre       VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categoria PRIMARY KEY (id_categoria)
) ENGINE = InnoDb;

INSERT INTO categoria
VALUES (NULL, 'Nintendo Switch');
INSERT INTO categoria
VALUES (NULL, 'PlayStation 5');
INSERT INTO categoria
VALUES (NULL, 'Xbox One');
INSERT INTO categoria
VALUES (NULL, 'Nintendo 3DS');

CREATE TABLE producto
(
    id_producto  INT(255)      NOT NULL AUTO_INCREMENT,
    id_categoria INT(255)      NOT NULL,
    nombre       VARCHAR(100)  NOT NULL,
    descripcion  TEXT,
    precio       FLOAT(100, 2) NOT NULL,
    stock        INT(255)      NOT NULL,
    oferta       VARCHAR(2),
    fecha        DATE          NOT NULL,
    imagen       VARCHAR(255),
    CONSTRAINT pk_producto PRIMARY KEY (id_producto),
    CONSTRAINT fk_producto_categoria FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)
) ENGINE = InnoDb;

CREATE TABLE pedido
(
    id_pedido      INT(255)      NOT NULL AUTO_INCREMENT,
    id_usuario     INT(255)      NOT NULL,
    ciudad         VARCHAR(100)  NOT NULL,
    estado_entidad VARCHAR(100)  NOT NULL,
    direccion      VARCHAR(255)  NOT NULL,
    coste          FLOAT(200, 2) NOT NULL,
    estado         VARCHAR(20)   NOT NULL,
    fecha          DATE,
    hora           TIME,
    CONSTRAINT pk_pedido PRIMARY KEY (id_pedido),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
) ENGINE = InnoDb;

CREATE TABLE linea_pedido
(
    id_linea_pedido INT(255) NOT NULL AUTO_INCREMENT,
    id_pedido       INT(255) NOT NULL,
    id_producto     INT(255) NOT NULL,
    unidades INT(255) NOT NULL,
    CONSTRAINT pk_linea_pedido PRIMARY KEY (id_linea_pedido),
    CONSTRAINT fk_linea_pedido FOREIGN KEY (id_pedido) REFERENCES pedido (id_pedido),
    CONSTRAINT fk_linea_producto FOREIGN KEY (id_producto) REFERENCES producto (id_producto)
) ENGINE = InnoDb;