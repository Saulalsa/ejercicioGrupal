<?php
// Alvaro Corral Alvarez Grupo 1

//Ejemplo para el Input Text = iz 10 ad 50 ot sl

if (isset($_POST["strCom"])) {
    $arrayBBDD = $_SESSION["arrayBBDD"];
    if ($_POST['strCom'] == implode(" ", $arrayBBDD)) {

    } else {
        $str = $_POST["strCom"];
        $btn = $_POST["bCom"];
        $arrayStr = explode(" ", $str);
        print_r($arrayStr);
        $arrayBBDD = []; //Array Final para la BBDD
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
        foreach($arrayStr as $dato) {
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
                    $arrayBBDD[$contador] = "mt";
                    break;
                case 'casa':
                    $casa[$contador] = $saleInt;
                    $arrayBBDD[$contador] = "casa";
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
        $dsn = "mysql:dbname=logoBBDD;host=db"; //dsn con nombre de la bd de datos creada
        $usuarioBD = "alumnado";
        $claveBD = "alumnado";
        for ($i = 0; $i < count($arrayBBDD); $i = $i + 2) {
            try {
                $bd = new PDO($dsn, $usuarioBD, $claveBD);
                $sql2 = "INSERT INTO comandos (comando, valor, id_user) VALUES
                    ('$arrayBBDD[$i]', '".$arrayBBDD[$i+1]."', '1')
                ";
                $bd -> query($sql2);
            } catch (PDOException $e) {
            }
        }
        $_POST["strCom"] = "";
    }
}
?>