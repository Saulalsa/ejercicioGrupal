<?php
    session_start();
?>
<!-- Oscar Bueno Rodriguez Grupo 1 -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>
        Ejercicio tortuga
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" title="Color">
</head>

<body>
    <?php
    include("variables.php");
    include("artista.php");

    if (isset($_POST['bCom'])) {
        $strCom = $_POST['strCom'];
        //patron para que si se pulsa el boton y no hay ningun comadno, pida introducir comandos
        if (empty($strCom)) {
            echo "<p style='color:red'> *Introduzca algun comando* </p>";
            //patron para que el comando tenga que estar escrito en minusculas
        } else if (preg_match('`[A-Z]`', $strCom)) {
            echo "<p style='color:red'> *El comando debe estar escrito en minusculas *</p>";
            //patron para que el comando tenga que tener numeros
        } else if (!preg_match('`[a-z]`', $strCom)) {
            echo "<p style='color:red'> *El comando debe tener letras *</p>";
        }
    }
    ?>
    <!-- formulario, metodo post -->
    
    <?php
    if(isset($_SESSION["usuario"])){
        if ($_SESSION["usuario"][0]["perfil"]=="prof"||$_SESSION["usuario"][0]["perfil"]=="alum") {
            echo("<form action='main.php' method='post'>
                <input type='text' name='strCom' /><br/>
                <br/><input type='submit' name='bCom' value='Enviar' />
                </form>");
        }
        if($_SESSION["usuario"][0]["perfil"]=="prof"){
            echo("<form action='crudUsuarios.php' method='post'>
                <br/><input type='submit' name='btncrud' value='Crud Usuarios' />
                </form>");
        }
    }else{
        echo("<p>Debe registrarse antes de programar</p>");
        echo("<a href='login.php'><button>Login</button></a>");
    }
    ?>
</body>

</html>