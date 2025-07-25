<?php

namespace App\Tests;

use App\Crear;
use PHPUnit\Framework\TestCase;

class CrearTest extends TestCase {
    public function testCrearUnRegistroDeUnProducto(){

        $nombre = "Producto PHPUnit";
        $descripcion = "Esto es un producto de prueba para PHPUnit";
        $precio = 1.99;
        $estado = "PHPUnit";

        $producto = new Crear($nombre, $descripcion, $precio, $estado);
        
        $this->assertTrue($producto->crearProductoPrueba(), true);
    }
}