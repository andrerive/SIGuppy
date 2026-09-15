<?php

function conectar() {
    $host = 'localhost';
    $puerto = '5432';
    $baseDatos = 'SIGuppy';
    $usuario = 'postgres';
    $password = 'sigcetv123'; 

    try {
        $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$baseDatos", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}