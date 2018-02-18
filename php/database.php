<?php

define('SERVERMYSQL', 'tienda');
define('ADDRES_SERVER','localhost');

define('USER',  'root');
define('PASS',  '123456');

define ('RAIZ_WEB', realpath(dirname(__FILE__)));

define('TABLA_FAMILIA', 'familia');
define('COLUMNAS_FAMILIA', 'NOMBRE, DESCRIPCION');

define('TABLA_SUBFAMILIA', 'subfamilia');
define('COLUMNAS_SUBFAMILIA', 'NOMBRE, DESCRIPCION, IDFAMILIA');

define('TABLA_LINEA', 'lineas');

define('TABLA_USUARIO', 'usuario');
define('COLUMNAS_USUARIO', 'USUARIO, NOMBRE, APELLIDOS, EMAIL, PASSWORD, DIRECCION, PROVINCIA');

define('TABLA_ARTICULO', 'articulos');
define('COLUMNAS_ARTICULO', 'NOMBRE, FOTO, DESCRIPCION, PRECIO, STOCK, IDSUBFAMILIA');




?>
