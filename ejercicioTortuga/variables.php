<?php
// Alvaro Corral Alvarez Grupo 1

//Ejemplo para el Input Text = iz 10 ad 50

$arrayBBDD = []; //Array Final para la BBDD [comando,valor]

if (isset($_POST["strCom"])) {

    $arrayStr = explode(" ", $_POST["strCom"]);

    //    ##### ----- ##### REPEAT ##### ----- #####

    //repite 3 [repite 4 [ad 20 de 30]]
    //repite 4 [ad 60 de 90] repite 4 [ad 60 iz 90]
    //repite 4 [ad 60 iz 90] ad 100 de 90

    $repeat = explode("repite", $_POST["strCom"]);

    //print_r($arrayStr);
    if (count($repeat) > 1) {
        if (count($repeat) > 2) {
            //print_r($repeat);
            $arrayStr = [];
            //varios repeat seguidos arreglar repite(repite)
            for ($i = 1; $i + 1 <= count($repeat); $i++) {
                $str1 = $repeat[$i];
                $limpia1 = explode("[", $str1);
                //print_r($limpia1);
                if (isset($limpia1[1])) {
                    $str2 = $limpia1[0];
                    $i++;
                    do {
                        $str2 = $str2 - 1;
                        $limpia2 = explode("[", $repeat[$i]);
                        $limpia3 = explode("]", $limpia2[1]);
                        $espaciado = explode(" ",$limpia3[0]);
                        //print_r($limpia2);
                        for ($n = 1; $n <= (int) $limpia2[0]; $n++) {
                            foreach ($espaciado as $comando) {
                                $arrayStr[] = $comando;
                            }
                        }
                        //print_r($arrayStr);
                    } while ($str2 > 0);
                }
                else {
                    $str2 = $limpia1[1];
                    $limpia2 = explode("]", $str2);
                    //print_r($limpia2);
                    for ($n = 0; $n < $limpia1[0]; $n++) {
                        foreach (explode(" ", $limpia2[0]) as $comando) {
                            $arrayStr[] = $comando;
                        }
                    }
                }
            }
        } else {
            $str1 = $repeat[1];
            $limpia1 = explode("[", $str1);
            //print_r($limpia1);
            $str2 = $limpia1[1];
            $limpia2 = explode("]", $str2);
            //print_r($limpia2);

            //print_r($limpia1[0]); //el n?? de veces que repite
            //print_r($limpia2[1]); //comandos a repetir

            //limpio el array para mantener el orden
            $arrayStr = [];

            //Se pueden poner comandos antes y despues del repite
            $repeatInit = explode(" ", $repeat[0]);
            //print_r($repeatInit);//al hacer el explode, el ultimo 
            //indice esta vacio y se controla en el for restando 2
            for ($i = 0; $i <= (count($repeatInit) - 2); $i++) {
                $arrayStr[] = $repeatInit[$i];
            }
            for ($n = 0; $n < $limpia1[0]; $n++) {
                foreach (explode(" ", $limpia2[0]) as $comando) {
                    $arrayStr[] = $comando;
                }
            }
            $repeatFinal = explode(" ", $limpia2[1]);
            //print_r($repeatFinal);//al hacer el explode, el primer 
            //indice esta vacio y se controla en el inicio > 0
            for ($i = 1; $i <= (count($repeatFinal) - 1); $i++) {
                $arrayStr[] = $repeatFinal[$i];
            }
        }
    }
    //print_r($arrayStr);


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
    $fecha=date($formato, $timestamp = time());

    // $fecha=$_SESSION["fecha"];
    $sesion=$_SESSION["sesion"];
    $usuario=$_SESSION["usuario"];
    $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
    $usuarioBD = "alumnado";
    $claveBD = "alumnado";
    for ($i = 0; $i+1 < count($arrayBBDD); $i = $i + 2) {
        try {
            $bd = new PDO($dsn, $usuarioBD, $claveBD);
            $sql2 = "INSERT INTO comandos (comando, valor, id_user, fecha, sesion) VALUES
                    ('$arrayBBDD[$i]', '" . $arrayBBDD[$i + 1] . "', '".$usuario[0]["id_user"]."', '$fecha', '$sesion')
                ";
            $bd->query($sql2);
        } catch (PDOException $e) {
        }
    }
    $arrayBBDD = [];
}
else {
}
