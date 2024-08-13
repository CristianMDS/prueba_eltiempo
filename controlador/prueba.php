<?php

require('../modelo/crear.php');

$nombre = "Producto de Prueba";
$precio = 1.99;
$descripcion = "Es un producto de 1 dolar con 99 centavos";
$estado = "PRUEBA";

$producto = new CrearProducto($nombre, $descripcion, $precio, $estado);
$producto->guardar();

echo "<script>window.location.href = '../index.php';</script>";