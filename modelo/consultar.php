<?php

require_once '../controlador/config.php';

class Consultar {

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function get_Productos(){
        try {

            $pdo = new config();
            $pdo = $pdo->conexion();

            $id = $this->id;

            if($id == ''){
                $stmt = $pdo->prepare('SELECT * FROM productos');
                $stmt->execute();

                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                header("HTTP/1.1 200 Todo ok");
                echo json_encode($res);
            } else {
                $stmt = $pdo->prepare('SELECT * FROM productos WHERE id = :id');
                    $stmt->bindValue(":id", $id);
                $stmt->execute();

                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                header("HTTP/1.1 200 Todo ok pero con un solo ID");
                echo json_encode($res);
            }

            
        } catch (PDOException $e) {
            
            header("HTTP/1.1 404 Error al consultar datos");
            echo json_encode(["Error" => $e.getMessage()]);

        }
    }
}