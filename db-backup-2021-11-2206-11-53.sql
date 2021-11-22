

CREATE TABLE `cliente` (
  `idcliente` varchar(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente VALUES("HN-20da","Hugo Rafael","Rosales Meléndez","Tuxtla Chico","21");
INSERT INTO cliente VALUES("HN-47ea","Saul","Altuzar","Tapachula","19");
INSERT INTO cliente VALUES("HN-76ea","rosy","lop","centro","0");
INSERT INTO cliente VALUES("HN-84da","Lucia","Sanchez","Cacahoatan","19");
INSERT INTO cliente VALUES("HN-8b3f","Ana","Rosales","Tuxtla Chico","25");
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

INSERT INTO habitacion VALUES("101","1","700","1","2","1",".");
INSERT INTO habitacion VALUES("102","2","900","1","4","0",".");
INSERT INTO habitacion VALUES("103","2","900","1","4","0",".");
INSERT INTO habitacion VALUES("104","3","1500","1","6","0",".");
INSERT INTO habitacion VALUES("105","1","900","1","2","0",".");
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
  `n` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idpago` varchar(250) NOT NULL,
  `concepto` text DEFAULT NULL,
  `dias` varchar(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `idcliente` varchar(250) NOT NULL,
  `no_habitacion` int(11) NOT NULL,
  `idreserva` varchar(11) NOT NULL,
  PRIMARY KEY (`idpago`),
  UNIQUE KEY `n` (`n`),
  KEY `idcliente` (`idcliente`),
  KEY `idreserva` (`idreserva`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idreserva`) REFERENCES `reservacion` (`idreserva`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO pago VALUES("28","133314474","Reservacion","8","2021-11-29","7200","HN-8b3f","105","HNR-aa45");
INSERT INTO pago VALUES("32","1429693236","Reservacion","5","2021-12-27","3500","HN-76ea","101","HNR-f6cc");
INSERT INTO pago VALUES("22","1446334566","Reservacion","4","2021-11-25","3600","HN-47ea","102","HNR-265e");
INSERT INTO pago VALUES("17","1505493197","Reservacion","4","2021-11-25","3600","HN-76ea","202","HNR-dbf9");
INSERT INTO pago VALUES("15","1638070715","Reservacion","2","2021-11-23","1400","HN-20da","101","HNR-f6cc");
INSERT INTO pago VALUES("31","1644719312","Reservacion","2","2021-11-23","1400","HN-76ea","101","HNR-f6cc");
INSERT INTO pago VALUES("16","1745847122","Reservacion","3","2021-11-24","2100","HN-84da","106","HNR-f47e");
INSERT INTO pago VALUES("19","1954475264","Reservacion","5","2021-11-26","3500","HN-a5b7","106","HNR-f47e");
INSERT INTO pago VALUES("20","2072275543","Reservacion","5","2021-11-26","3500","HN-8b3f","101","HNR-f6cc");
INSERT INTO pago VALUES("18","2133111797","Reservacion","5","2021-11-26","3500","HN-9e0a","101","HNR-f6cc");
INSERT INTO pago VALUES("23","321476852","Reservacion","4","2021-11-25","6000","HN-20da","104","HNR-6cf2");
INSERT INTO pago VALUES("34","534191894","Reservacion","7","2021-12-07","6300","HN-76ea","103","HNR-7e54");
INSERT INTO pago VALUES("21","79251837","Reservacion","3","2021-11-24","2700","HN-47ea","103","HNR-7e54");





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
INSERT INTO reservacion VALUES("HNR-265e","102","2021-11-22","2021-11-25");
INSERT INTO reservacion VALUES("HNR-2da2","107","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-417a","206","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-6051","108","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-6cf2","104","2021-11-22","2021-11-25");
INSERT INTO reservacion VALUES("HNR-6e84","306","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7679","210","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7b29","304","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-7e54","103","2021-11-22","2021-12-07");
INSERT INTO reservacion VALUES("HNR-8e39","205","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-9b88","209","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-a79b","204","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-aa45","105","2021-11-22","2021-11-29");
INSERT INTO reservacion VALUES("HNR-b38b","208","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-b97d","303","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-c626","203","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-c7c7","201","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-d782","305","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-dbf9","202","2021-11-22","2021-11-25");
INSERT INTO reservacion VALUES("HNR-e5dd","207","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-e968","401","0000-00-00","0000-00-00");
INSERT INTO reservacion VALUES("HNR-f47e","106","2021-11-22","2021-11-26");
INSERT INTO reservacion VALUES("HNR-f6cc","101","2021-11-22","2021-12-27");





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

INSERT INTO usuario VALUES("1","hotelnorma","8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92","Norma ","Sanchez Cabrera","9621605433","Laureles 2","hugo.rosales98@unach.mx","1","9619eb8b82b269140bcc-747ee426b20b8d54947e-1fff08a0c2207389c423-fdbd2e18659f63928863");
INSERT INTO usuario VALUES("6","Romz","8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92","Hugo","Rosales","9621705041","fdsafsd","carlitos1@hotmail.com","1","cbb44d6ac12939fdee18-7010fe7ba5b075afb4f6-dcb366d5180c293efa77-761f94b8b443d2059f85");



