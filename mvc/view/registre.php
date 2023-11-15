<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>
<body>

<form action="mvc/controller/Registre.php" method="post">

<?php
require_once __DIR__.'/../model/connectaBD.php'; 
$columnas = obtenerColumnas('usuari');


foreach ($columnas as $columna) {
    if ($columna !== 'id') {
        echo "<label for=\"$columna\">$columna:</label>";
        if($columna == 'Password'){
            echo "<input type=\"password\" id=\"$columna\" name=\"$columna\" required><br>";
        }
        else{
            echo "<input type=\"text\" id=\"$columna\" name=\"$columna\" required><br>";
        }
    }
}

?>

<button type="submit">Registrar-se</button>

</form>

<?php
require_once __DIR__.'/../model/connectaBD.php';

function obtenerColumnas() {
    $connexio = connectaDB::connBD();

    if (!$connexio) {
        die('Error de conexión a la base de datos');
    }

    $tabla = 'usuari';  // Asegúrate de especificar la tabla correcta aquí

    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = $1 ";
    
    $result = pg_query_params($connexio, $sql, array($tabla));

    if (!$result) {
        die('Error al ejecutar la consulta para obtener columnas: ' . pg_last_error($connexio));
    }

    $columnas = pg_fetch_all_columns($result);
    return $columnas;
}

?>

</body>
</html>
