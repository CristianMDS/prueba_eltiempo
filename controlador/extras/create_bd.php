<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1', 'root', '');

    $sql_file = file_get_contents('../../catalogo.sql');

    // $stmt = $pdo->prepare($sql_file);
    $pdo->exec($sql_file);

    echo "<script>window.location.href = '../../index.php';</script>";
} catch (Exception $e) {
    echo "<script>
        let j = confirm('Es posible que esta base de datos ya este creada o intenta cambiar el usu y la pass');
            window.location.href = '../../index.php';
        </script>";
}