<?php
session_start();
/*
Tabla (usuarios) {
  id_user INT;(PRIMARY KEY)
  perfil VARCHAR;
  nombre VARCHAR;
  pass VARCHAR;
  desc VARCHAR;
  activo TIPO;
}
*/
    //Saul Alonso Sanchez Grupo 1
    // $dsn = "mysql:dbname=logoBBDD;host=db";
    // $usuarioBD = "alumnado"; 
    // $claveBD = "alumnado";
    // try {
    //     $bd = new PDO($dsn, $usuarioBD, $claveBD);
    //     $sql3 = "SELECT * FROM comandos";
    //     $resultadoObtener = $bd->query($sql3);

    //     $array = [];

    //     foreach($resultadoObtener as $elemento) {
    //         $fila['id_user'] = $elemento['id_user'];
    //         $fila['perfil'] = $elemento['perfil'];
    //         $fila['nombre'] = $elemento['nombre'];
    //         $fila['pass'] = $elemento['pass'];
    //         $fila['desc'] = $elemento['desc'];
    //         $fila['activo'] = $elemento['activo'];
    //         $array[] = $fila;
    //     }
    // } catch (PDOException $e) {
    // }

    $array=[0=>['id_user'=>'1','perfil'=>'prof','nombre'=>'saul','pass'=>'saul','desc'=>'saul alonso sanchez','activo'=>'true'],1=>['id_user'=>'2','perfil'=>'alum','nombre'=>'pedro','pass'=>'pedro','desc'=>'pedro rajoi casado','activo'=>'true']];
    echo("<table border='black solid 1px'>");
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
        echo('desc');
        echo("</td>");
        echo("<td>");
        echo('activo');
        echo("</td>");
        echo("</tr>");
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
        echo($valor['desc']);
        echo("</td>");
        echo("<td>");
        echo("<input type='checkbox' checked=".$valor['activo']."'/>");
        echo("</td>");
        echo("<td>");
        echo("<input type='button' id='editar".$valor['id_user']."' value='editar' onclick='".editar($valor['id_user'])."'/>");
        echo("</td>");
        echo("<td>");
        echo("<input type='button' value='borrar' onclick='".editar($valor['id_user'])."'/>");
        echo("</td>");
        echo("</tr>");
    }
    echo("</table>");
    function editar($id){
        if (isset($valor['id_user'])) {
            # code...
        }
        $_SESSION["id"]=$id;
    }

?>