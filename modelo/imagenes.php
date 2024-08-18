<?php

class SubirImagen {

    private $nombre;
    private $ruta;
    private $id;
    private $nombre_tmp;
    private $pdo;

    public function __construct($nombre, $nombre_tmp, $ruta, $id, $pdo){
        $this->nombre = $nombre;
        $this->nombre_tmp = $nombre_tmp;
        $this->ruta = $ruta;
        $this->id = $id;
        $this->pdo = $pdo;
    }

    public function set_Imagen(){
        try {

            $pdo = $this->pdo;

            $stmt = $pdo->prepare('INSERT INTO imagenes (nombre_img, ruta, id_producto) VALUES (:nombre, :ruta, :id_producto) ');
                $stmt->bindValue(":nombre", $this->nombre);
                $stmt->bindValue(":ruta", $this->ruta);
                $stmt->bindValue(":id_producto", $this->id);
            $stmt->execute();

            $nombre = $this->nombre;
            $tmp = $this->nombre_tmp;
            $ruta = $this->ruta.basename($nombre);
            $id = $this->id;

            if (move_uploaded_file($tmp, $ruta)) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }

    }

}

class TraerImagen {
    public function get_Imagen($id_get, $pdo){
        if($id_get != '' && $id_get != NULL){
            $stmt_2 = $pdo->prepare('SELECT nombre_img FROM imagenes WHERE id_producto = :id_producto');
                $stmt_2->bindValue(":id_producto", $id_get);
            $stmt_2->execute();

            $resp = $stmt_2->fetchAll(PDO::FETCH_ASSOC);

            $nombre_img = '';

            foreach ($resp as $row2) {
                $nombre_img = $row2["nombre_img"];
            }

            if($nombre_img != '')
                return $nombre_img;
            else if ($nombre_img == '' || $nombre_img == NULL)
                return 'vacio';
        } 
    }
}

class ActualizarImagen {
    private $nombre;
    private $ruta;
    private $id;
    private $nombre_tmp;
    private $pdo;

    public function __construct($nombre, $nombre_tmp, $ruta, $id, $pdo){
        $this->nombre = $nombre;
        $this->nombre_tmp = $nombre_tmp;
        $this->ruta = $ruta;
        $this->id = $id;
        $this->pdo = $pdo;
    }

    public function update_Imagen(){
        try {

            $pdo = $this->pdo;

            $stmt = $pdo->prepare('SELECT COUNT(*) AS cantidad FROM imagenes WHERE id_producto = :id_producto');
                $stmt->bindValue(":id_producto", $this->id);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($res as $row) {
                $cantidad = $row['cantidad'];
            }

            if($cantidad >= 1){
                $stmt = $pdo->prepare('UPDATE imagenes SET nombre_img = :nombre, ruta = :ruta WHERE id_producto = :id_producto');
                    $stmt->bindValue(":nombre", $this->nombre);
                    $stmt->bindValue(":ruta", $this->ruta);
                    $stmt->bindValue(":id_producto", $this->id);
                $stmt->execute();
            } else if($cantidad <= 0){
                $stmt = $pdo->prepare('INSERT INTO imagenes (nombre_img, ruta, id_producto) VALUES (:nombre, :ruta, :id_producto)');
                    $stmt->bindValue(":nombre", $this->nombre);
                    $stmt->bindValue(":ruta", $this->ruta);
                    $stmt->bindValue(":id_producto", $this->id);
                $stmt->execute();
            }

            $nombre = $this->nombre;
            $tmp = $this->nombre_tmp;
            $ruta = $this->ruta.basename($nombre);
            $id = $this->id;

            if (move_uploaded_file($tmp, $ruta)) {
                return true;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
}