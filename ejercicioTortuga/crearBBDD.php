<?php

//Sergio Cejudo Barrado Grupo 1

$dsn = "mysql:host=db";
$usuarioBD = "alumnado";
$claveBD = "alumnado";

//CREACION BASE DE DATOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "CREATE DATABASE IF NOT EXISTS logoBBDD";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
}


$dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
$usuarioBD = "alumnado";
$claveBD = "alumnado";


//CREACION TABLA USUARIOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id_user INT AUTO_INCREMENT,
        perfil VARCHAR(50),
        nombre VARCHAR(255),
        pass VARCHAR(255),
        descripcion VARCHAR(255),
        activo BOOLEAN,
        PRIMARY KEY (id_user)
        )";

    $resultadoObtener = $bd->query($sql);
} catch (PDOException $e) {

}

$dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
$usuarioBD = "root"; //usuarioBD es root porque sino no hace foreign keys
$claveBD = "alumnado";


//CREACION TABLA COMANDOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql = "CREATE TABLE IF NOT EXISTS comandos (
        id INT AUTO_INCREMENT,
        comando VARCHAR(255),
        valor VARCHAR(50),
        id_user INT, 
        fecha VARCHAR(90),
        sesion VARCHAR(300),
        PRIMARY KEY (id),
        FOREIGN KEY (id_user) REFERENCES usuarios(id_user)
        )";

    $resultadoObtener = $bd->query($sql);
} catch (PDOException $e) {

}

$dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
$usuarioBD = "alumnado";
$claveBD = "alumnado";

//insertar usuario default

try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "INSERT INTO usuarios (id_user, perfil, nombre, pass, descripcion, activo) VALUES
        (
            1, 'prof', 'Profesor', 'Profesor', 'Profesor de TIC', true
        )
        -- ,
        -- (
        --     2, 'alum', 'Alumno', 'Alumno', 'Alumno de TIC', true
        -- )
        ";//habria que pasar variables de sesion
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {

}

// $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
// $usuarioBD = "alumnado";
// $claveBD = "alumnado";
// $fecha = date('Y')."-".date('n')."-".date('t')." ".date('H').":".date('i').":".date('s');


// INSERTAR SUPUESTO EN COMANDOS
// try {
//     $bd = new PDO($dsn, $usuarioBD, $claveBD);
//     $sql2 = "INSERT INTO comandos (comando, valor, id_user, fecha, sesion) VALUES
//         (
//             'ad', '150', '2', '$fecha', 'x' 
//         )";//habria que pasar variables de sesion (en campo valor $_SESSION['sesion'])
//     $resultadoObtener = $bd->query($sql2);
// } catch (PDOException $e) {

// }


// OBTENCION VALORES TABLAS
// try {
//     $bd = new PDO($dsn, $usuarioBD, $claveBD);
//     $sql3 = "SELECT * FROM comandos com INNER JOIN usuarios usu ON usu.id_user = com.id_user WHERE usu.id_user = 2";//habria que pasarle la variable de sesion a usu.id_user
//     $resultadoObtener = $bd->query($sql3);

//     $array = [];

//     while ($elemento = $resultadoObtener->fetch()) {
//         $fila['id'] = $elemento['id'];
//         $fila['comando'] = $elemento['comando'];
//         $fila['valor'] = $elemento['valor'];
//         $fila['id_user'] = $elemento['id_user'];
//         $fila['fecha'] = $elemento['fecha'];
//         $fila['hora'] = $elemento['hora'];
//         $fila['sesion'] = $elemento['sesion'];
//         $fila['id_user'] = $elemento['id_user'];
//         $fila['perfil'] = $elemento['perfil'];
//         $fila['nombre'] = $elemento['nombre'];
//         $fila['pass'] = $elemento['pass'];
//         $fila['descripcion'] = $elemento['descripcion'];
//         $fila['activo'] = $elemento['activo'];
//         $array[] = $fila;
//     }
// } catch (PDOException $e) {
// }


//Sergio Cejudo Barrado Grupo 1

/* $dsn = "mysql:host=db";
$usuarioBD = "alumnado";
$claveBD = "alumnado";

//BORRADO BASE DE DATOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "DROP DATABASE IF EXISTS logoBBDD";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
}  */
?>

