/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.21-MariaDB : Database - elmundo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`elmundo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `elmundo`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idcat` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nctat` varchar(255) DEFAULT NULL,
  `descripciones` varchar(255) DEFAULT NULL,
  `activo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Table structure for table `categoriasprovedores` */

DROP TABLE IF EXISTS `categoriasprovedores`;

CREATE TABLE `categoriasprovedores` (
  `idcp` int(11) NOT NULL AUTO_INCREMENT,
  `idcat` int(11) DEFAULT NULL,
  `idpro` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `idcli` int(255) NOT NULL AUTO_INCREMENT,
  `nombrecli` varchar(15) DEFAULT NULL,
  `appcliente` varchar(15) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `emailcli` varchar(30) DEFAULT NULL,
  `ntelcli` varchar(15) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `idpro` int(11) DEFAULT NULL,
  `idest` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcli`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `idcom` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `idpro` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcom`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `idest` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `idmar` int(255) NOT NULL AUTO_INCREMENT,
  `nmarcas` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `activo` varchar(255) DEFAULT NULL,
  `idpro` int(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idmar`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `idpe` int(11) NOT NULL,
  `idcli` int(11) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idpe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `idprod` int(255) NOT NULL AUTO_INCREMENT,
  `nproductos` varchar(250) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  `precio` int(250) DEFAULT NULL,
  `activo` varchar(3) DEFAULT NULL,
  `idmar` int(3) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `hdd` varchar(255) DEFAULT NULL,
  `procesador` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idprod`),
  KEY `idcat` (`idcat`),
  KEY `idmar` (`idmar`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Table structure for table `provedores` */

DROP TABLE IF EXISTS `provedores`;

CREATE TABLE `provedores` (
  `idpro` int(255) NOT NULL AUTO_INCREMENT,
  `nombreempresa` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `idest` int(2) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `giro` varchar(10000) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `idcom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpro`),
  KEY `idest` (`idest`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Table structure for table `tipocliente` */

DROP TABLE IF EXISTS `tipocliente`;

CREATE TABLE `tipocliente` (
  `idtipo` int(3) NOT NULL,
  `ctipo` varchar(15) DEFAULT NULL,
  `activo` varchar(15) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `idpro` int(21) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
