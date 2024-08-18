
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <h1> CATALOGO DE PRODUCTOS </h1>

    <div class="groupButtons">
        <button class="Crear">Crear Producto</button>
        <button class="Probar">Probar Creacion Producto</button>
    </div>

    <div class="catalogo">
        <?php
        
            require './controlador/config.php';
            require './modelo/imagenes.php';

            $pdo = new config();
            $pdo = $pdo->conexion();

            $stmt = $pdo->prepare('SELECT * FROM productos');
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $row) {
                
                $img = new TraerImagen();
                $imagen = $img->get_Imagen($row["id"], $pdo);

                if ($imagen != 'vacio'){
                    $html = "<img src='./img/".$imagen."' alt='".$imagen."'>";
                } else if($imagen == 'vacio') {
                    $html = "<p> NO CUENTA CON IMAGEN </p>";
                }

                echo "<div class='producto'>
                        ".$html."
                        <h2 class='nombre'>" . $row['nombre_producto'] . "</h2>
                        <h3 class='subtitulo'> Codigo: ". $row['id'] ."</h3>
                        <p>" . $row['descripcion'] . "</p>
                        <p class='precio'> <b>$ </b>" . $row['precio'] . "</p>
                        <button class='Editar' id='" . $row['id'] . "' onclick='editar(this.id)'>Editar</button>
                        <button class='Eliminar' id='" . $row['id'] . "' onclick='eliminar(this.id)'>Eliminar</button>
                    </div>";
            }            
        
        ?>
    </div>
    <script src="js/funciones.js"></script>
</body>
</html>
