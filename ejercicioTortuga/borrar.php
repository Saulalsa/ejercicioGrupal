<?php
    //Saul Alonso Sanchez Grupo 1
    $dsn = "mysql:dbname=logoBBDD;host=db";
    $usuarioBD = "alumnado"; 
    $claveBD = "alumnado";
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM usuarios";
        $resultadoObtener = $bd->query($sql3);

        $array = [];
        $conteo = 1;
        foreach($resultadoObtener as $elemento) {
            $conteo++;
        }
    } catch (PDOException $e) {
    }
    for ($i=0; $i < $conteo; $i++) { 
        if (isset($_POST[$i])) {
            $id=$i;
        }
    }

    $dsn = "mysql:dbname=logoBBDD;host=db";
    $usuarioBD = "alumnado"; 
    $claveBD = "alumnado";
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM comandos WHERE id_user = $id";
        $resultadoObtener = $bd->query($sql3);

        $contador = 0;
        foreach($resultadoObtener as $elemento) {
            $contador++;
        }
    } catch (PDOException $e) {
    }

    $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
    $usuarioBD = "alumnado";
    $claveBD = "alumnado";

    //insertar usuario default
    if ($contador!=0) {
        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql2 = "UPDATE usuarios 
            SET 
                activo = false
            WHERE id_user='".$id."';";
            $bd->query($sql2);
        } catch (PDOException $e) {
        }
    }else {
        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql2 = "UPDATE usuarios 
            SET 
                id_user = '".$id."',
                perfil = '',
                nombre = '',
                pass = '',
                descripcion = '',
                activo = false
            WHERE id_user='".$id."';";
            $bd->query($sql2);
        } catch (PDOException $e) {
        }
    }
    echo("<p>Perfil borrado</p>");
    echo("<a href='crudUsuarios.php'><button>Volver</button></a>");
?>