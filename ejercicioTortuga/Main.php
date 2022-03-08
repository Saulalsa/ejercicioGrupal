<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>
        Ejercicio tortuga
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main.css" title="Color">
</head>

<body>
    <h1>Grupo 1.</h1>
    <!--tiene 500 de ancho y de alto para poner la tortuga en la posicion 250,250 -->
    <svg width="500" height="500">
    <rect width="500" height="500" style="fill:rgb(255,240,255);stroke-width:5;stroke:rgb(0,0,0)" />
    </svg>
    <?php

if (isset($_POST['bCom'])){
    $strCom = $_POST['strCom'];
    //patron para que si se pulsa el boton y no hay ningun comadno, pida introducir comandos
    if(empty($strCom)){
        echo "<p style='color:red'> *Introduzca algun comando* </p>";
        //patron para que el comando tenga que estar escrito en minusculas
    } else if(preg_match('`[A-Z]`',$strCom)){ 
        echo "<p style='color:red'> *El comando debe estar escrito en minusculas *</p>";
        //patron para que el comando tenga que tener numeros
    } else if  (!preg_match('`[0-9]`',$strCom)) { 
        echo "<p style='color:red'> *El comando debe tener valores numericos *</p>";
        //patron para que el comando tenga cualquier tipo de letra
    } else if(!preg_match('`[a-z]`',$strCom)){ 
        echo "<p style='color:red'> *El comando debe tener letras *</p>";
    }
}

    ?>
    <!--formulario, metodo post -->
    <form action="" method="post">
    <input type="text" name="strCom" style="width=250" /><br />
    <br><input type="submit" name="bCom" value="Enviar" style="" />

</form>
</body>

</html>
