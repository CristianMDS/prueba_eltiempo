<?php

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
            require '../controlador/config.php';

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
                    let i = confirm('Producto Modificado EXITOSAMENTE');
                    if (i){
                        window.opener.location.reload();
                        window.close();
                    }
                </script>";
        } catch (PDOException $error_pdo) {
            echo "Error PDO: ".$error_pdo->getMessage()."<br><br>";
        }
    }

}
