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
    
    $bbdd=[];
    $tamano=600;
    // cuadrado arr iz
    // $bbdd=[1,"ad",50,2,"iz",90,3,"ad",50,4,"iz",90,5,"ad",50,6,"iz",90,7,"ad",50];
    // cuadrado arr d
    // $bbdd=[1,"ad",50,2,"de",90,3,"ad",50,4,"de",90,5,"ad",50,6,"de",90,7,"ad",50];
    // cuadrado aba d
    // $bbdd=[1,"at",50,2,"iz",90,3,"at",50,4,"iz",90,5,"at",50,6,"iz",90,7,"at",50];
    // cuadrado aba iz
    // $bbdd=[1,"at",50,2,"de",90,3,"at",50,4,"de",90,5,"at",50,6,"de",90,7,"at",50];
    // loop
    // $bbdd=[1,"ad",200,2,"de",120,3,"ad",100,4,"de",120,5,"ad",100,6,"iz",120,7,"ad",100,8,"iz",120,9,"ad",100,10,"de",120,1,"ad",200,2,"de",120,3,"ad",100,4,"de",120,5,"ad",100,6,"iz",120,7,"ad",100,8,"iz",120,9,"ad",100,10,"de",120,1,"ad",200,2,"de",120,3,"ad",100,4,"de",120,5,"ad",100,6,"iz",120,7,"ad",100,8,"iz",120,9,"ad",100,10,"de",120];
    //pruebas
    // $bbdd=[1,"ad","50",2,"de","70",3,"at","10",4,"de","20",5,"casa","T",6,"ad",90,7,"de",20,8,"at",40,9,"sl","T",10,"at",50,11,"bl","T",12,"at",50];
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

    $grado=mover($array,$tamano,$grado,$centrox,$centroy);
    echo($grado);
    //creacion de tortuga
    $arrayT=[1,"de",90,2,"ad",15,3,"iz",90,4,"ad",5,4,"iz",90,6,"ad",10,7,"de",90,8,"ad",10,9,"de",90,10,"ad",10,11,"iz",90,12,"ad",5,13,"iz",90,14,"ad",10,15,"de",90,16,"ad",10,17,"iz",90,18,"ad",10,19,"iz",90,20,"ad",10,21,"de",90,22,"ad",10,23,"iz",90,24,"ad",5,25,"iz",90,26,"ad",10,27,"de",90,28,"ad",10,29,"de",90,30,"ad",10,31,"iz",90,32,"ad",5,33,"iz",90,34,"ad",15,35,"iz",90];
        $arrayTF=[];
        for($i=0;$i<count($arrayT);$i+=3){
            $arrayTF[]=["id"=>$arrayT[$i],"comando"=>$arrayT[$i+1],"valor"=>$arrayT[$i+2]];
        }
    mover($arrayTF,$tamano,$grado,$centrox,$centroy);
    function mover($arr,$tamano,$grado,$centrox,$centroy){
        $lineas=[];
        $color="#000000";
        $conteo=0;
        
        for($i=0;$i<count($arr);$i++){ 
            if($arr[$conteo]["comando"]=="bp") {
                $lineas=[];
            }elseif($arr[$conteo]["comando"]=="de") {
                $grado = $grado + $arr[$conteo]["valor"];
                if($grado>=360){
                    $grado = $grado - 360;
                }
            }elseif($arr[$conteo]["comando"]=="iz") {
                $grado = $grado - $arr[$conteo]["valor"];
                if($grado<0){
                    $grado = 360 + $grado;
                }
            }elseif($arr[$conteo]["comando"]=="sl") {
                $color="#FFFFFF";
            }elseif($arr[$conteo]["comando"]=="bl") {
                $color="#000000";
            }elseif ($arr[$conteo]["comando"]=="casa") {
                $centrox=$tamano/2;
                $centroy=$tamano/2;
            }elseif($arr[$conteo]["comando"]=="ad") {
                if($grado==0){
                    $valor = $arr[$conteo]["valor"];
                    $xf=$centrox;
                    $yf=$centroy-$valor;
                }elseif($grado==90){
                    $valor = $arr[$conteo]["valor"];
                    $xf=$centrox+$valor;
                    $yf=$centroy;
                }elseif($grado==180){
                    $valor = $arr[$conteo]["valor"];
                    $xf=$centrox;
                    $yf=$centroy+$valor;
                }elseif($grado==270){
                    $valor = $arr[$conteo]["valor"];
                    $xf=$centrox-$valor;
                    $yf=$centroy;
                }elseif($grado<90&&$grado>0){
                    $rh=(pi()/180)*(90-($grado));
                    $cos=(cos($rh)*$arr[$conteo]["valor"]);
                    $sin=(sin($rh)*$arr[$conteo]["valor"]);
                    $xf=$centrox+$cos;
                    $yf=$centroy-$sin;
                }elseif($grado<180&&$grado>90){
                    $rh=(pi()/180)*(180-($grado));
                    $cos=(cos($rh)*$arr[$conteo]["valor"]);
                    $sin=(sin($rh)*$arr[$conteo]["valor"]);
                    $xf=$centrox+$sin;
                    $yf=$centroy+$cos;
                }elseif($grado<270&&$grado>180){
                    $rh=(pi()/180)*(270-($grado));
                    $cos=(cos($rh)*$arr[$conteo]["valor"]);
                    $sin=(sin($rh)*$arr[$conteo]["valor"]);
                    $xf=$centrox-$cos;
                    $yf=$centroy+$sin;
                }elseif($grado<360&&$grado>270){
                    $rh=(pi()/180)*(360-($grado));
                    $cos=(cos($rh)*$arr[$conteo]["valor"]);
                    $sin=(sin($rh)*$arr[$conteo]["valor"]);
                    $xf=$centrox-$sin;
                    $yf=$centroy-$cos;
                }
                $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
                $centrox=$xf;
                $centroy=$yf;
            }elseif($arr[$conteo]["comando"]=="at") {
                if($grado==0){
                    $sin = $arr[$conteo]["valor"];
                    $xf=$centrox;
                    $yf=$centroy+$sin;
                }elseif($grado==90){
                    $cos = $arr[$conteo]["valor"];
                    $xf=$centrox-$cos;
                    $yf=$centroy;
                }elseif($grado==180){
                    $sin = $arr[$conteo]["valor"];
                    $xf=$centrox;
                    $yf=$centroy-$sin;
                }elseif($grado==270){
                    $cos = $arr[$conteo]["valor"];
                    $xf=$centrox+$cos;
                    $yf=$centroy;
                }elseif($grado<90&&$grado>0){
                    $cos = cos(90-$grado)*$arr[$conteo]["valor"];
                    $sin = sin(90-$grado)*$arr[$conteo]["valor"];
                    $xf=$centrox+$cos;
                    $yf=$centroy-$sin;
                }elseif($grado<180&&$grado>90){
                    $cos = cos(180-$grado)*$arr[$conteo]["valor"];
                    $sin = sin(180-$grado)*$arr[$conteo]["valor"];
                    $xf=$centrox+$sin;
                    $yf=$centroy+$cos;
                }elseif($grado<270&&$grado>180){
                    $cos = cos(270-$grado)*$arr[$conteo]["valor"];
                    $sin = sin(270-$grado)*$arr[$conteo]["valor"];
                    $xf=$centrox-$cos;
                    $yf=$centroy+$sin;
                }elseif($grado<360&&$grado>270){
                    $cos = cos(360-$grado)*$arr[$conteo]["valor"];
                    $sin = sin(360-$grado)*$arr[$conteo]["valor"];
                    $xf=$centrox-$sin;
                    $yf=$centroy-$cos;
                }
                $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
                $centrox=$xf;
                $centroy=$yf;
            }
            $conteo++;
        }
        foreach ($lineas as $value) {
            echo($value);
        }
        return($grado);
    }
    
    echo("</svg>");
?>