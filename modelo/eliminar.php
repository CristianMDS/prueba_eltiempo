<?php

class EliminarProducto {

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function eliminar() {
        try {
            $pdo = new PDO('mysql: host=127.0.0.1; dbname=catalogo', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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