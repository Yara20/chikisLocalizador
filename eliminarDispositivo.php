<?php 
    include 'conexion.php';

    $idDispositivo = $_GET['id'];

    $eliminarDispositivo =  "UPDATE dispositivo SET estado='0'
                            WHERE idDispositivo='$idDispositivo'";
    $resultado=mysqli_query($conexion,$eliminarDispositivo);
    if (!$resultado) {
        echo    '<script>
                     alert("Error al eliminar Dispositivo") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:dispositivo.php");
        echo    '<script>
                     alert("Dispositivo exitosamente eliminado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>