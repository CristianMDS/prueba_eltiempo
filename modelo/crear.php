<?php

    
    

    class CrearProducto {

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

        public function guardar_prueba() {
            require('../config.php');

            try {
                $pdo = new config();
                $pdo = $pdo->conexion();

                $stmt = $pdo->prepare('INSERT INTO productos (nombre_producto, descripcion, precio, estado) 
                                        VALUES (:nombre_producto, :descripcion, :precio, :estado)');
                $stmt->execute([
                    ':nombre_producto' => $this->nombre_producto,
                    ':descripcion' => $this->descripcion,
                    ':precio' => $this->precio,
                    ':estado' => $this->estado
                ]);

                echo "<script>
                    let i = confirm('Producto guardado exitosamente.'); 
                    if(i){
                        window.opener.location.reload();
                        window.close();
                    }
                </script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function guardar() {
            require('../controlador/config.php');
            
            try {
                $pdo = new config();
                $pdo = $pdo->conexion();

                $stmt = $pdo->prepare('INSERT INTO productos (nombre_producto, descripcion, precio, estado) 
                                        VALUES (:nombre_producto, :descripcion, :precio, :estado)');
                $stmt->execute([
                    ':nombre_producto' => $this->nombre_producto,
                    ':descripcion' => $this->descripcion,
                    ':precio' => $this->precio,
                    ':estado' => $this->estado
                ]);


                echo "<script> 
                        let i = confirm('modificado exitosamente'); 
                        (i) ? window.close() : alert('algo raro pasa'); 
                        window.opener.location.reload();  
                    </script>";

            } catch (PDOException $e) {

                echo "Error: " . $e->getMessage();

            }
        }

        public function guardar_postman(){
            require('../controlador/config.php');
            
            try {
                $pdo = new config();
                $pdo = $pdo->conexion();

                $stmt = $pdo->prepare('INSERT INTO productos (nombre_producto, descripcion, precio, estado) 
                                        VALUES (:nombre_producto, :descripcion, :precio, :estado)');
                $stmt->execute([
                    ':nombre_producto' => $this->nombre_producto,
                    ':descripcion' => $this->descripcion,
                    ':precio' => $this->precio,
                    ':estado' => $this->estado
                ]);


                header('HTTP/1.1 200 Ok');
                echo json_encode(["Created" => 'Producto Creado']);

            } catch (PDOException $e) {

                header("HTTP/1.1 404 Error no se creo el producto");
                echo (["Error" => $e->getMessage()]);

            }
        }
    }
?>
