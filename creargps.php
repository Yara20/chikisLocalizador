<?php 
    
    $conexion=mysqli_connect("localhost","id14626911_root1","YaraRomero123*","id14626911_dbgps1");

    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];

    $insertar='INSERT INTO datos(latitud,longitud)
                VALUES('$latitud' , '$longitud');';
    $resultado=mysqli_query($conexion,$insertar);

    if (!$resultado) {
        echo $conexion;
        echo    '<script>
        
                     alert("Error".$conexion) ;
                     //window.history.go(-1);
                </script>';
    }else{
        echo    '<script>
                     alert("Dispositivo exitosamente registrado") ;
                </script>';
        //header("location:gps.html");
    }
    mysqli_close($conexion);

    echo("latitud: ".$latitud);
    echo("longitud: ".$longitud);
    
?>
