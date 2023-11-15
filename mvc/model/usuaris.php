<?php

class UsuarisModel
{
    public function registrarUsuari($datos)
    {
        $connexio = connectaDB::connBD();

        if (!$connexio) {
            throw new Exception("(pg_connect) " .pg_last_error());
        }

        $datos['Password'] = password_hash($datos['Password'], PASSWORD_BCRYPT);

        $columnas = implode('", "', array_keys($datos));
        $placeholders = implode(', ', array_map(function ($columna) {
            return ":$columna";
        }, array_keys($datos)));

        $sql = "INSERT INTO usuari (\"$columnas\") VALUES ($placeholders) RETURNING id";

        $params = [];
        foreach ($datos as $columna => $valor) {
            if ($columna !== 'id') {
                $params[":$columna"] = is_numeric($valor) ? (int)$valor : $valor;
            }
        }

        foreach ($params as $placeholder => $valor) {
            $sql = str_replace($placeholder, pg_escape_literal($valor), $sql);
        }

        $result = pg_query($connexio, $sql);

        if (!$result) {
            throw new Exception("(pg_query)" . pg_last_error());
        }

        return true;
    }

    public function verificarCredenciales($email, $password)
    {
        $connexio = connectaDB::connBD();

        if (!$connexio) {
            throw new Exception("(pg_connect) ".pg_last_error());
        }

        $sql = "SELECT * FROM usuari WHERE email = $1 AND password = $2";
        $result = pg_query_params($connexio, $sql, array($email, $password));

        if (!$result) {
            throw new Exception("(pg_query)". pg_last_error());
        }

        return pg_num_rows($result) > 0;
    }
}

?>
