

CREATE TABLE `cliente` (
  `idcliente` varchar(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente VALUES("HN-20da","Hugo Rafael","Rosales Meléndez","Tuxtla Chico","20");
INSERT INTO cliente VALUES("HN-47ea","Saul","Altuzar","Tapachula","19");
INSERT INTO cliente VALUES("HN-84da","Lucia","Sanchez","Cacahoatan","19");
INSERT INTO cliente VALUES("HN-9e0a","Carlos Alberto","Martinez Bonilla","Tapachula","20");
INSERT INTO cliente VALUES("HN-a5b7","Jilmar Joancy","Perello Solorio","Tapachula","20");





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
INSERT INTO habitacion VALUES("105","1","900","1","2","1",".");
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
  `idpago` varchar(250) NOT NULL,
  `concepto` text DEFAULT NULL,
  `dias` varchar(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `idcliente` varchar(250) DEFAULT NULL,
  `no_habitacion` int(11) NOT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pago VALUES("1115765751","Reservacion","3","2021-11-19","2100","HN-20da","101");
INSERT INTO pago VALUES("1232328379","Reservacion","4","2021-11-20","3600","HN-47ea","102");
INSERT INTO pago VALUES("2034135450","Reservacion","3","2021-11-17","2100","HN-20da","101");
INSERT INTO pago VALUES("2103633424","Reservacion","3","2021-11-17","2700","HN-84da","103");
INSERT INTO pago VALUES("706743629","Reservacion","3","2021-11-18","2700","HN-84da","105");





CREATE TABLE `reservacion` (
  `idreserva` varchar(250) NOT NULL,
  `no_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `no_habitacion` (`no_habitacion`),
  CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`no_habitacion`) REFERENCES `habitacion` (`no_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO reservacion VALUES("HNR-020d","301","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-0c54","302","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-265e","102","2021-11-17","2021-11-20");
INSERT INTO reservacion VALUES("HNR-2da2","107","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-417a","206","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-6051","108","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-6cf2","104","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-6e84","306","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7679","210","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7b29","304","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7e54","103","2021-11-15","2021-11-17");
INSERT INTO reservacion VALUES("HNR-8e39","205","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-9b88","209","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-a79b","204","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-aa45","105","2021-11-16","2021-11-18");
INSERT INTO reservacion VALUES("HNR-b38b","208","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-b97d","303","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-c626","203","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-c7c7","201","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-d782","305","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-dbf9","202","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-e5dd","207","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-e968","401","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-f47e","106","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-f6cc","101","2021-11-17","2021-11-19");





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

INSERT INTO usuario VALUES("1","hotelnorma","13a2c638f5e1795965d922cc93a2ecab1d9f818f5183b488184f9e23d0759f59","Norma ","Sanchez Cabrera","9621605433","Laureles 2","hugo.rosales98@unach.mx","1","");
INSERT INTO usuario VALUES("6","Romz","8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92","Hugo","Rosales","9621705041","fdsafsd","carlitos1@hotmail.com","1","cbb44d6ac12939fdee18-7010fe7ba5b075afb4f6-dcb366d5180c293efa77-761f94b8b443d2059f85");



