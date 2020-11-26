<?php 
    include 'conexion.php';
    session_start();
    $idUsuario = $_SESSION['idUsuario'];
    $idHijoSelect=$_POST['idHijoSelect'];

    $sql = "SELECT L.idLocalizacion, L.latitud, L.longitud, L.fechaActualizacion
    from localizacion L inner join hijo H on L.idHijo=H.idHijo inner join usuario U on U.idUsuario=H.idUsuario 
    where U.idUsuario=$idUsuario and H.idHijo=$idHijoSelect";

    $_SESSION['sqlReporteTiempoReal'] = $sql;
    $_SESSION['seGeneroTiemporeal'] = "1";
    header('location:reporteTiempoReal.php');
?>