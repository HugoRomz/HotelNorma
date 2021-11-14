

CREATE TABLE `cliente` (
  `idcliente` varchar(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `no_habitacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `no_habitacion` (`no_habitacion`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`no_habitacion`) REFERENCES `habitacion` (`no_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente VALUES("HN-20da","Hugo Rafael","Rosales Meléndez","Tuxtla Chico","20","");
INSERT INTO cliente VALUES("HN-47ea","Saul","Altuzar","Tapachula","19","");
INSERT INTO cliente VALUES("HN-9e0a","Carlos Alberto","Martinez Bonilla","Tapachula","20","");





CREATE TABLE `detalle_pago` (
  `no_habitacion` varchar(10) DEFAULT NULL,
  `idpago` varchar(250) NOT NULL,
  `consecutivo` int(11) NOT NULL,
  PRIMARY KEY (`idpago`,`consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `detalle_reservacion` (
  `idreserva` varchar(250) NOT NULL,
  `no_habitacion` varchar(10) DEFAULT NULL,
  `consecutivo` int(11) NOT NULL,
  PRIMARY KEY (`idreserva`,`consecutivo`)
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
  `no_personas` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `caracteristica` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`no_habitacion`),
  KEY `fk_tipo` (`tipo`),
  CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipohabitacion` (`idTipoHabitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO habitacion VALUES("101","1","700","1","2","0",".");
INSERT INTO habitacion VALUES("102","2","900","1","4","1",".");
INSERT INTO habitacion VALUES("103","2","900","1","4","0",".");
INSERT INTO habitacion VALUES("104","3","1500","1","6","0",".");
INSERT INTO habitacion VALUES("105","1","700","1","2","0",".");
INSERT INTO habitacion VALUES("106","1","700","1","2","0",".");
INSERT INTO habitacion VALUES("107","1","700","1","2","0",".");
INSERT INTO habitacion VALUES("108","1","700","1","2","0",".");
INSERT INTO habitacion VALUES("201","1","700","2","2","0",".");
INSERT INTO habitacion VALUES("202","2","900","2","4","0",".");
INSERT INTO habitacion VALUES("203","2","900","2","4","0",".");
INSERT INTO habitacion VALUES("204","2","900","2","4","0",".");
INSERT INTO habitacion VALUES("205","1","700","2","2","0",".");
INSERT INTO habitacion VALUES("206","1","700","2","2","0",".");
INSERT INTO habitacion VALUES("207","1","700","2","2","0",".");
INSERT INTO habitacion VALUES("208","1","700","2","2","0",".");
INSERT INTO habitacion VALUES("209","4","2000","2","8","0","Anturio");
INSERT INTO habitacion VALUES("210","4","2000","2","8","0","Orquidea");
INSERT INTO habitacion VALUES("301","1","700","3","2","0",".");
INSERT INTO habitacion VALUES("302","2","900","3","4","0",".");
INSERT INTO habitacion VALUES("303","2","900","3","4","0",".");
INSERT INTO habitacion VALUES("304","3","1500","3","6","0",".");
INSERT INTO habitacion VALUES("305","4","2000","3","8","0","Girasol");
INSERT INTO habitacion VALUES("306","4","2000","3","8","0","Tulipan");
INSERT INTO habitacion VALUES("401","5","0","4","1","0","No se renta");





CREATE TABLE `pago` (
  `idpago` varchar(250) DEFAULT NULL,
  `concepto` text DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `idcliente` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `reservacion` (
  `idreserva` varchar(250) NOT NULL,
  `no_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `no_habitacion` (`no_habitacion`),
  CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`no_habitacion`) REFERENCES `habitacion` (`no_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO reservacion VALUES("HN-001","101","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HN-002","102","2021-11-14","2021-11-16");





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



