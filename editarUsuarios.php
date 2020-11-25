<?php 
    include 'conexion.php';

    $nombreCompleto=$_POST['nombreCompleto'];
    $ci=$_POST['ci'];
    $correo=$_POST['correo'];
    $codigoPais=$_POST['codigoPais'];
    $celular=$_POST['celular'];
    $usuario=$_POST['usuario'];
    $clave=md5($_POST['clave']);    
    $idRol=$_POST['tipoRol'];
    if($idRol=="Administrador"){
        $idRol=1;
    }else{
        if ($idRol=="Padre") {
            $idRol=2;
        }        
    }

    $editar=    "SELECT nombreCompletoN,ci,correo,codigoPais,celular,usuario,clave,idRol
                FROM usuario;"
    $resultado=mysqli_query($conexion,$insertar);

    if (!$resultado) {
        echo    '<script>
                     alert("Error al registrar Usuario") ;
                     window.history.go(-1);
                </script>';
    }else{
        echo    $idRol;
        header("location:usuarios.php");
        echo    '<script>
                     alert("Usuario exitosamente registrado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>