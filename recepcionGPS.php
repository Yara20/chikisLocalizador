<?php 
    //$conexion=mysqli_connect("localhost","id14626911_root1","YaraRomero123*","id14626911_dbgps1");
    include 'conexion.php';

    //SELECT DATE_SUB(NOW(), INTERVAL 2 HOUR);

    $latitud=$_GET['latitud'];
    $longitud=$_GET['longitud'];
    $imei=$_GET['imei'];

    $consultaHijo="SELECT H.idHijo
            FROM hijo H
            WHERE H.imei='$imei'";
    $resIdHijo=mysqli_query($conexion,$consultaHijo);
    $idHijo = $resIdHijo->fetch_array()['idHijo'] ?? '';

    
    $valLat=preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $latitud);
    $valLgt=preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $longitud);
    //echo $valLat;
    //echo $valLgt;
    if ($valLat!=1 || $valLgt!=1) {
        echo    '<script>
                        alert("Error latitud o longitud") ;
                </script>';
    }else{
        $insertar="INSERT INTO localizacion(latitud,longitud,imei,idHijo) 
                VALUES('$latitud',' $longitud','$imei','$idHijo')";
        $resultado=mysqli_query($conexion,$insertar);
    }


    if (!$resultado) {        
        echo    '<script>
                     alert("Error al registrar Localizacion") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:reporte.php");
        echo    '<script>
                     alert("exitosamente registrado") ;
                </script>';
        
    }
    mysqli_close($conexion);



?>