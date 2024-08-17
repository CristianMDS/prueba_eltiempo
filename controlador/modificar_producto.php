<?php

require("../modelo/modificar.php");



if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["btn-modificar"])){
    $id = trim($_POST["id"]);
    $nombre = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);
    $descripcion = trim($_POST["descripcion"]);

    if($nombre == '' || $descripcion == '' || $precio == ''){
        echo "<script>
            let f = confirm('deber llenar todos los campos');
            if(f)
                window.history.back();
            </script>";
        return; 
    }

    $modificar = new ModificarProducto($nombre, $precio, $descripcion, $id, 'MODIFICADO');
    $modificar->modificar();

}

if($_SERVER["REQUEST_METHOD"] == 'PUT'){
    header('Content-Type: application/json');

    $id = trim($_GET["id"]);
    $nombre = trim($_GET["nombre"]);
    $precio = trim($_GET["precio"]);
    $descripcion = trim($_GET["descripcion"]);

    $modificar = new ModificarProducto($nombre, $precio, $descripcion, $id, 'MODIFICADO');
    $modificar->modificar_postman();

}
