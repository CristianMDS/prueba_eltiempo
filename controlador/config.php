<?php

class config {
    public function conexion(){
        try {
            $pdo = new PDO('mysql: host=127.0.0.1; dbname=catalogo', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}
