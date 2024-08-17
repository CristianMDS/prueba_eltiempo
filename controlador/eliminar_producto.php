<?php

require('../modelo/eliminar.php');

if($_SERVER["REQUEST_METHOD"] != 'DELETE' && isset($_GET['id'])){
    $id = trim($_GET["id"]);
    $obj = new EliminarProducto($id);
    $obj->eliminar();
} else if($_SERVER["REQUEST_METHOD"] == 'DELETE' && isset($_GET['id'])) {
    header('Content-Type: application/json');
    
    $id = trim($_GET["id"]);

    $obj = new EliminarProducto($id);
    $obj->eliminar_postman();
}




