<?php

//Sergio Cejudo Barrado Grupo 1

$dsn = "mysql:host=db";
$usuarioBD = "alumnado";
$claveBD = "alumnado";

//BORRADO BASE DE DATOS
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql2 = "DROP DATABASE IF EXISTS logoBBDD";
    $resultadoObtener = $bd->query($sql2);
} catch (PDOException $e) {
    
}
?>