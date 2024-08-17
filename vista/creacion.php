<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio CRUD</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        body h1{
            display:flex;
            justify-content: center;
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
    <h1>CREAR PRODUCTO</h1>
    <div class="catalogo">

            <br><br>
            <form action="../controlador/crear_producto.php" method="POST">
                <label>
                    Nombre del producto: <br>
                    <input type="text" placeholder="Ingrese un nombre..." name="nombre" id="nombre" require="require"/>
                </label>
                <br>
                <label>
                    Descripcion: <br>
                    <textarea name="descripcion" id="descripcion" placeholder="Ingresa la descripcion..." require="require"></textarea>
                </label>
                <br>
                <label>
                    Precio: <br>
                    <input type="number" placeholder="Ingrese un precio..." name="precio" id="precio" step="0.01" require="require"/>
                </label> <br><br>

                <input type="submit" value="Crear" name="btn-crear">
            </form>
    </div>
</body>
</html>