<?php
session_start();
?>
<script src="jquery-1.3.2.min.js" type="text/javascript"></script>
<?php
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

    $array=[0=>['id_user'=>'1','perfil'=>'prof','nombre'=>'saul','pass'=>'saul','desc'=>'saul alonso sanchez','activo'=>'false'],1=>['id_user'=>'2','perfil'=>'alum','nombre'=>'pedro','pass'=>'pedro','desc'=>'pedro rajoi casado','activo'=>'true']];
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
        echo('desccripcion');
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
        if ($valor['activo']=='true') {
            echo("<input type='checkbox' id='".$valor['id_user']."' checked />");
        }elseif ($valor['activo']=='false') {
            echo("<input type='checkbox' id='".$valor['id_user']."'/>");
        }
        echo("</td>");
        echo("<form action='edit.php' method='post'>");
        echo("<td>");
        echo("<input type='submit' name='editar".$valor['id_user']."' value='editar'/>");
        echo("</td>");
        echo("</form>");
        echo("<form action='borrar.php' method='post'>");
        echo("<td>");
        echo("<input type='submit' name='borrar".$valor['id_user']."' value='borrar'/>");
        echo("</td>");
        echo("</form>");
        echo("</tr>");
    }
    echo("</table>");
    echo("<form action='crear.php' method='post'>");
    echo("<input type='submit' name='crear' value='Crear Usuario' id='crearUser'>");
    echo("</form>");
    ?>
