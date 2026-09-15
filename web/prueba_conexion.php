<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../lib/lib/conexion.php');

try {
    $conexion = conectar();

    echo "CONEXIÓN EXITOSA";
    echo "<br>";
    echo "PHP está conectado correctamente a PostgreSQL.";
    echo "<br>";
    echo "Base de datos: SIGuppy";
    
} catch (Exception $e) {
    echo " ERROR DE CONEXIÓN";
    echo "<br>";
    echo $e->getMessage();
}