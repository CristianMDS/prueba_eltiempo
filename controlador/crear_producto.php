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

    $nombre_img = $_FILES['imagen']['name'];
    $nombre_tmp = $_FILES['imagen']['tmp_name'];

    $producto = new CrearProducto($nombre_producto, $descripcion, $precio, $estado);
    $producto->datos_Imagen($nombre_img, $nombre_tmp);
    $producto->guardar();

} else if($_SERVER["REQUEST_METHOD"] == 'POST') {

    header('Content-Type: application/json');

    $nombre_producto = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $estado = 'Creado';

    $nombre_img = $_FILES['imagen']['name'];
    $nombre_tmp = $_FILES['imagen']['tmp_name'];

    $producto = new CrearProducto($nombre_producto, $descripcion, $precio, $estado);
    $producto->datos_Imagen($nombre_img, $nombre_tmp);
    $producto->guardar_postman();
    
}
