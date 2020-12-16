<?php 
    include 'conexion.php';

    $idHijo = $_GET['id'];

    $eliminarHijo =  "UPDATE hijo SET estado='0'
                            WHERE idHijo='$idHijo'";
    $resultado=mysqli_query($conexion,$eliminarHijo);
    if (!$resultado) {
        echo    '<script>
                     alert("Error al eliminar Hijo") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:hijo.php");
        echo    '<script>
                     alert("Hijo exitosamente eliminado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>