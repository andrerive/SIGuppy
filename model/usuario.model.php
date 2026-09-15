<?php
/**
 * usuario.model.php
 * -------------------
 * Aquí SOLO ponemos funciones que hablan con la tabla "usuario".
 * Ninguna de estas funciones muestra HTML, solo entregan datos.
 * Esto se llama "Modelo" en el patrón MVC.
 */

// 1) Trae TODOS los usuarios, junto con el nombre de su rol.
//    Recibe la conexión ($con) que ya viene de conectar() en conexion.php
function obtenerUsuarios($con) {

    // Usamos INNER JOIN para "pegar" la tabla usuario con la tabla rol,
    // porque en usuario solo guardamos el id_rol (un número),
    // y necesitamos el nombre_rol (el texto) para mostrarlo.
    $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.correo, u.estado, r.nombre_rol
            FROM usuario u
            INNER JOIN rol r ON u.id_rol = r.id_rol
            ORDER BY u.id_usuario";

    // Ejecutamos la consulta
    $resultado = $con->query($sql);

    // Devolvemos todas las filas como un arreglo (igual de fácil de recorrer
    // que el $usuariosEjemplo que usábamos antes)
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}


// 2) Trae TODOS los roles (para llenar el <select> del formulario)
function obtenerRoles($con) {
    $sql = "SELECT id_rol, nombre_rol FROM rol ORDER BY nombre_rol";
    $resultado = $con->query($sql);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}


// 3) Crea un usuario nuevo
//    Recibe la conexión y un arreglo con los datos del formulario
function crearUsuario($con, $datos) {

    $sql = "INSERT INTO usuario (id_tipodocumento, id_rol, nombre, apellido, correo, contrasena)
            VALUES (:id_tipodocumento, :id_rol, :nombre, :apellido, :correo, :contrasena)";

    // Preparamos la consulta (esto evita inyección SQL, es más seguro)
    $consulta = $con->prepare($sql);

    // Ojo: la contraseña la protegemos con password_hash(), NUNCA se guarda en texto plano
    $consulta->execute([
        ':id_tipodocumento' => $datos['id_tipodocumento'],
        ':id_rol'           => $datos['id_rol'],
        ':nombre'           => $datos['nombre'],
        ':apellido'         => $datos['apellido'],
        ':correo'           => $datos['correo'],
        ':contrasena'       => password_hash($datos['contrasena'], PASSWORD_DEFAULT),
    ]);
}


// 4) Cambia el estado de un usuario (Activo <-> Inactivo)
function cambiarEstadoUsuario($con, $id_usuario, $nuevoEstado) {
    $sql = "UPDATE usuario SET estado = :estado WHERE id_usuario = :id";
    $consulta = $con->prepare($sql);
    $consulta->execute([
        ':estado' => $nuevoEstado,
        ':id'     => $id_usuario,
    ]);
}


// 5) Cambia el rol de un usuario
function cambiarRolUsuario($con, $id_usuario, $id_rol) {
    $sql = "UPDATE usuario SET id_rol = :id_rol WHERE id_usuario = :id";
    $consulta = $con->prepare($sql);
    $consulta->execute([
        ':id_rol' => $id_rol,
        ':id'     => $id_usuario,
    ]);
}