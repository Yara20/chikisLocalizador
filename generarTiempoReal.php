<?php
include 'conexion.php';
session_start();
$idUsuario = $_SESSION['idUsuario'];
$idHijoSelect = isset($_POST['idHijoSelect']) ? $_POST['idHijoSelect'] :"" ;

if ($idHijoSelect == "") {
    echo    '<script>
                     alert("Error al generar reporte en tiempo real") ;
                     window.history.go(-1);
                </script>';
} else {

    $sql = "SELECT count(*) as total
            from seguimiento
            where fechaFin is null and idHijo='$idHijoSelect'";
    $resultado = mysqli_query($conexion, $sql);
    $total = $resultado->fetch_array()['total'] ?? '';
    $estaActivado = $total > 0;
    if($estaActivado){
        $sql = "SELECT L.idLocalizacion, L.latitud, L.longitud, L.fechaActualizacion
        from localizacion L inner join hijo H on L.idHijo=H.idHijo inner join usuario U on U.idUsuario=H.idUsuario 
        where U.idUsuario=$idUsuario and H.idHijo=$idHijoSelect";

        $_SESSION['sqlReporteTiempoReal'] = $sql;
        $_SESSION['seGeneroTiemporeal'] = "1";
    } else {
        $_SESSION['seGeneroTiemporeal'] = "2";
    }
    header('location:reporteTiempoReal.php');
}

