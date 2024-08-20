<?php

    namespace App;

    use App\Config;

    class Crear {

        private $nombre_producto;
        private $descripcion;
        private $precio;
        private $estado;

        public function __construct($nombre_producto, $descripcion, $precio, $estado) {
            $this->nombre_producto = $nombre_producto;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->estado = $estado;
        }

        public function crearProductoPrueba(){

            $pdo = new Config('mysql: host=127.0.0.1; dbname=catalogo', 'root','');
            $pdo = $pdo->getConnection();

            $stmt = $pdo->prepare('INSERT INTO productos (nombre_producto, descripcion, precio, estado) 
                            VALUES (:nombre, :descripcion, :precio, :estado)');
                $stmt->bindValue(":nombre", $this->nombre_producto);
                $stmt->bindValue(":descripcion", $this->descripcion);
                $stmt->bindValue(":precio", $this->precio);
                $stmt->bindValue(":estado", $this->estado);
            
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }


        }

    }
?>
