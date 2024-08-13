<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function recargar(){
            window.location.reload();
        }
    </script>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        body h1 {
            display: flex;
            justify-content: center;

        }

        .groupButtons {
            display:flex;
            justify-content:center;
        }

        .Crear {
            width: 150px;
            height: 50px;
            font-size: 20px;
            margin-right: 16px;
        }

        .DB {
            width: 150px;
            height: 50px;
            font-size: 20px;
            margin-right: 16px;
        }

        .Probar {
            width: 190px;
            height: 50px;
            font-size: 20px;
        }
        
        .catalogo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .producto {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .producto img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .producto h2 {
            font-size: 1.5em;
            margin: 0 0 10px;
        }

        .producto p {
            margin: 0 0 10px;
        }

        .producto .precio {
            font-size: 1.2em;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    
    <h1> CATALOGO DE PRODUCTOS </h1>

    <div class="groupButtons">
        <button class="Crear">Crear Producto</button>
        <button class="DB">Crear base de datos</button>
        <button class="Probar">Probar Creacion Producto</button>
    </div>

    <div class="catalogo">
        <?php
        
            $pdo = new PDO('mysql: host=127.0.0.1; dbname=catalogo', 'root', '');

            $stmt = $pdo->prepare('SELECT * FROM productos');
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $row) {
                // <img src='producto1.jpg' alt='Producto 1'>
                echo "<div class='producto'>
                        <h2 class='nombre'>" . $row['nombre_producto'] . "</h2>
                        <p>" . $row['descripcion'] . "</p>
                        <p class='precio'>" . $row['precio'] . "</p>
                        <button class='Editar' id='" . $row['id'] . "' onclick='editar(this.id)'>Editar</button>
                        <button class='Eliminar' id='" . $row['id'] . "' onclick='eliminar(this.id)'>Eliminar</button>
                    </div>";
            }
        
        
        
        ?>
    </div>
    <script src="js/funciones.js"></script>
</body>
</html>