<?php

class connectaDB
{
    public static function connBD(){
        $databaseName = 'tdiw-k8';
        $databaseUser = 'tdiw-k8';
        $databasePassword = '7YrTDgDf';
        $databaseHost = '127.0.0.1';
        $port = "5432";

    
        $conn = pg_connect("host=$databaseHost port=$port dbname=$databaseName user=$databaseUser password=$databasePassword");
    
        return $conn;
    }
    
}
?>