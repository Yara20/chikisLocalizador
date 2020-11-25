<?php 
    include 'conexion.php';

    $imei=$_POST['imei'];
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];

    $insertar="INSERT INTO dispositivo(imei,modelo,precio) 
                VALUES('$imei','$modelo','$precio')";
    $resultado=mysqli_query($conexion,$insertar);

    if (!$resultado) {
        echo    '<script>
                     alert("Error al registrar Hijo") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:dispositivo.php");
        echo    '<script>
                     alert("Dispositivo exitosamente registrado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>