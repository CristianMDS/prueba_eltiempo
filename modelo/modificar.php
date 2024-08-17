<?php

require '../controlador/config.php';

class ModificarProducto {


    private $nombre;
    private $precio;
    private $descripcion;
    private $id;
    private $estado;

    public function __construct($nombre, $precio, $descripcion, $id, $estado){
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->id = $id;
        $this->estado = $estado;
    }

    public function modificar(){
        try {            

            $pdo = new config();
            $pdo = $pdo->conexion();

            $stmt = $pdo->prepare('UPDATE productos 
                                    SET nombre_producto = :nombre, precio = :precio, 
                                        descripcion = :descripcion, estado = :estado 
                                    WHERE id = :id');
            $stmt->execute([
                ":nombre" => $this->nombre,
                ":precio" => $this->precio,
                ":descripcion" => $this->descripcion,
                ":id" => $this->id,
                ":estado" => $this->estado
            ]);

            echo "<script> 
                let i = confirm('modificado exitosamente'); 
                (i) ? window.close() : alert('algo raro pasa');
                window.opener.location.reload();
            </script>";

        } catch (PDOException $error_pdo) {
            echo "Error PDO: ".$error_pdo->getMessage()."<br><br>";
        }
    }

    public function modificar_postman(){
        try {            

            $pdo = new config();
            $pdo = $pdo->conexion();

            $stmt = $pdo->prepare('UPDATE productos 
                                    SET nombre_producto = :nombre, precio = :precio, 
                                        descripcion = :descripcion, estado = :estado 
                                    WHERE id = :id');
            $stmt->execute([
                ":nombre" => $this->nombre,
                ":precio" => $this->precio,
                ":descripcion" => $this->descripcion,
                ":id" => $this->id,
                ":estado" => $this->estado
            ]);

            header("HTTP/1.1 200 OK");

            echo json_encode(["message" => "Producto modificado"]);

        } catch (PDOException $error_pdo) {
            header("HTTP/1.1 404 Error al modificar producto");

            echo json_encode(["Error" => $error_pdo->getMessage()]);
        }
    }


}
