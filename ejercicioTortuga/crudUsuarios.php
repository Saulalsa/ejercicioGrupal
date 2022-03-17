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

        foreach($resultadoObtener as $elemento) {
            $fila['id_user'] = $elemento['id_user'];
            $fila['perfil'] = $elemento['perfil'];
            $fila['nombre'] = $elemento['nombre'];
            $fila['pass'] = $elemento['pass'];
            $fila['descripcion'] = $elemento['descripcion'];
            $fila['activo'] = $elemento['activo'];
            $array[] = $fila;
        }
    } catch (PDOException $e) {
    }
    // $array=[0=>['id_user'=>'1','perfil'=>'prof','nombre'=>'saul','pass'=>'saul','descripcion'=>'saul alonso sanchez','activo'=>'false'],1=>['id_user'=>'2','perfil'=>'alum','nombre'=>'pedro','pass'=>'pedro','descripcion'=>'pedro rajoi casado','activo'=>'true']];
    echo("<table border='black solid 1px'>");
    //Linea de la tabla con la leyenda
    echo("<tr>");
        echo("<td>");
        echo('id_user');
        echo("</td>");
        echo("<td>");
        echo('perfil');
        echo("</td>");
        echo("<td>");
        echo('nombre');
        echo("</td>");
        echo("<td>");
        echo('pass');
        echo("</td>");
        echo("<td>");
        echo('descripcioncripcion');
        echo("</td>");
        echo("<td>");
        echo('activo');
        echo("</td>");
        echo("<td>");
        echo('editar');
        echo("</td>");
        echo("<td>");
        echo('borrar');
        echo("</td>");
    echo("</tr>");
        //bucle para crear todas las linea de las tablas
    foreach ($array as $valor) {
        echo("<tr>");
        echo("<td>");
        echo($valor['id_user']);
        echo("</td>");
        echo("<td>");
        echo($valor['perfil']);
        echo("</td>");
        echo("<td>");
        echo($valor['nombre']);
        echo("</td>");
        echo("<td>");
        echo($valor['pass']);
        echo("</td>");
        echo("<td>");
        echo($valor['descripcion']);
        echo("</td>");
        echo("<td>");
        //if para colocar el check box activo o no
        if ($valor['activo']==true) {
            echo("<input type='checkbox' checked disabled/>");
        }elseif ($valor['activo']==false) {
            echo("<input type='checkbox' disabled/>");
        }
        echo("</td>");
        //creacion de formulario para acceder al editar usuario
        echo("<form action='editar.php' method='post'>");
        echo("<td>");
        echo("<input type='submit' name='".$valor['id_user']."' value='editar'/>");
        echo("</td>");
        echo("</form>");
        //creacion de formulario para acceder a borrar usuario
        echo("<form action='borrar.php' method='post'>");
        echo("<td>");
        echo("<input type='submit' name='".$valor['id_user']."' value='borrar'/>");
        echo("</td>");
        echo("</form>");
        echo("</tr>");
    }
    echo("</table>");
    echo("<br>");
    //creacion de formulario para acceder a crear usuario
    echo("<form action='crear.php' method='post'>");
    echo("<input type='submit' name='crear' value='Crear Usuario' id='crearUser'>");
    echo("</form>");
    ?>
