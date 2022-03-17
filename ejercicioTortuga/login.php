<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" title="Color">
    <title>Ejercicio tortuga</title>
</head>
<body>

</body>
</html>
<?php
    $contador=0;
    if(isset($_POST["bLog"])){
        $email=$_POST["userLogin"];
        $pass=$_POST["pswLogin"];
        $dsn = "mysql:dbname=logoBBDD;host=db";
        $usuarioBD = "alumnado"; 
        $claveBD = "alumnado";
        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql3 = "SELECT * FROM usuarios WHERE nombre='$email' and pass='$pass'";
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
                $contador++;
            }
        } catch (PDOException $e) {
            echo($e);
        }
        if ($contador==1) {
            if($array[0]["activo"]==true){
                $_SESSION["usuario"]=$array;
    
                $formato='d/m/Y-H:i:s';
                $fecha=date($formato, $timestamp = time());
                $_SESSION["fecha"]=$fecha;
                $_SESSION["sesion"]=$sesion=hash("md5",$fecha,false);
    
                echo"<p>Acceso conseguido</p>";
                echo"<a href='/ejercicioGrupal/ejercicioTortuga/main.php'><button type='submit'>ACCEDER</button></a>";
            }else{
                echo("<form action='login.php' method='post'>
                <p>Error el usuario esta desactivado</p>
                <br/><input type='submit' name='volv' value='Volver al formulario' />
                </form>");
            }
        }else{
            echo("<form action='login.php' method='post'>
                <p>Error en el nombre/contrasenia</p>
                <br/><input type='submit' name='volv' value='Volver al formulario' />
                </form>");
        }
    }else{
        echo("<div class='container'>
        <form action='login.php' method='post'>
            <p>Usuario</p>
            <input type='text' placeholder='Introduzca Usuario' name='userLogin' required>
            </br>
            <p>Contraseña</p>
            <input type='password' placeholder='Introduzca Contraseña' name='pswLogin' required>
            </br>
            <input type='submit' id='btn' name='bLog' value='Enviar' />
        </form>
        </div>");
    }

?>