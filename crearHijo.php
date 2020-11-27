<?php
include 'conexion.php';
session_start();
$usuario = $_SESSION['username'];
$idUsuario = $_SESSION['idUsuario'];

$fechaActual = date("Y-m-d H:i:s", time());
echo $fechaActual;
$nombreHijo = $_POST['nombreHijo'];
$codigoPais = $_POST['codigoPais'];
$celular = $_POST['celular'];
$operadorMovil = $_POST['operadorMovil'];
$imei = $_POST['imei'];

$idDispositivo = "SELECT D.idDispositivo
                    FROM dispositivo D
                    WHERE D.imei='$imei'";
$resIdDis = mysqli_query($conexion, $idDispositivo);
$idDispositivo = $resIdDis->fetch_array()['idDispositivo'] ?? '';

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


mysqli_close($conexion);
