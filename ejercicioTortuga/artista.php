<?php
    //Saul Alonso Sanchez Grupo 1
    $dsn = "mysql:dbname=logoBBDD;host=db";
    $usuarioBD = "alumnado"; 
    $claveBD = "alumnado";
    try {
        $bd = new PDO($dsn, $usuarioBD, $claveBD);
        $sql3 = "SELECT * FROM comandos";
        $resultadoObtener = $bd->query($sql3);

        $array = [];

        foreach($resultadoObtener as $elemento) {
            $fila['id'] = $elemento['id'];
            $fila['comando'] = $elemento['comando'];
            $fila['valor'] = $elemento['valor'];
            $fila['id_user'] = $elemento['id_user'];
            $array[] = $fila;
        }
    } catch (PDOException $e) {
    }
    

    $tamano=500;

    // $bbdd=[];
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
    // $bbdd=[1,"ad",40,2,"iz",35,3,"at",80,4,"de",32,5,"ad",50,6,"de",70];
    // $array=[];
    // for($i=0;$i<count($bbdd);$i+=3){
    //     $array[]=["id"=>$bbdd[$i],"comando"=>$bbdd[$i+1],"valor"=>$bbdd[$i+2]];
    // }
    
    $centrox=$tamano/2;
    $centroy=$tamano/2;
    
    $grado=0;
    $lineas=[];
    $color="#000000";
    $conteo=0;
    $pintar=True;
    
    //Comprueba que existe array
    if (isset($array)) {
        //Comienza svg
        echo("<svg width=$tamano height=$tamano>");
        //recorre Array
        for($i=0;$i<count($array);$i++){ 
            if($array[$conteo]["comando"]=="bp" || $array[$conteo]["comando"]=="borrarpantalla") {
                $lineas=[];
            }elseif($array[$conteo]["comando"]=="de" || $array[$conteo]["comando"]=="derecha") {
                $grado = $grado + $array[$conteo]["valor"];
                if($grado>=360){
                    //si es mayor 360 resta una vuelta
                    $grado = $grado / 360;
                }
            }elseif($array[$conteo]["comando"]=="iz" || $array[$conteo]["comando"]=="izquierda") {
                $grado = $grado - $array[$conteo]["valor"];
                if($grado<0){
                    //si es mayor 360 suma una vuelta
                    $grado = 360 * $grado;
                }
            }elseif($array[$conteo]["comando"]=="sl" || $array[$conteo]["comando"]=="subirlapiz") {
                $color="#FFFFFF";
            }elseif($array[$conteo]["comando"]=="bl" || $array[$conteo]["comando"]=="bajarlapiz") {
                $color="#000000";
            }elseif ($array[$conteo]["comando"]=="casa") {
                $centrox=$tamano/2;
                $centroy=$tamano/2;
            }elseif($array[$conteo]["comando"]=="ot" || $array[$conteo]["comando"]=="ocultartortuga"){
                $pintar=False;
            }elseif($array[$conteo]["comando"]=="mt" || $array[$conteo]["comando"]=="mostrartortuga"){
                $pintar=True;
            }elseif($array[$conteo]["comando"]=="ad" || $array[$conteo]["comando"]=="adelante") {
                //Condicionales para dibujar dependiendo del grado
                if($grado==0){
                    $valor = (int)$array[$conteo]["valor"];
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
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $rh=(pi()/180)*(90-($grado));
                    $cos=(cos($rh)*$array[$conteo]["valor"]);
                    $sin=(sin($rh)*$array[$conteo]["valor"]);
                    $xf=$centrox+$cos;
                    $yf=$centroy-$sin;
                }elseif($grado<180&&$grado>90){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $rh=(pi()/180)*(180-($grado));
                    $cos=(cos($rh)*$array[$conteo]["valor"]);
                    $sin=(sin($rh)*$array[$conteo]["valor"]);
                    $xf=$centrox+$sin;
                    $yf=$centroy+$cos;
                }elseif($grado<270&&$grado>180){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $rh=(pi()/180)*(270-($grado));
                    $cos=(cos($rh)*$array[$conteo]["valor"]);
                    $sin=(sin($rh)*$array[$conteo]["valor"]);
                    $xf=$centrox-$cos;
                    $yf=$centroy+$sin;
                }elseif($grado<360&&$grado>270){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $rh=(pi()/180)*(360-($grado));
                    $cos=(cos($rh)*$array[$conteo]["valor"]);
                    $sin=(sin($rh)*$array[$conteo]["valor"]);
                    $xf=$centrox-$sin;
                    $yf=$centroy-$cos;
                }
                $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
                //Nuevo centro
                $centrox=$xf;
                $centroy=$yf;
            }elseif($array[$conteo]["comando"]=="at" || $array[$conteo]["comando"]=="atras") {
                //Condicionales para dibujar dependiendo del grado
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
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $cos = cos(90-$grado)*$array[$conteo]["valor"];
                    $sin = sin(90-$grado)*$array[$conteo]["valor"];
                    $xf=$centrox+$cos;
                    $yf=$centroy-$sin;
                }elseif($grado<180&&$grado>90){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $cos = cos(180-$grado)*$array[$conteo]["valor"];
                    $sin = sin(180-$grado)*$array[$conteo]["valor"];
                    $xf=$centrox+$sin;
                    $yf=$centroy+$cos;
                }elseif($grado<270&&$grado>180){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $cos = cos(270-$grado)*$array[$conteo]["valor"];
                    $sin = sin(270-$grado)*$array[$conteo]["valor"];
                    $xf=$centrox-$cos;
                    $yf=$centroy+$sin;
                }elseif($grado<360&&$grado>270){
                    //Calculos de trigonomrtria para hayar punto final de la recta
                    $cos = cos(360-$grado)*$array[$conteo]["valor"];
                    $sin = sin(360-$grado)*$array[$conteo]["valor"];
                    $xf=$centrox-$sin;
                    $yf=$centroy-$cos;
                }
                $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='verde' stroke-width='5' />");
                //Nuevo centro
                $centrox=$xf;
                $centroy=$yf;
            }
            $conteo++;
        }

        foreach ($lineas as $value) {
            echo($value);
        }
        
        //creacion de tortuga
        $lineas=[];
        $conteo=0;
        $arrayT=[];
        $arrayTF=[];
        if($pintar==True){
            $arrayT=[1,"de",90,2,"ad",15,3,"iz",90,4,"ad",5,4,"iz",90,6,"ad",10,7,"de",90,8,"ad",10,9,"de",90,10,"ad",10,11,"iz",90,12,"ad",5,13,"iz",90,14,"ad",10,15,"de",90,16,"ad",10,17,"iz",90,18,"ad",10,19,"iz",90,20,"ad",10,21,"de",90,22,"ad",10,23,"iz",90,24,"ad",5,25,"iz",90,26,"ad",10,27,"de",90,28,"ad",10,29,"de",90,30,"ad",10,31,"iz",90,32,"ad",5,33,"iz",90,34,"ad",15,35,"iz",90];
            for($i=0;$i<count($arrayT);$i+=3){
                $arrayTF[]=["id"=>$arrayT[$i],"comando"=>$arrayT[$i+1],"valor"=>$arrayT[$i+2]];
            }
        }
        
            for($i=0;$i<count($arrayTF);$i++){ 
                if($arrayTF[$conteo]["comando"]=="de") {
                    $grado = $grado + $arrayTF[$conteo]["valor"];
                    if($grado>=360){
                        $grado = $grado - 360;
                    }
                }elseif($arrayTF[$conteo]["comando"]=="iz") {
                    $grado = $grado - $arrayTF[$conteo]["valor"];
                    if($grado<0){
                        $grado = 360 + $grado;
                    }
                }elseif($arrayTF[$conteo]["comando"]=="ad") {
                    if($grado==0){
                        $valor = $arrayTF[$conteo]["valor"];
                        $xf=$centrox;
                        $yf=$centroy-$valor;
                    }elseif($grado==90){
                        $valor = $arrayTF[$conteo]["valor"];
                        $xf=$centrox+$valor;
                        $yf=$centroy;
                    }elseif($grado==180){
                        $valor = $arrayTF[$conteo]["valor"];
                        $xf=$centrox;
                        $yf=$centroy+$valor;
                    }elseif($grado==270){
                        $valor = $arrayTF[$conteo]["valor"];
                        $xf=$centrox-$valor;
                        $yf=$centroy;
                    }elseif($grado<90&&$grado>0){
                        $rh=(pi()/180)*(90-($grado));
                        $cos=(cos($rh)*$arrayTF[$conteo]["valor"]);
                        $sin=(sin($rh)*$arrayTF[$conteo]["valor"]);
                        $xf=$centrox+$cos;
                        $yf=$centroy-$sin;
                    }elseif($grado<180&&$grado>90){
                        $rh=(pi()/180)*(180-($grado));
                        $cos=(cos($rh)*$arrayTF[$conteo]["valor"]);
                        $sin=(sin($rh)*$arrayTF[$conteo]["valor"]);
                        $xf=$centrox+$sin;
                        $yf=$centroy+$cos;
                    }elseif($grado<270&&$grado>180){
                        $rh=(pi()/180)*(270-($grado));
                        $cos=(cos($rh)*$arrayTF[$conteo]["valor"]);
                        $sin=(sin($rh)*$arrayTF[$conteo]["valor"]);
                        $xf=$centrox-$cos;
                        $yf=$centroy+$sin;
                    }elseif($grado<360&&$grado>270){
                        $rh=(pi()/180)*(360-($grado));
                        $cos=(cos($rh)*$arrayTF[$conteo]["valor"]);
                        $sin=(sin($rh)*$arrayTF[$conteo]["valor"]);
                        $xf=$centrox-$sin;
                        $yf=$centroy-$cos;
                    }
                    $lineas[]=("<line x1='$centrox' y1='$centroy' x2='$xf' y2='$yf' stroke='$color' stroke-width='5' />");
                    $centrox=$xf;
                    $centroy=$yf;
                }elseif($arrayTF[$conteo]["comando"]=="at") {
                    if($grado==0){
                        $sin = $arrayTF[$conteo]["valor"];
                        $xf=$centrox;
                        $yf=$centroy+$sin;
                    }elseif($grado==90){
                        $cos = $arrayTF[$conteo]["valor"];
                        $xf=$centrox-$cos;
                        $yf=$centroy;
                    }elseif($grado==180){
                        $sin = $arrayTF[$conteo]["valor"];
                        $xf=$centrox;
                        $yf=$centroy-$sin;
                    }elseif($grado==270){
                        $cos = $arrayTF[$conteo]["valor"];
                        $xf=$centrox+$cos;
                        $yf=$centroy;
                    }elseif($grado<90&&$grado>0){
                        $cos = cos(90-$grado)*$arrayTF[$conteo]["valor"];
                        $sin = sin(90-$grado)*$arrayTF[$conteo]["valor"];
                        $xf=$centrox+$cos;
                        $yf=$centroy-$sin;
                    }elseif($grado<180&&$grado>90){
                        $cos = cos(180-$grado)*$arrayTF[$conteo]["valor"];
                        $sin = sin(180-$grado)*$arrayTF[$conteo]["valor"];
                        $xf=$centrox+$sin;
                        $yf=$centroy+$cos;
                    }elseif($grado<270&&$grado>180){
                        $cos = cos(270-$grado)*$arrayTF[$conteo]["valor"];
                        $sin = sin(270-$grado)*$arrayTF[$conteo]["valor"];
                        $xf=$centrox-$cos;
                        $yf=$centroy+$sin;
                    }elseif($grado<360&&$grado>270){
                        $cos = cos(360-$grado)*$arrayTF[$conteo]["valor"];
                        $sin = sin(360-$grado)*$arrayTF[$conteo]["valor"];
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
    }
    //cierra svg
    echo("</svg>");
?>