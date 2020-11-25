<?php 
    include 'conexion.php';
    session_start();

    $usuario=$_POST['usuario'];
    $clave=md5($_POST['clave']);

    //conectando a la base de datos
    $consulta="SELECT * FROM usuario WHERE usuario='$usuario' and clave='$clave'";
    $resultado=mysqli_query($conexion,$consulta);
    $idUsuario = $resultado->fetch_array()['idUsuario'] ?? '';


    $consultaRol="SELECT U.idRol
                    from usuario U inner join rol R on U.idRol=R.idRol
                    where usuario='$usuario'";
    $res=mysqli_query($conexion,$consultaRol);
    $idRol = $res->fetch_array()['idRol'] ?? '';

    $filas=mysqli_num_rows($resultado);
    
    if($filas>0){
        $_SESSION['username']=$usuario;
        $_SESSION['idUsuario']=$idUsuario;
        $_SESSION['idRol']=$idRol;
        header("location:inicio.php");
    }else{
        echo    '<script>
                     alert("Error en la autenticacion") ;
                     window.history.go(-1);
                </script>';
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>