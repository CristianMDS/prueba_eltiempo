<?php

require('../modelo/eliminar.php');

$pdo = new PDO('mysql: host= 127.0.0.1; dbname = catalogo', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = trim($_GET["id"]);

$obj = new EliminarProducto($id);
$obj->eliminar();



