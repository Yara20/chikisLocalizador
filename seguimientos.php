<?php
    include 'conexion.php';
    $idHijoSeleccionado = $_POST['idHijoSeleccionado'];

    $sql = "SELECT count(*) as total
            from seguimiento
            where fechaFin is null and idHijo='$idHijoSeleccionado'";
    $resultado = mysqli_query($conexion, $sql);
    $total = $resultado->fetch_array()['total'] ?? '';
    $estaActivado = $total > 0;
    $fechaActual = date("Y-m-d H:i:s", time());

    if($estaActivado){
        //procedemos a desactivar...
        $sqlIdSeguimiento="SELECT idSeguimiento
                            from seguimiento
                            where fechaFin is null and idHijo='$idHijoSeleccionado'";
        $resultadoIdSeguimiento = mysqli_query($conexion, $sqlIdSeguimiento);
        $idSeguimiento = $resultadoIdSeguimiento->fetch_array()['idSeguimiento'] ?? '';

        
        $actualizar="UPDATE seguimiento set fechaFin='$fechaActual'
                    where idHijo='$idHijoSeleccionado' and idSeguimiento='$idSeguimiento'";
        $resultadoIdSeguimiento = mysqli_query($conexion, $actualizar);

    } else {
        //procedemos a activar...
        $insertarSeguimiento = "INSERT INTO seguimiento (fechaInicio, idHijo) VALUES('$fechaActual',$idHijoSeleccionado)";    
        $resultadoSeguimiento = mysqli_query($conexion, $insertarSeguimiento);
    }
    if (!$resultado) {
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

    mysqli_close($conexion);
?>
