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
            echo "<script>

                let i = confirm('Eliminado correctamente');
                if (i){
                    window.opener.location.reload();
                    window.close();
                }
            
            </script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}