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
    $usuarioOriginal= isset($_POST['usuarioOriginal']) ? $_POST['usuarioOriginal']: "";

    $existeUsuarioConsulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $resultadoExisteUsuario = mysqli_query($conexion, $existeUsuarioConsulta);
    $cantidadUsuarioMismoNombre = mysqli_num_rows($resultadoExisteUsuario);

    if ($cantidadUsuarioMismoNombre > 0 && $usuarioOriginal != $usuario) {
        echo    '<script>
            alert("Error: El nombre de usuario ya existe") ;
            window.history.go(-1);
        </script>';
    } else {
        if($esActualizar == "1") {
            $actualizarUsuario =  "UPDATE usuario SET nombreCompleto='$nombreCompleto', ci='$ci',correo='$correo',codigoPais='$codigoPais',
                                                        celular='$celular',usuario='$usuario',idRol='$idRol'
                                    WHERE idUsuario='$idUsuario'";
            $resultado=mysqli_query($conexion,$actualizarUsuario);                      
        } else if($esActualizar == "2") {
            $actualizarUsuario =  "UPDATE usuario SET nombreCompleto='$nombreCompleto', ci='$ci',correo='$correo',codigoPais='$codigoPais',
                                                        celular='$celular',usuario='$usuario', clave='$clave'
                                    WHERE idUsuario='$idUsuario'";
            $resultado=mysqli_query($conexion,$actualizarUsuario);                      
        } else if ($esActualizar == "3") {
            $insertar=" INSERT INTO usuario(nombreCompleto,ci,correo,codigoPais,celular,usuario,clave) 
                VALUES('$nombreCompleto','$ci','$correo','$codigoPais','$celular','$usuario','$clave')";
            $resultado=mysqli_query($conexion,$insertar);
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

            if ($esActualizar == "3") {
                header("location:index.php");
                echo    '<script>
                             alert("Usuario exitosamente registrado") ;
                        </script>';
            } else {
                header("location:usuarios.php");
                echo    '<script>
                             alert("Usuario exitosamente registrado") ;
                        </script>';
            }
            
            
        }
        mysqli_close($conexion);
    }

    
?>