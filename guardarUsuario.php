<?php 
    include 'conexion.php';
    session_start();
    $nombreCompleto=$_POST['nombreCompleto'];
    $ci=$_POST['ci'];
    $correo=$_POST['correo'];
    $codigoPais=$_POST['codigoPais'];
    $celular=$_POST['celular'];
    $usuario=$_POST['usuario'];
    $clave= md5(isset($_POST['clave']) ? $_POST['clave']: "");    
    $idRol=$_POST['tipoRol'];
    $esActualizar=$_POST['esActualizar'];
    $idUsuario= isset($_POST['idUsuario']) ? $_POST['idUsuario']: "";

    if($esActualizar == "1") {
        $actualizarUsuario =  "UPDATE usuario SET nombreCompleto='$nombreCompleto', ci='$ci',correo='$correo',codigoPais='$codigoPais',
                                                    celular='$celular',usuario='$usuario',idRol='$idRol'
                                WHERE idUsuario='$idUsuario'";
        $resultado=mysqli_query($conexion,$actualizarUsuario);                      
    } else if($esActualizar == "2") {
        $actualizarUsuario =  "UPDATE usuario SET nombreCompleto='$nombreCompleto', ci='$ci',correo='$correo',codigoPais='$codigoPais',
                                                    celular='$celular',usuario='$usuario'
                                WHERE idUsuario='$idUsuario'";
        $resultado=mysqli_query($conexion,$actualizarUsuario);                      
    } else {
        $insertar=" INSERT INTO usuario(nombreCompleto,ci,correo,codigoPais,celular,usuario,clave,idRol) 
                    VALUES('$nombreCompleto','$ci','$correo','$codigoPais','$celular','$usuario','$clave','$idRol')";
        $resultado=mysqli_query($conexion,$insertar);
    }
    if (!$resultado) {
        echo    '<script>
                     alert("Error al registrar Usuario") ;
                     window.history.go(-1);
                </script>';
    }else{
        if($esActualizar == "2") {
            $selectUsuario =  "SELECT usuario FROM usuario WHERE idUsuario='$idUsuario'";
            $resultadoSelect=mysqli_query($conexion,$selectUsuario);
            $_SESSION['username'] = $resultadoSelect->fetch_array()['usuario'] ?? '';;
        }
        header("location:usuarios.php");
        echo    '<script>
                     alert("Usuario exitosamente registrado") ;
                </script>';
        
        
    }
    mysqli_close($conexion);
?>