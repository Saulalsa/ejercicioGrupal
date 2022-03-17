<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST["edit"])) {
        $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
        $usuarioBD = "alumnado";
        $claveBD = "alumnado";

        //insertar usuario default

        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql2 = "UPDATE usuarios 
            SET 
                id_user = '".$_SESSION["id"]."',
                perfil = '".$_SESSION["perfil"]."',
                nombre = '".$_POST['nombre']."',
                pass = '".$_POST['pass']."',
                descripcion = '".$_POST['descripcion']."',
                activo = '".$_SESSION["activo"]."'
            WHERE id_user='".$_SESSION["id"]."';";
            $bd->query($sql2);
        } catch (PDOException $e) {
        }
        echo("<p>Perfil actualizado</p>");
        echo("<a href='/ejercicioGrupal/ejercicioTortuga/crudUsuarios.php'><button>Volver</button></a>");
    }else{
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
                $fila['id_user'] = $elemento['id_user'];
                $fila['perfil'] = $elemento['perfil'];
                $fila['nombre'] = $elemento['nombre'];
                $fila['pass'] = $elemento['pass'];
                $fila['descripcion'] = $elemento['descripcion'];
                $fila['activo'] = $elemento['activo'];
                $array[] = $fila;
                $conteo++;
            }
        } catch (PDOException $e) {
        }
        for ($i=0; $i < $conteo; $i++) { 
            if (isset($_POST[$i])) {
                $id=$i;
                $perfil = $array[$id-1]['perfil'];
                $nombre = $array[$id-1]['nombre'];
                $pass = $array[$id-1]['pass'];
                $descripcion = $array[$id-1]['descripcion'];
                $activo = $array[$id-1]['activo'];
                $_SESSION["id"]=$id;
                $_SESSION["perfil"]=$perfil;
                $_SESSION["activo"]=$activo;
            }
        }
        echo("<form action='editar.php' method='post'>");
        echo("<label>id:<br> <input type='text' placeholder='id' name='id' value='".($id)."'disabled/></label><br><br>");
        echo("<label>perfil:<br> <input type='text' placeholder='perfil' name='perfil' value='$perfil'disabled/></label><br><br>");
        echo("<label>nombre:<br> <input type='text' placeholder='nombre' name='nombre' value='$nombre'/></label><br><br>");
        echo("<label>contraseña:<br> <input type='text' placeholder='contraseña' name='pass' value='$pass'/></label><br><br>");
        echo("<label>descripcion:<br> <input type='text' placeholder='descripcion' name='descripcion' value='$descripcion'/></label><br><br>");
        echo("<input type='submit' name='edit'/>");
        echo("</form>");
    }
?>
</body>
</html>
