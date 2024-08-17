<?php

require("../modelo/crear.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btn-crear"])) {
    $nombre_producto = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $estado = 'Creado';

    if($nombre_producto == '' || $descripcion == '' || $precio == ''){
        echo "<script>
            let f = confirm('deber llenar todos los campos');
            if(f)
                window.history.back();
            </script>";
        return; 
    }

    $producto = new CrearProducto($nombre_producto, $descripcion, $precio, $estado);
    $producto->guardar();

} elseif($_SERVER["REQUEST_METHOD"] == 'POST') {

    header('Content-Type: application/json');

    $nombre_producto = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $estado = 'Creado';

    $producto = new CrearProducto($nombre_producto, $descripcion, $precio, $estado);
    $producto->guardar_postman();
    
}
