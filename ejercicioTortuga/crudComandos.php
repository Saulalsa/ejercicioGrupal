<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crudUsuarios.css">
    <title>Document</title>
</head>

<body>
</body>

</html>
<?php

$dsn = "mysql:dbname=logoBBDD;host=db";
$usuarioBD = "alumnado";
$claveBD = "alumnado";

/* echo "<pre>";
echo print_r($_SESSION['usuario'][0]['id_user']);
echo "</pre>"; */
$usuario = $_SESSION['usuario'][0]['id_user'];
try {
    $bd = new PDO($dsn, $usuarioBD, $claveBD);
    $sql3 = "SELECT perfil, nombre, descripcion FROM usuarios WHERE id_user = $usuario";
    $resultadoObtener = $bd->query($sql3);

    $arrayPerfil = [];

    foreach ($resultadoObtener as $elemento) {
        $fila['nombre'] = $elemento['nombre'];
        $fila['perfil'] = $elemento['perfil'];
        $fila['descripcion'] = $elemento['descripcion'];
        $arrayPerfil[] = $fila;
    }
} catch (PDOException $e) {
}

// echo print_r($arrayPerfil);
if ($arrayPerfil[0]['perfil'] == "prof") {
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM usuarios ";
        $resultadoObtener = $bd->query($sql3);
    
        $array = [];
    
        foreach ($resultadoObtener as $elemento) {
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
    
    
    
    
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM `comandos` ;";
        $resultadoObtener = $bd->query($sql3);
    
        $arrayUsuario = [];
    
        foreach ($resultadoObtener as $elemento) {
            $fila['id'] = $elemento['id'];
            $fila['comando'] = $elemento['comando'];
            $fila['valor'] = $elemento['valor'];
            $fila['id_user'] = $elemento['id_user'];
            $fila['fecha'] = $elemento['fecha'];
    
            $fila['sesion'] = $elemento['sesion'];
            
            $arrayUsuario[] = $fila;
        }
    } catch (PDOException $e) {
    }
    
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT sesion FROM `comandos` GROUP BY sesion;";
        $resultadoObtener = $bd->query($sql3);
    
        $arrayUsuarioSesiones = [];
    
        foreach ($resultadoObtener as $elemento) {
          
            $fila['sesion'] = $elemento['sesion'];
           
            $arrayUsuarioSesiones[] = $fila;
        }
    } catch (PDOException $e) {
    }

    // $array=[0=>['id_user'=>'1','perfil'=>'prof','nombre'=>'saul','pass'=>'saul','descripcion'=>'saul alonso sanchez','activo'=>'false'],1=>['id_user'=>'2','perfil'=>'alum','nombre'=>'pedro','pass'=>'pedro','descripcion'=>'pedro rajoi casado','activo'=>'true']];
    echo ("<table border='black solid 1px'>");
    // //Linea de la tabla con la leyenda
    echo ("<tr>");
    echo ("<td>");
    echo ('id_user');
    echo ("</td>");
    echo ("<td>");
    echo ('perfil');
    echo ("</td>");
    echo ("<td>");
    echo ('nombre');
    echo ("</td>");
    
    echo ("<td>");
    echo ('descripcion');
    echo ("</td>");
    echo ("<td>");
    echo ('sesion');
    echo ("</td>");
    echo ("<td>");
    echo ('comandos');
    echo ("</td>");
    echo ("<td>");
    echo ('activo');
    echo ("</td>");
    echo ("<td>");
    echo ('editar');
    echo ("</td>");
    echo ("<td>");
    echo ('borrar');
    echo ("</td>");
    echo ("</tr>");
    // bucle para crear todas las linea de las tablas
    foreach ($arrayUsuarioSesiones as $valor) {
        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sesion = $valor['sesion'];
            $sql5 = "SELECT usu.perfil, usu.id_user, usu.nombre, usu.descripcion, com.sesion FROM comandos com INNER JOIN usuarios usu ON usu.id_user = com.id_user WHERE sesion = '$sesion' LIMIT 1;";
            $resultadoObtener = $bd->query($sql5);
        
            $arrayPerfilSesiones = [];
        
            foreach ($resultadoObtener as $elemento) {
                $fila['perfil'] = $elemento['perfil'];
                $fila['id_user'] = $elemento['id_user'];
                $fila['nombre'] = $elemento['nombre'];
                $fila['descripcion'] = $elemento['descripcion'];
                $fila['sesion'] = $elemento['sesion'];
                $arrayPerfilSesiones[] = $fila;
            }
        } catch (PDOException $e) {
        }
        // echo "<pre>";
        // print_r($arrayPerfilSesiones);
        // echo "</pre>";
        echo ("<tr>");
        echo ("<td>");
        
        echo ($arrayPerfilSesiones[0]['id_user']);
        echo ("</td>");
        echo ("<td>");
        echo ($arrayPerfilSesiones[0]['perfil']);
        echo ("</td>");
        echo ("<td>");
        echo ($arrayPerfilSesiones[0]['nombre']);
        echo ("</td>");
      
        echo ("<td>");
        echo ($arrayPerfilSesiones[0]['descripcion']);
        echo ("</td>");
        echo ("<td>");
        echo ($valor['sesion']);
        echo ("</td>");
        echo ("<td>");
        for ($i=0; $i <count($arrayUsuario) ; $i++) { 
                if ($valor['sesion'] == $arrayUsuario[$i]['sesion']) {
                    echo $arrayUsuario[$i]['comando']." ".$arrayUsuario[$i]['valor']." ";
                } else {
                    continue;
                }
        }
        echo ("</td>");
        echo ("<td>");
        //if para colocar el check box activo o no
        if ($valor['activo'] == true) {
            echo ("<input type='checkbox' checked disabled/>");
        } elseif ($valor['activo'] == false) {
            echo ("<input type='checkbox' disabled/>");
        }
        echo ("</td>");
       //no lleva a ningun sitio (falta implementar)
        echo ("<form action='' method='post'>");
        echo ("<td>");
        echo ("<input type='submit' name='" . $valor['id_user'] . "' value='editar'/>");
        echo ("</td>");
        echo ("</form>");
       //no lleva a ningun sitio (falta implementar)
        echo ("<form action='' method='post'>");
        echo ("<td>");
        echo ("<input type='submit' name='" . $valor['id_user'] . "' value='borrar'/>");
        echo ("</td>");
        echo ("</form>");
        echo ("</tr>");
    }
    echo ("</table>");
    echo ("<br>");
    //creacion de formulario para acceder a crear usuario
    echo ("<form action='crear.php' method='post'>");
    echo ("<input type='submit' name='crear' value='Crear Usuario' id='crearUser'>");
    echo ("</form>");

} else {
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM usuarios ";
        $resultadoObtener = $bd->query($sql3);
    
        $array = [];
    
        foreach ($resultadoObtener as $elemento) {
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
    
    
    
    
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM `comandos` WHERE id_user = $usuario;";
        $resultadoObtener = $bd->query($sql3);
    
        $arrayUsuario = [];
    
        foreach ($resultadoObtener as $elemento) {
            $fila['id'] = $elemento['id'];
            $fila['comando'] = $elemento['comando'];
            $fila['valor'] = $elemento['valor'];
            $fila['id_user'] = $elemento['id_user'];
            $fila['fecha'] = $elemento['fecha'];
    
            $fila['sesion'] = $elemento['sesion'];
            
            $arrayUsuario[] = $fila;
        }
    } catch (PDOException $e) {
    }
    
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT sesion FROM `comandos` WHERE id_user = $usuario GROUP BY sesion;";
        $resultadoObtener = $bd->query($sql3);
    
        $arrayUsuarioSesiones = [];
    
        foreach ($resultadoObtener as $elemento) {
          
            $fila['sesion'] = $elemento['sesion'];
           
            $arrayUsuarioSesiones[] = $fila;
        }
    } catch (PDOException $e) {
    }

    // $array=[0=>['id_user'=>'1','perfil'=>'prof','nombre'=>'saul','pass'=>'saul','descripcion'=>'saul alonso sanchez','activo'=>'false'],1=>['id_user'=>'2','perfil'=>'alum','nombre'=>'pedro','pass'=>'pedro','descripcion'=>'pedro rajoi casado','activo'=>'true']];
    echo ("<table border='black solid 1px'>");
    // //Linea de la tabla con la leyenda
    echo ("<tr>");
    echo ("<td>");
    echo ('id_user');
    echo ("</td>");
    echo ("<td>");
    echo ('perfil');
    echo ("</td>");
    echo ("<td>");
    echo ('nombre');
    echo ("</td>");
    
    echo ("<td>");
    echo ('descripcion');
    echo ("</td>");
    echo ("<td>");
    echo ('sesion');
    echo ("</td>");
    echo ("<td>");
    echo ('comandos');
    echo ("</td>");
    echo ("<td>");
    echo ('activo');
    echo ("</td>");
    echo ("<td>");
    echo ('editar');
    echo ("</td>");
    echo ("<td>");
    echo ('borrar');
    echo ("</td>");
    echo ("</tr>");
    // bucle para crear todas las linea de las tablas
    foreach ($arrayUsuarioSesiones as $valor) {
        echo ("<tr>");
        echo ("<td>");
        echo ($arrayUsuario[0]['id_user']);
        echo ("</td>");
        echo ("<td>");
        echo ($arrayPerfil[0]['perfil']);
        echo ("</td>");
        echo ("<td>");
        echo ($arrayPerfil[0]['nombre']);
        echo ("</td>");
      
        echo ("<td>");
        echo ($arrayPerfil[0]['descripcion']);
        echo ("</td>");
        echo ("<td>");
        echo ($valor['sesion']);
        echo ("</td>");
        echo ("<td>");
        for ($i=0; $i <count($arrayUsuario) ; $i++) { 
                if ($valor['sesion'] == $arrayUsuario[$i]['sesion']) {
                    echo $arrayUsuario[$i]['comando']." ".$arrayUsuario[$i]['valor']." ";
                } else {
                    continue;
                }
        }
        echo ("</td>");
        echo ("<td>");
        //if para colocar el check box activo o no
        if ($valor['activo'] == true) {
            echo ("<input type='checkbox' checked disabled/>");
        } elseif ($valor['activo'] == false) {
            echo ("<input type='checkbox' disabled/>");
        }
        echo ("</td>");
         //no lleva a ningun sitio (falta implementar)
        echo ("<form action='' method='post'>");
        echo ("<td>");
        echo ("<input type='submit' name='" . $valor['id_user'] . "' value='editar'/>");
        echo ("</td>");
        echo ("</form>");
         //no lleva a ningun sitio (falta implementar)
        echo ("<form action='' method='post'>");
        echo ("<td>");
        echo ("<input type='submit' name='" . $valor['id_user'] . "' value='borrar'/>");
        echo ("</td>");
        echo ("</form>");
        echo ("</tr>");
    }
    echo ("</table>");
    echo ("<br>");
    
}