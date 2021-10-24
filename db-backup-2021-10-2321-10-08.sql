

CREATE TABLE `cliente` (
  `idcliente` varchar(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `no_habitacion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `facturacion` (
  `idcliente` varchar(250) NOT NULL,
  `Numeracion` varchar(250) DEFAULT NULL,
  `Fecha_de_emision` date DEFAULT NULL,
  `Datos_fiscales_del_emisor` varchar(250) DEFAULT NULL,
  `Datos_fiscales_del_cliente` varchar(250) DEFAULT NULL,
  `Concepto` varchar(250) DEFAULT NULL,
  `Tipo_impositivo` varchar(250) DEFAULT NULL,
  `Informacion_del_Registro_Mercantil` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `habitacion` (
  `no_habitacion` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `no_piso` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `caracteristica` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`no_habitacion`),
  KEY `fk_tipo` (`tipo`),
  CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipohabitacion` (`idTipoHabitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO habitacion VALUES("101","1","560","1","1","");
INSERT INTO habitacion VALUES("102","2","560","1","0","Hola");
INSERT INTO habitacion VALUES("103","1","560","1","0","Mucho");





CREATE TABLE `pago` (
  `idpago` varchar(250) DEFAULT NULL,
  `concepto` text DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `idcliente` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `relecion_reservacion_habitacion` (
  `idreserva` varchar(250) NOT NULL,
  `no_habitacion` varchar(10) NOT NULL,
  PRIMARY KEY (`idreserva`,`no_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `reservacion` (
  `idreserva` varchar(250) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `no_personas` int(11) DEFAULT NULL,
  `idcliente` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `tipohabitacion` (
  `idTipoHabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `Concepto` text NOT NULL,
  PRIMARY KEY (`idTipoHabitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO tipohabitacion VALUES("1","Sencilla");
INSERT INTO tipohabitacion VALUES("2","Doble");
INSERT INTO tipohabitacion VALUES("3","Triple");
INSERT INTO tipohabitacion VALUES("4","Cuadruple");
INSERT INTO tipohabitacion VALUES("5","Suite Privada");





CREATE TABLE `usuario` (
  `idusuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(250) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `telefono` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","hotelnorma","hotelnorma","Norma ","Sanchez Cabrera","9621605433","Laureles 2","rosalesrafael1@hotmail.com","1","6feb783e678c99ef02ac-a97f5bab785a435b92a0-9a893bd948a17ee9d785-af15176da232c50be886");
INSERT INTO usuario VALUES("6","Romz","melendez1R","Hugo","Rosales","9621705041","fdsafsd","carlitos1@hotmail.com","1","");



