<?php
    class CrearProducto {

        private $nombre_producto;
        private $descripcion;
        private $precio;
        private $estado;
        private $nombre_archivo;
        private $nombre_tmp;

        public function __construct($nombre_producto, $descripcion, $precio, $estado) {
            $this->nombre_producto = $nombre_producto;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->estado = $estado;
        }
        
        public function datos_Imagen($nombre_archivo, $nombre_tmp){
            $this->nombre_archivo = $nombre_archivo;
            $this->nombre_tmp = $nombre_tmp;
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
            require_once('../controlador/config.php');
            require '../modelo/imagenes.php';
            
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

                $stmt = $pdo->prepare('SELECT MAX(id) AS id FROM productos');
                $stmt->execute();

                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($res as $row) {
                    $id = trim($row["id"]);
                }

                $ruta = "../img/";
                $nombre_archivo = $this->nombre_archivo;
                $nombre_tmp = $this->nombre_tmp;

                if(!is_dir($ruta)){
                    mkdir($ruta);
                }

                $new_img = new SubirImagen($nombre_archivo, $nombre_tmp, $ruta, $id, $pdo);
                $new_img->set_Imagen();

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
            require '../modelo/imagenes.php';
            
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

                $stmt = $pdo->prepare('SELECT MAX(id) AS id FROM productos');
                $stmt->execute();

                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($res as $row) {
                    $id = trim($row["id"]);
                }

                $ruta = "../img/";
                $nombre_archivo = $this->nombre_archivo;
                $nombre_tmp = $this->nombre_tmp;

                if(!is_dir($ruta)){
                    mkdir($ruta);
                }

                $new_img = new SubirImagen($nombre_archivo, $nombre_tmp, $ruta, $id, $pdo);
                $new_img->set_Imagen();

                header('HTTP/1.1 200 Ok');
                echo json_encode(["Created" => 'Producto Creado']);

            } catch (PDOException $e) {

                header("HTTP/1.1 404 Error no se creo el producto");
                echo (["Error" => $e->getMessage()]);

            }
        }
    }
?>
