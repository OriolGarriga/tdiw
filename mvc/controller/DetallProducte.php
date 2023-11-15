<?php

require_once __DIR__.'/../mvc/connectaBD.php';
require_once __DIR__.'/../mvc/detallProd.php';

$ID = $_GET['id'] ?? null;

$detallPr = new DetallProd();

try {
    $detall = $detallPr->getDetallProductes($ID);

    echo json_encode($detall);
}catch (Exception $exc) {
    echo json_encode(['ERROR'=> $exc->getMessage()]);
}

require __DIR__.'/../view/llistatProductes.php';
?>
