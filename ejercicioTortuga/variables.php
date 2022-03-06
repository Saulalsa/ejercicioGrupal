<?php
if (isset($_POST["strCom"])) {
    $str=$_POST["strCom"];
    $btn=$_POST["bCom"];
    $arrayStr=explode(" ",$str);
    print_r($arrayStr);
    $arrayBBDD=[""];
    $valoresInt=[""];
    $valoresIncorrectos=[""];
    foreach ($arrayStr as $dato) {
        //$tipo=gettype($dato);
        //echo $tipo;
        $saleInt=(int)$dato;//  int
        if ($saleInt == 0) {
            $saleInt=$dato;
        }
        //Cuando convertimos en int una string no numerica el valor es 0
        echo $saleInt;
        $tipo2=gettype($saleInt);
        echo $tipo2;
        switch ($saleInt) {
            case 'ad'://adelante

                break;
            case 'at'://atras

                break;
            case 'de'://derecha

                break;
            case 'iz'://izquierda

                break;
            case 'bp'://borrapantalla

                break;
            case 'sl'://subirlapaiz

                break;
            case 'bl'://bajarlapiz

                break;
            case 'ot'://ocultartortuga

                break;
            case 'mt'://mostrartortuga

                break;
            case 'casa':

                break;
            case (gettype($saleInt) == "integer" && $saleInt>0):
                $valoresInt[]=$saleInt;
                break;
            default:
                $valoresIncorrectos[]=$dato;
            break;
        }
    }
    print_r($valoresIncorrectos);
    print_r($valoresInt);
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