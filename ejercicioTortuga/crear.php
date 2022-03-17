<?php
    //Saul Alonso Sanchez Grupo 1
    if (isset($_POST["crearUser"])) {
        $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
        $usuarioBD = "alumnado";
        $claveBD = "alumnado";

        //insertar usuario default

        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql2 = "INSERT INTO usuarios (id_user,perfil,nombre,pass,descripcion,activo) 
            VALUES
            (NULL,'".$_POST["perfil"]."','".$_POST['nombre']."','".$_POST['pass']."','".$_POST['descripcion']."',true);";

            $bd->query($sql2);
        } catch (PDOException $e) {
        }
        echo("<p>Perfil creado</p>");
        echo("<a href='/ejercicioGrupal/ejercicioTortuga/crudUsuarios.php'><button>Volver</button></a>");
    }else{
        echo("<form action='crear.php' method='post'>");
        echo("<label>perfil: (prof/alum)<br> <input type='text' placeholder='perfil' name='perfil'/></label><br><br>");
        echo("<label>nombre:<br> <input type='text' placeholder='nombre' name='nombre'/></label><br><br>");
        echo("<label>contraseña:<br> <input type='text' placeholder='contraseña' name='pass'/></label><br><br>");
        echo("<label>descripcion:<br> <input type='text' placeholder='descripcion' name='descripcion'/></label><br><br>");
        echo("<input type='submit' name='crearUser'/>");
        echo("</form>");
    }
?>