<?php

require('../modelo/eliminar.php');

if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['id'])){
    
    $id = filter_var(trim($_POST["id"]), FILTER_VALIDATE_INT);
    $obj = new EliminarProducto($id);
    echo $obj->eliminar();

} 


if($_SERVER["REQUEST_METHOD"] == 'DELETE' && isset($_GET['id'])) {
    header('Content-Type: application/json');
    
    $id = filter_var(trim($_GET["id"]), FILTER_VALIDATE_INT);

    $obj = new EliminarProducto($id);
    $obj->eliminar_postman();
}




