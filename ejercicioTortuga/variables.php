<?php

// Alvaro Corral Alvarez Grupo 1

//Ejemplo para el Input Text = iz 10 ad 50 ot sl

if (isset($_POST["strCom"])) {
    $str=$_POST["strCom"];
    $btn=$_POST["bCom"];
    $arrayStr=explode(" ",$str);
    print_r($arrayStr);
    $arrayBBDD=[];//Array Final para la BBDD
    $contador=0;
    $contadorDefault=0;
    $ad=[];
    $at=[];
    $de=[];
    $iz=[];
    $bp=[];
    $sl=[];
    $bl=[];
    $ot=[];
    $mt=[];
    $casa=[];
    $valoresInt=[];
    $default=[];
    foreach ($arrayStr as $dato) {
        //$tipo=gettype($dato);echo $tipo;
        //Cuando convertimos en int una string no numerica el valor es 0
        $saleInt=(int)$dato;//integer
        if ($saleInt == 0) {
            $saleInt=$dato;//string
        }
        $tipo2=gettype($saleInt);//echo $tipo2;
        switch ($saleInt) {
            case 'ad'://adelante
                $ad[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>adelante: ".$ad[$contador];
                break;
            case 'at'://atras
                $at[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>atras: ".$at[$contador];
                break;
            case 'de'://derecha
                $de[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>derecha: ".$de[$contador];
                break;
            case 'iz'://izquierda
                $iz[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>izquierda: ".$iz[$contador];
                break;
            case 'bp'://borrapantalla
                $bp[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>borrar Pantalla: ".$bp[$contador];
                break;
            case 'sl'://subirlapaiz
                $sl[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>Subir lapiz: ".$sl[$contador];
                break;
            case 'bl'://bajarlapiz
                $bl[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>bajar Lapiz: ".$bl[$contador];
                break;
            case 'ot'://ocultartortuga
                $ot[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>ocultar Tortuga: ".$ot[$contador];
                break;
            case 'mt'://mostrartortuga
                $mt[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>mostrar Tortuga: ".$mt[$contador];
                break;
            case 'casa':
                $casa[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>Casa: ".$casa[$contador];
                break;
            case (gettype($saleInt) == "integer" && $saleInt>0):
                $valoresInt[$contador]=$saleInt;
                $arrayBBDD[$contador]=$saleInt;
                echo "<br/>Valores Int: ".$valoresInt[$contador];
                break;
            default:
                $default[$contadorDefault]=$dato;
                echo "<br/>Default: ".$default[$contadorDefault];
                $contadorDefault++;
            break;
        }
        if ($arrayBBDD[$contador]=="bp"||$arrayBBDD[$contador]=="sl"||$arrayBBDD[$contador]=="bl"||$arrayBBDD[$contador]=="ot"||$arrayBBDD[$contador]=="mt"||$arrayBBDD[$contador]=="casa") {
            $contador++;
            $arrayBBDD[$contador]="T";
        }
        else {
            $contador++;
        }
    }
    echo "<br/>Array BBDD: ";
    print_r($arrayBBDD);
}
else {
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Var</title>";
    echo "</head>";
    echo "<body>";
    echo "<form action='variables.php' method='POST'><input type = 'text' name = 'strCom'><input type = 'submit' name = 'bCom'></form>";
    echo "</body>";
    echo "</html>";
}
?>