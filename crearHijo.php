<?php
include 'conexion.php';
session_start();
$usuario = $_SESSION['username'];
$idUsuario = $_SESSION['idUsuario'];

$fechaActual = date("Y-m-d H:i:s", time());
$nombreHijo = $_POST['nombreHijo'];
$codigoPais = $_POST['codigoPais'];
$celular = $_POST['celular'];
$operadorMovil = $_POST['operadorMovil'];
$imei = $_POST['imei'];

$esActualizar=isset($_POST['esActualizar']) ? $_POST['esActualizar']: "0";
$idHijoForm= isset($_POST['idHijo']) ? $_POST['idHijo']: "";

$idDispositivo = "SELECT D.idDispositivo
                    FROM dispositivo D
                    WHERE D.imei='$imei'";
$resultadoIdDis = mysqli_query($conexion, $idDispositivo);
$idDispositivo = $resultadoIdDis->fetch_array()['idDispositivo'] ?? '';


if ($esActualizar == "1") {
    $actualizarHijo =  "UPDATE hijo SET nombreHijo='$nombreHijo', codigoPais='$codigoPais',celular='$celular',
                        operadorMovil='$operadorMovil',imei='$imei'
                        WHERE idHijo='$idHijoForm'";
    $resultadoActualizar=mysqli_query($conexion,$actualizarHijo); 

    if (!$resultadoActualizar) {
        echo    '<script>
                    alert("Error al registrar") ;
                    window.history.go(-1);
                </script>';
    } else {
        header("location:hijo.php");
        echo    '<script>
                    alert("Hijo exitosamente registrado") ;
                </script>';
    }

} else {
    $insertar = "INSERT INTO hijo(nombreHijo,codigoPais,celular,operadorMovil,imei,idUsuario,idDispositivo) 
                    VALUES('$nombreHijo','$codigoPais','$celular','$operadorMovil','$imei','$idUsuario','$idDispositivo')";
    $resultado = mysqli_query($conexion, $insertar);
    
    
    if ($resultado == 1) {
        $idHijoConsulta = "SELECT idHijo from hijo where idUsuario=$idUsuario
                    order by idHijo desc
                    limit 1";
        $resultadoIdHijo = mysqli_query($conexion, $idHijoConsulta);
        $idHijo = $resultadoIdHijo->fetch_array()['idHijo'] ?? '';
    
        $insertarSeguimiento = "INSERT INTO seguimiento (fechaInicio, idHijo) VALUES('$fechaActual',$idHijo)";
        
        $resultadoSeguimiento = mysqli_query($conexion, $insertarSeguimiento);
    
            if (!$resultado && !$resultadoSeguimiento) {
                echo    '<script>
                            alert("Error al registrar") ;
                            window.history.go(-1);
                        </script>';
            } else {
                header("location:hijo.php");
                echo    '<script>
                            alert("Hijo exitosamente registrado") ;
                        </script>';
            }
    }
}

mysqli_close($conexion);
