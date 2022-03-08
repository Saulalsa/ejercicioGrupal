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
    <svg width="500" height="500">
    <rect width="500" height="500" style="fill:rgb(255,240,255);stroke-width:5;stroke:rgb(0,0,0)" />
    </svg>
    <?php

if (isset($_POST['bCom'])){
    $strCom = $_POST['strCom'];
    if(empty($strCom)){
        echo "<p style='color:red'> *Introduzca algun comando* </p>";
    } else if(preg_match('`[A-Z]`',$strCom)){
        echo "<p style='color:red'> *El comando debe estar escrito en minusculas *</p>";
    } else if  (!preg_match('`[0-9]`',$strCom)) {
        echo "<p style='color:red'> *El comando debe tener valores numericos *</p>";
    } else if(!preg_match('`[a-z]`',$strCom)){
        echo "<p style='color:red'> *El comando debe tener letras *</p>";
    }
}

    ?>
    <form action="" method="post">
    <input type="text" name="strCom" style="width=250" /><br />
    <br><input type="submit" name="bCom" value="Enviar" style="" />

</form>
</body>

</html>
