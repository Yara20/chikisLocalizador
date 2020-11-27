<?php 
    include 'conexion.php';
    session_start();
    $idSeguimientoSeleccionado= $_POST['idSeguimientoSeleccionado'] == "" ? $_SESSION['idSeguimientoSeleccionado']: $_POST['idSeguimientoSeleccionado'];
    
    $idHijoSelect=$_POST['idHijoSelect'];
    $_SESSION['fechaInicioHidden']= $_POST['fechaInicioHidden'] == ""? $_SESSION['fechaInicioHidden']: $_POST['fechaInicioHidden'];

    $_SESSION['fechaFinHidden']= $_POST['fechaFinHidden'] == ""? $_SESSION['fechaFinHidden']: $_POST['fechaFinHidden'];
    $_SESSION['fechaFinHidden'];    
    $_SESSION['idSeguimientoSeleccionado']=$idSeguimientoSeleccionado; 

    $_SESSION['estaGeneradoReporte']="1";

    $sql = "SELECT L.idLocalizacion, L.latitud, L.longitud, L.fechaActualizacion, L.idHijo, H.nombreHijo, S.idSeguimiento, S.fechaInicio, S.fechaFin
            from localizacion L 
            inner join hijo H on L.idHijo=H.idHijo 
            inner join seguimiento S on S.idHijo=H.idHijo and S.fechaInicio <= L.fechaActualizacion and S.fechaFin >= L.fechaActualizacion
            WHERE H.idHijo = $idHijoSelect and S.idSeguimiento = $idSeguimientoSeleccionado";
    $_SESSION['sqlReporte'] = $sql;
    $resultado=mysqli_query($conexion,$sql);

    while ($mostrar = mysqli_fetch_array($resultado)) {
        // echo $mostrar['idLocalizacion'];
        // echo $mostrar['latitud'];
        // echo $mostrar['longitud'];
        // echo $mostrar['fechaActualizacion'];
        // echo "\n";
    }
    // echo $_SESSION['estaGeneradoReporte'];
    if (!$resultado) {
        echo    '<script>
                     alert("Error al registrar Usuario") ;
                     window.history.go(-1);
                </script>';
    }else{
        header("location:reporte.php");
        echo    '<script>
                     alert("Usuario exitosamente registrado") ;
                </script>';
        
    }
    mysqli_close($conexion);
?>  