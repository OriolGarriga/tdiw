<?php

class DetallProd
{
    public function getDetallProductes($categoria_id) 
    {
        $connexio = connectaDB::connBD();

        if (!$connexio) 
        {
            throw new Exception("(pg_connect) ".pg_last_error());
        }

        $sql = "SELECT * FROM producte WHERE id = $1";
        
        $result = pg_prepare($connexio, "consulta_productes", $sql);
        $result = pg_execute($connexio, "consulta_productes", array($categoria_id));

        if (!$result) 
        {
            throw new Exception("(pg_query)". pg_last_error());
        }
        
        $productes = pg_fetch_all($result);
        return $productes;
    }
}

?>