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
    // cuadrado arr iz
    // $bbdd=[1,"ad",50,2,"iz",90,3,"ad",50,4,"iz",90,5,"ad",50,6,"iz",90,7,"ad",50];
    // cuadrado arr d
    // $bbdd=[1,"ad",50,2,"d",90,3,"ad",50,4,"d",90,5,"ad",50,6,"d",90,7,"ad",50];
    // cuadrado aba d
    // $bbdd=[1,"at",50,2,"iz",90,3,"at",50,4,"iz",90,5,"at",50,6,"iz",90,7,"at",50];
    // cuadrado aba iz// $bbdd=[1,"at",50,2,"d",90,3,"at",50,4,"d",90,5,"at",50,6,"d",90,7,"at",50];
    // $bbdd=[1,"ad",50,2,"d",70,3,"at",10,4,"d",20,5,"ad",90,6,"d",20,7,"at",40,7,"at",50];
    $array=[];
    for($i=0;$i<count($bbdd);$i+=3){
        $array[]=["id"=>$bbdd[$i],"comando"=>$bbdd[$i+1],"valor"=>$bbdd[$i+2]];
    }
    
    $centrox=$tamano/2;
    $centroy=$tamano/2;
    
    $grado=0;
    $lineas=[];
    
    echo("<svg width=$tamano height=$tamano>");

    $conteo=0;
    for($i=0;$i<count($bbdd);$i+=3){ 
        if ($array[$conteo]["comando"]=="bp") {
            $lineas=[];
        }elseif ($array[$conteo]["comando"]=="d") {
            $grado = $grado + $array[$conteo]["valor"];
            if($grado>=360){
                $grado = $grado - 360;
            }
            echo($grado);
        }elseif ($array[$conteo]["comando"]=="iz") {
            $grado = $grado - $array[$conteo]["valor"];
            if($grado<0){
                $grado = 360 + $grado;
            }
            echo($grado);
        }elseif ($array[$conteo]["comando"]=="ad") {
            if($grado==0){
                $sin = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy-$sin;
            }elseif($grado==90){
                $cos = $array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy;
            }elseif($grado==180){
                $sin = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy+$sin;
            }elseif($grado==270){
                $cos = $array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy;
            }elseif($grado<90&&$grado>0){
                $cos = cos(90-$grado)*$array[$conteo]["valor"];
                $sin = sin(90-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy-$sin;
            }elseif($grado<180&&$grado>90){
                $cos = cos(180-$grado)*$array[$conteo]["valor"];
                $sin = sin(180-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy+$sin;
            }elseif($grado<270&&$grado>180){
                $cos = cos(270-$grado)*$array[$conteo]["valor"];
                $sin = sin(270-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy+$sin;
            }elseif($grado<360&&$grado>270){
                $cos = cos(360-$grado)*$array[$conteo]["valor"];
                $sin = sin(360-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy-$sin;
            }
            $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='blue' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
        }elseif ($array[$conteo]["comando"]=="at") {
            if($grado==0){
                $sin = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy+$sin;
            }elseif($grado==90){
                $cos = $array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy;
            }elseif($grado==180){
                $sin = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy-$sin;
            }elseif($grado==270){
                $cos = $array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy;
            }elseif($grado<90&&$grado>0){
                $cos = cos(90-$grado)*$array[$conteo]["valor"];
                $sin = sin(90-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy-$sin;
            }elseif($grado<180&&$grado>90){
                $cos = cos(180-$grado)*$array[$conteo]["valor"];
                $sin = sin(180-$grado)*$array[$conteo]["valor"];
                $xf=$centrox+$cos;
                $yf=$centroy+$sin;
            }elseif($grado<270&&$grado>180){
                $cos = cos(270-$grado)*$array[$conteo]["valor"];
                $sin = sin(270-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy+$sin;
            }elseif($grado<360&&$grado>270){
                $cos = cos(360-$grado)*$array[$conteo]["valor"];
                $sin = sin(360-$grado)*$array[$conteo]["valor"];
                $xf=$centrox-$cos;
                $yf=$centroy-$sin;
            }
            $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='black' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
            
        }
        $conteo++;
        // echo("$centrox , $centroy , ");
        // echo($grado);
    }
    foreach ($lineas as $value) {
        echo($value);
    }

    echo("</svg>");
    ?>
</body>

</html>
