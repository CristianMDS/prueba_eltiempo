<?php

require("../modelo/crear.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['valor'];
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
}