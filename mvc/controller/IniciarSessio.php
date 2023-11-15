<?php

require_once __DIR__.'/../model/connectaBD.php';
require_once __DIR__.'/../model/usuaris.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuarisModel = new UsuarisModel();

    try {
        if ($usuarisModel->verificarCredenciales($email, $password)) {
            //header('Location: inicio_exitoso.php');
            include __DIR__.'/mvc/ResourcePaginaPrincipal.php';
            //exit();
        } else {
            echo "Usuari no registrat. Verifica els tus credencials.";
        }
    } catch (Exception $exc) {
        // Manejar el error, mostrar mensajes específicos si es necesario
        echo "Error: " . $exc->getMessage();
        die();
    }
}

// Incluir la vista de inicio de sesión
require __DIR__.'/../view/inici_sesio.php';
?>
