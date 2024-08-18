<?php

require("../modelo/modificar.php");



if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["btn-modificar"])){
    $id = filter_var(trim($_POST["id"]), FILTER_VALIDATE_INT);
    $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
    $precio = filter_var(trim($_POST["precio"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $descripcion = filter_var(trim($_POST["descripcion"]), FILTER_SANITIZE_STRING);

    if($nombre == '' || $descripcion == '' || $precio == ''){
        echo "<script>
            let f = confirm('deber llenar todos los campos');
            if(f)
                window.history.back();
            </script>";
        return; 
    }

    $nombre_img = $_FILES['imagen']['name'];
    $nombre_tmp = $_FILES['imagen']['tmp_name'];

    $modificar = new ModificarProducto($nombre, $precio, $descripcion, $id, 'MODIFICADO');
    $modificar->datos_Imagen($nombre_img, $nombre_tmp);
    $modificar->modificar();

}

if($_SERVER["REQUEST_METHOD"] == 'PUT'){
    header('Content-Type: application/json');

    $id = filter_var(trim($_GET["id"]), FILTER_VALIDATE_INT);
    $nombre = filter_var(trim($_GET["nombre"]), FILTER_SANITIZE_STRING);
    $precio = filter_var(trim($_GET["precio"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $descripcion = filter_var(trim($_GET["descripcion"]), FILTER_SANITIZE_STRING);

    parse_str(file_get_contents("php://input"), $_PUT);

    $nombre_img = $_FILES['imagen']['name'];
    $nombre_tmp = $_FILES['imagen']['tmp_name'];
    
    echo var_dump($nombre_img);

    return;

    $modificar = new ModificarProducto($nombre, $precio, $descripcion, $id, 'MODIFICADO');
    $modificar->modificar_postman();

}
