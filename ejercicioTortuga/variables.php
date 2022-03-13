<?php
// Alvaro Corral Alvarez Grupo 1

//Ejemplo para el Input Text = iz 10 ad 50

$arrayBBDD = []; //Array Final para la BBDD [comando,valor]

if (isset($_POST["strCom"])) {

    $arrayStr = explode(" ", $_POST["strCom"]);
    $contador = 0;
    $contadorDefault = 0;
    $ad = [];
    $at = [];
    $de = [];
    $iz = [];
    $bp = [];
    $sl = [];
    $bl = [];
    $ot = [];
    $mt = [];
    $casa = [];
    $valoresInt = [];
    $default = [];
    foreach ($arrayStr as $dato) {
        //Cuando convertimos en int una string no numerica el valor es 0
        $saleInt = (int) $dato; //integer
        if ($saleInt == 0) {
            $saleInt = $dato; //string
        }
        switch ($saleInt) {
            case 'ad' || 'adelante': //adelante
                $ad[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'at' || 'atras': //atras
                $at[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'de' || 'derecha': //derecha
                $de[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'iz' || 'izquierda': //izquierda
                $iz[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'bp' || 'borrapantalla': //borrapantalla
                $bp[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'sl' || 'subirlapaiz': //subirlapaiz
                $sl[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'bl' || 'bajarlapiz': //bajarlapiz
                $bl[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'ot' || 'ocultartortuga': //ocultartortuga
                $ot[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'mt' || 'mostrartortuga': //mostrartortuga
                $mt[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case 'casa':
                $casa[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            case (gettype($saleInt) == "integer" && $saleInt > 0):
                $valoresInt[$contador] = $saleInt;
                $arrayBBDD[$contador] = $saleInt;
                break;
            default:
                $default[$contadorDefault] = $dato;
                $contadorDefault++;
                break;
        }
        if ($arrayBBDD[$contador] == "bp" || $arrayBBDD[$contador] == "sl" || $arrayBBDD[$contador] == "bl" || $arrayBBDD[$contador] == "ot" || $arrayBBDD[$contador] == "mt" || $arrayBBDD[$contador] == "casa") {
            $contador++;
            $arrayBBDD[$contador] = "T";
        } else {
            $contador++;
        }
    }
    $_SESSION["arrayBBDD"] = $arrayBBDD;
    //insertar Comandos
    //tener en cuenta que H es una hora menos hasta el 23 de Marzo con el cambio de hora
    
    // Para el login
    // $formato='d/m/Y-H:i:s';
    // $_SESSION["fecha"]=date($formato, $timestamp = time());
    // $_SESSION["sesion"]=$sesion=hash("md5",$fecha,false);
    
    // si quieren fecha siempre o solo la del login
    $formato='d/m/Y-H:i:s';
    $_SESSION["fecha"]=date($formato, $timestamp = time());

    $fecha=$_SESSION["fecha"];
    $sesion=$_SESSION["sesion"];
    $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
    $usuarioBD = "alumnado";
    $claveBD = "alumnado";
    // for ($i = 0; $i+1 < count($arrayBBDD); $i = $i + 2) {
    //     try {
    //         $bd = new PDO($dsn, $usuarioBD, $claveBD);
    //         $sql2 = "INSERT INTO comandos (comando, valor, fecha, sesion, id_user) VALUES
    //                 ('$arrayBBDD[$i]', '" . $arrayBBDD[$i + 1] . "', '$fecha', '$sesion', '1')
    //             ";
    //         $bd->query($sql2);
    //     } catch (PDOException $e) {
    //     }
    // }
    $arrayBBDD = [];
}
else {
}
/*
Tabla (comandos)
  id INT;(PRIMARY KEY)
  comando VARCHAR;
  valor VARCHAR;
  fecha DATE;
  hora TIME;
  sesion VARCHAR;
  id_user INT;(FOREIGN KEY)
}
*/