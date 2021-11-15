<?php 
	
	//define("BASE_URL", "http://localhost/tienda_virtual/");
	const BASE_URL = "http://localhost/hotelnorma/";

	//Zona horaria
	date_default_timezone_set('America/Mexico_City');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "hotel_norma";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "charset=utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";


	//Simbolo de moneda
	const SMONEY = "$";


	//Datos envio de correo
	const NOMBRE_REMITENTE = "Hotel Norma";
	const EMAIL_REMITENTE = "rosalesrafael1@hotmail.com";
	const NOMBRE_EMPRESA = "Hotel Norma";

 ?>