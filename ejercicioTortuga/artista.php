<?php
    // $dsn = "mysql:host=db";
    // $usuarioBD = "alumnado";
    // $claveBD = "alumnado";
    // try {
    //     $bd = new PDO($dsn, $usuarioBD, $claveBD);
    //     $sql3 = "SELECT * FROM comandos com INNER JOIN usuarios usu ON usu.id_user = com.id_user";
    //     $resultadoObtener = $bd->query($sql3);

    //     $array = [];

    //     while ($elemento = $resultadoObtener->fetch()) {
    //         $fila['id'] = $elemento['id'];
    //         $fila['comando'] = $elemento['comando'];
    //         $fila['valor'] = $elemento['valor'];
    //         $fila['id_user'] = $elemento['id_user'];
    //         $fila['id_user'] = $elemento['id_user'];
    //         $fila['nombre'] = $elemento['nombre'];
    //         $fila['pass'] = $elemento['pass'];

    //         $array[] = $fila;
    //     }
    // } catch (PDOException $e) {
    //     echo 'Falló la conexión: ' . $e->getMessage();
    // }

    $tamano=500;
    // cuadrado arr iz
    // $bbdd=[1,"ad",50,2,"iz",90,3,"ad",50,4,"iz",90,5,"ad",50,6,"iz",90,7,"ad",50];
    // cuadrado arr d
    // $bbdd=[1,"ad",50,2,"de",90,3,"ad",50,4,"de",90,5,"ad",50,6,"de",90,7,"ad",50];
    // cuadrado aba d
    // $bbdd=[1,"at",50,2,"iz",90,3,"at",50,4,"iz",90,5,"at",50,6,"iz",90,7,"at",50];
    // cuadrado aba iz
    // $bbdd=[1,"at",50,2,"de",90,3,"at",50,4,"de",90,5,"at",50,6,"de",90,7,"at",50];
    //pruebas
    $bbdd=[1,"ad","50",2,"de","70",3,"at","10",4,"de","20",5,"casa","T",6,"ad",90,7,"de",20,8,"at",40,9,"sl","T",10,"at",50,11,"bl","T",12,"at",50];
    $array=[];
    for($i=0;$i<count($bbdd);$i+=3){
        $array[]=["id"=>$bbdd[$i],"comando"=>$bbdd[$i+1],"valor"=>$bbdd[$i+2]];
    }
    
    $centrox=$tamano/2;
    $centroy=$tamano/2;
    
    $grado=0;
    $lineas=[];
    $color="#000000";
    $conteo=0;
    
    echo("<svg width=$tamano height=$tamano>");

    for($i=0;$i<count($array);$i++){ 
        if($array[$conteo]["comando"]=="bp") {
            $lineas=[];
        }elseif($array[$conteo]["comando"]=="de") {
            $grado = $grado + $array[$conteo]["valor"];
            if($grado>=360){
                $grado = $grado - 360;
            }
        }elseif($array[$conteo]["comando"]=="iz") {
            $grado = $grado - $array[$conteo]["valor"];
            if($grado<0){
                $grado = 360 + $grado;
            }
        }elseif($array[$conteo]["comando"]=="sl") {
            $color="#FFFFFF";
        }elseif($array[$conteo]["comando"]=="bl") {
            $color="#000000";
        }elseif ($array[$conteo]["comando"]=="casa") {
            $centrox=$tamano/2;
            $centroy=$tamano/2;
        }elseif($array[$conteo]["comando"]=="ad") {
            if($grado==0){
                $valor = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy-$valor;
            }elseif($grado==90){
                $valor = $array[$conteo]["valor"];
                $xf=$centrox+$valor;
                $yf=$centroy;
            }elseif($grado==180){
                $valor = $array[$conteo]["valor"];
                $xf=$centrox;
                $yf=$centroy+$valor;
            }elseif($grado==270){
                $valor = $array[$conteo]["valor"];
                $xf=$centrox-$valor;
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
            $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
        }elseif($array[$conteo]["comando"]=="at") {
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
            $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
            $centrox=$xf;
            $centroy=$yf;
        }
        $conteo++;
    }
    print_r($lineas);
    foreach ($lineas as $value) {
        echo($value);
    }
    echo("</svg>");
?>