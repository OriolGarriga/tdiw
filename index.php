<!DOCTYPE html>
    <html>
        <head>
            <title>Pàgina Principal</title>
            <link rel="stylesheet" href="/../../css/CSSPantallaPrincipal.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <header>
            <img src="/img/Banner-header.png" class="banner">
            <a href="/inde.php?accio=Registre">Registrar-se</a><br>
            <a href="/inde.php?accio=IniciarSessio">Iniciar sessió</a>
            <a href="/index.php?accio=home" class="fa-solid fa-arrow-left" >CATEGORIES</a>
        </header>
        <?php

        define('BASE_URL', 'https://tdiw-k8.deic-docencia.uab.cat');

        $accio = $_GET['accio'] ?? null;

        switch ($accio) {
            case 'productes':
                include __DIR__.'/mvc/ResourceProductes.php';
                break;
            case 'Registre':
                include __DIR__.'/mvc/ResourceRegistre.php';
                break; 
            case 'IniciarSessio':
                include __DIR__.'/mvc/ResourceIniciarSessio.php';
                break; 
            case 'Detall':
                include __DIR__.'/mvc/Resource.php';
                break;
            default:
                include __DIR__.'/mvc/ResourcePaginaPrincipal.php';
                break;
        }
        ?>