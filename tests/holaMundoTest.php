<?php

namespace App\Tests;

use App\HolaMundo;
use PHPUnit\Framework\TestCase;

class HolaMundoTest extends TestCase{
    public function testHolaMundo(){
        $holamundo = new HolaMundo();
        $h = "Hola Mundo!";

        $this->assertEquals($h, $holamundo->saludar());
    }
}
