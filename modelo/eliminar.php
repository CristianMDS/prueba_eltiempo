<?php

class EliminarProducto {

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function eliminar() {
        try {            
            require '../controlador/config.php';

            $pdo = new config();
            $pdo = $pdo->conexion();

            $stmt = $pdo->prepare('DELETE FROM productos WHERE id = :id');
            $stmt->execute([
                ':id' => $this->id
            ]);
            return "yes";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function eliminar_postman(){
        try {            
            require '../controlador/config.php';

            $pdo = new config();
            $pdo = $pdo->conexion();

            $stmt = $pdo->prepare('DELETE FROM productos WHERE id = :id');
            $stmt->execute([
                ':id' => $this->id
            ]);

            header("HTTP/1.1 200 OK");
            echo json_encode(["Borrado" => "el producto fue eliminado "]);
            
        } catch (PDOException $e) {

            header("HTTP/1.1 404 Error al eliminar el producto");
            echo (["Error" => $e->getMessage()]);
            
        }
    }


}