<?php 
    include 'conexion.php';

    $idUser = $_GET['id'];

    $eliminarUsuario =  "UPDATE usuario SET estado='0'
                            WHERE idUsuario='$idUser'";
    $resultado=mysqli_query($conexion,$eliminarUsuario);
    if (!$resultado) {
        echo    '<script>
                     alert("Error al eliminar Usuario") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:usuarios.php");
        echo    '<script>
                     alert("Usuario exitosamente eliminado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>