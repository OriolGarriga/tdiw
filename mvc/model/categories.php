<?php

function ObtenirCategories($connexio) {
    $query = 'SELECT id, nom, "Imatge" FROM categoria';

    $params=[];

    $consulta = pg_query_params($connexio,$query,$params);
    $categ = pg_fetch_all($consulta);

    return $categ;
}

function ObternirIdProductes($connexio, $Id) {
    $query = 'SELECT id, nom, "Imatge", "Preu" FROM producte WHERE category_id = $1';

    $params=[$Id];

    $consulta = pg_query_params($connexio,$query,$params);
    $prod = pg_fetch_all($consulta);

    return $prod;
}
?>