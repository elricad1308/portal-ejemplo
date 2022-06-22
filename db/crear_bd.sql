CREATE DATABASE portal_ejemplo;

CREATE USER user_portal IDENTIFIED BY 'tapukoko';
GRANT ALL PRIVILEGES ON portal_ejemplo.* TO 'user_portal'@'%';
FLUSH PRIVILEGES;

USE portal_ejemplo;

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id_archivo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_archivo_src` int(11) DEFAULT NULL,
  `url` varchar(500) DEFAULT '',
  `alt` varchar(300) DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `archivos_source`;

CREATE TABLE `archivos_source` (
  `id_archivo_src` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_coleccion` int(11) DEFAULT NULL,
  `id_tipo_archivo` int(11) DEFAULT NULL,
  `ubicacion` varchar(500) DEFAULT NULL,
  `nombre_original` varchar(250) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `md5` varchar(40) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_archivo_src`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO archivos_source (
	id_archivo_src
	, ubicacion
	, nombre_original 
	, tipo
	, `size`
) VALUES (
	1
	, '/assets/imagenes/cheems.jpg'
	, 'cheems.jpg'
	, 'image/jpeg'
	, 4035
);

INSERT INTO archivos (
  id_archivo
  , id_archivo_src
  , url
) VALUES (
  1
  , 1
  , '/imagenes/hola.jpg'
);