<?php

require '../modelo/consultar.php';

header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $id = $_GET['id'];

    $cons = new Consultar($id);
    $cons->get_Productos();
}