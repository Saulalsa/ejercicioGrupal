<?php session_start();
// header("Refresh: 1; URL='Main.php'");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>
        Ejercicio tortuga
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
    <h1>Grupo 1.</h1>
    <?php
    $tamano=500;
    $bbdd=[1,"ad",50,2,"d",90,3,"at",50,4,"d",90,5,"ad",50];
    $array=[];
    for($i=0;$i<count($bbdd);$i+=3){
        $array[]=["id"=>$bbdd[$i],"comando"=>$bbdd[$i+1],"valor"=>$bbdd[$i+2]];
    }
    
    $centrox=$tamano/2;
    $centroy=$tamano/2;
    
    $grado=0;
    
    echo("<svg width=$tamano height=$tamano>");

    $conteo=0;
    for($i=0;$i<count($bbdd);$i+=3){ 
        if ($array[$conteo]["comando"]=="d") {
            print_r($grado);
            $grado=+$array[$conteo]["valor"];
            if($grado>=360){
                $grado = $grado - 360;
            }
        }
        if ($array[$conteo]["comando"]=="iz") {
            print_r($grado);
            $grado=-$array[$conteo]["valor"];
            if($grado<0){
                $grado = 360 + $grado;
            }
        }
        if ($array[$conteo]["comando"]=="ad") {
        print_r($grado);
            if($grado<=90&&$grado>=0){
                $cos = cos(90-$grado)*$array[$conteo]["valor"];
                $tan = tan(90-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centrox-$tan;
            }
            if($grado<=180&&$grado>90){
                $cos = cos(180-$grado)*$array[$conteo]["valor"];
                $tan = tan(180-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centrox+$tan;
            }
            if($grado<=270&&$grado>180){
                $cos = cos(270-$grado)*$array[$conteo]["valor"];
                $tan = tan(270-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centrox+$tan;
            }
            if($grado<360&&$grado>270){
                $cos = cos(360-$grado)*$array[$conteo]["valor"];
                $tan = tan(360-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centrox-$tan;
            }
            $linea=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='black' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
            echo("$centrox , $centroy");
        }
        if ($array[$conteo]["comando"]=="at") {
            print_r($grado);
            if($grado<=90&&$grado>=0){
                $cos = cos(90-$grado)*$array[$conteo]["valor"];
                $tan = tan(90-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centrox+$tan;
            }
            if($grado<=180&&$grado>90){
                $cos = cos(180-$grado)*$array[$conteo]["valor"];
                $tan = tan(180-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centrox-$tan;
            }
            if($grado<=270&&$grado>180){
                $cos = cos(270-$grado)*$array[$conteo]["valor"];
                $tan = tan(270-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centrox-$tan;
            }
            if($grado<360&&$grado>270){
                $cos = cos(360-$grado)*$array[$conteo]["valor"];
                $tan = tan(360-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centrox+$tan;
            }
            $linea=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='black' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
        }
        $conteo++;
        echo($linea);
        echo($centrox. " : " .$centroy);
    }
    echo("</svg>");
    ?>
</body>

</html>
