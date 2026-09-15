<?php

/**
 * resolve()
 * Lee el módulo pedido por la URL (?modulo=...) y carga
 * el controlador correspondiente desde la carpeta controller/.
 * Si el controlador no existe, muestra un mensaje de error.
 */
function resolve() {
    $modulo = $_GET['modulo'];

    // Evita que alguien intente cargar archivos fuera de controller/ (ej: ?modulo=../../algo)
    $modulo = basename($modulo);

    $rutaControlador = "../controller/{$modulo}.controller.php";

    if (file_exists($rutaControlador)) {
        include_once $rutaControlador;
    } else {
        echo "<div class='alert alert-danger'>El módulo '{$modulo}' no existe.</div>";
    }
}
