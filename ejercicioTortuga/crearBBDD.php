<?php
$dsn = "mysql:host=db";
$usuarioBD = "alumnado";
$claveBD = "alumnado";


//CREACION BASE DE DATOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "CREATE DATABASE IF NOT EXISTS logoBBDD";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}


$dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
$usuarioBD = "alumnado";
$claveBD = "alumnado";


//CREACION TABLA USUARIOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id_user INT,
        nombre VARCHAR(255),
        pass VARCHAR(255),
        PRIMARY KEY (id_user)
        )";

    $resultadoObtener = $bd->query($sql);
} catch (PDOException $e) {
    echo 'Falló la conexión crear usuarios: ' . $e->getMessage();
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
        PRIMARY KEY (id),
        FOREIGN KEY (id_user) REFERENCES usuarios(id_user)
        )";

    $resultadoObtener = $bd->query($sql);
} catch (PDOException $e) {
    echo 'Falló la conexión crear comandos: ' . $e->getMessage();
}


$dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
$usuarioBD = "alumnado";
$claveBD = "alumnado";


//INSERTAR SUPUESTO EN USUARIOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "INSERT INTO usuarios (id_user, nombre, pass) VALUES
        (
            '1', 'Saul', '12345'
        ), (
            '2', 'Oscar', '12345'
        ), (
            '3', 'Guille', '12345'
        ), (
            '4', 'Alvaro', '12345'
        ), (
            '5', 'Sergio', '12345'
        )";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
    echo 'Falló la conexión insertar en usuarios: ' . $e->getMessage();
}

//INSERTAR SUPUESTO EN COMANDOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "INSERT INTO comandos (id, comando, valor, id_user) VALUES
        (
            null, 'ad', '50px', '1'
        ), (
            null, 'at', '10px', '1'
        ), (
            null, 'ot', 'true', '1'
        ), (
            null, 'de', '40px', '1'
        ), (
            null, 'de', '50px', '2'
        )";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
    echo 'Falló la conexión insertar en comandos: ' . $e->getMessage();
}


//OBTENCION VALORES TABLAS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql3 = "SELECT * FROM comandos com INNER JOIN usuarios usu ON usu.id_user = com.id_user";
    $resultadoObtener = $bd->query($sql3);

    $array = [];

    while ($elemento = $resultadoObtener->fetch()) {
        $fila['id'] = $elemento['id'];
        $fila['comando'] = $elemento['comando'];
        $fila['valor'] = $elemento['valor'];
        $fila['id_user'] = $elemento['id_user'];
        $fila['id_user'] = $elemento['id_user'];
        $fila['nombre'] = $elemento['nombre'];
        $fila['pass'] = $elemento['pass'];

        $array[] = $fila;
    }
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

//MOSTRAR RESULTADO POR PANTALLA
echo "<pre>";
echo print_r($array);
echo "</pre>";
