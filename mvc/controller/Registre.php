<?php

require_once __DIR__.'/../model/connectaBD.php'; 
require_once __DIR__.'/../model/usuaris.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datos = $_POST;

    $usuarisModel = new UsuarisModel();

    try {
        $usuarisModel->registrarUsuari($datos);
        // Registro exitoso, puedes redirigir a una página de éxito o realizar otras acciones
        //header('Location: /../view/registre_exitos.php');
        exit();
    } catch (Exception $exc) {

        echo json_encode(['ERROR'=> $exc->getMessage()]);
        die();
    }
}

require __DIR__.'/../view/registre.php';
?>

