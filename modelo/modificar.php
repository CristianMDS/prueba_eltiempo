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
            $pdo = new PDO('mysql: host=127.0.0.1; dbname=catalogo', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
