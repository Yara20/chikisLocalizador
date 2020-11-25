<?php 
    include 'conexion.php';

    $nombreCompleto=$_POST['nombreCompleto'];
    $ci=$_POST['ci'];
    $correo=$_POST['correo'];
    $codigoPais=$_POST['codigoPais'];
    $celular=$_POST['celular'];
    $usuario=$_POST['usuario'];
    $clave=md5($_POST['clave']);  

    $insertar=" INSERT INTO usuario(nombreCompleto,ci,correo,codigoPais,celular,usuario,clave) 
                VALUES('$nombreCompleto','$ci','$correo','$codigoPais','$celular','$usuario','$clave')";
    $resultado=mysqli_query($conexion,$insertar);

    if (!$resultado) {
        echo    '<script>
                     alert("Error al registrar Usuario") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:index.php");
        echo    '<script>
                     alert("Usuario exitosamente registrado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>