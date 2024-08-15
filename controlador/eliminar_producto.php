<?php

require('../modelo/eliminar.php');

$id = trim($_GET["id"]);

$obj = new EliminarProducto($id);
$obj->eliminar();



