<?php 
    include 'conexion.php';

    $imei=$_POST['imei'];
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];
    $esActualizar=isset($_POST['esActualizar']) ? $_POST['esActualizar']: "0";
    $idDispositivo= isset($_POST['idDispositivo']) ? $_POST['idDispositivo']: "";
    $imeiOriginal= isset($_POST['imeiOriginal']) ? $_POST['imeiOriginal']: "";

    $existeDispositivoConsulta = "SELECT * FROM dispositivo WHERE imei='$imei'";
    $resultadoExisteDispositivo = mysqli_query($conexion, $existeDispositivoConsulta);
    $cantidadImeiRepetido = mysqli_num_rows($resultadoExisteDispositivo);

    if ($cantidadImeiRepetido > 0 && $imeiOriginal != $imei) {
        echo    '<script>
            alert("Error: El Imei ya existe") ;
            window.history.go(-1);
        </script>';
    } else {
        if($esActualizar == "1") {
            $actualizarDispositivo =  "UPDATE dispositivo SET imei='$imei', modelo='$modelo',precio='$precio'
                                    WHERE idDispositivo='$idDispositivo'";
            $resultado=mysqli_query($conexion,$actualizarDispositivo);                      
        } else {
            $insertar="INSERT INTO dispositivo(imei,modelo,precio) 
                        VALUES('$imei','$modelo','$precio')";
            $resultado=mysqli_query($conexion,$insertar);
        }
    
        if (!$resultado) {
            echo    '<script>
                         alert("Error al registrar Dispositivo") ;
                         window.history.go(-1);
                    </script>';
        }else{
            header("location:dispositivo.php");
            echo    '<script>
                         alert("Dispositivo exitosamente registrado") ;
                    </script>';
        }
    }

    mysqli_close($conexion);
?>