<?php

require '../modelo/consultar.php';

header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $cons = new Consultar($id);
    $cons->get_Productos();
}