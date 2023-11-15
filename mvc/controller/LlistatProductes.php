<?php

require_once __DIR__.'/../model/connectaBD.php'; 

$connexio = connectaDB::connBD();

require_once __DIR__.'/../model/categories.php';

$categories = ObtenirCategories($connexio); 

$Id = $_GET['Id'];
$prod = ObternirIdProductes($connexio, $Id);

require __DIR__.'/../view/pantallaInici.php';

?>