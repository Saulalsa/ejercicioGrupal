
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
    <link rel="icon" type="image/x-icon" href="https://c.tenor.com/QIMhYYbv6wgAAAAi/le_trtl-trtl.gif">
</head>

<body>
    <h1>Grupo 1.</h1>

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
    <form action="main.php" method="post">
        <input type="text" name="strCom" /><br/>
        <br/><input type="submit" name="bCom" value="Enviar" />
    </form>
</body>

</html>