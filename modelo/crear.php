<?php

    
    

    class CrearProducto {

        private $nombre_producto;
        private $descripcion;
        private $precio;
        private $estado;

        public function __construct($nombre_producto, $descripcion, $precio, $estado) {
            // if($nombre_producto == NULL || $descripcion == NULL || $precio == NULL) throw new Exception("Error, No se puede crear un elemento vacio");
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
    }
?>
