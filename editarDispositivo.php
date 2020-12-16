<?php
include 'conexion.php';

$idDispositivo = $_GET['id'];

$mostrar = "SELECT imei,modelo,precio
                FROM dispositivo
                WHERE idDispositivo=$idDispositivo";
$resultado = mysqli_query($conexion, $mostrar);
$result_sql = mysqli_num_rows($resultado);

if ($result_sql == 0) {
    header('Location: dispositivo.php');
} else {
    $option = '';
    while ($data = mysqli_fetch_array($resultado)) {
        $imei = $data['imei'];
        $modelo = $data['modelo'];
        $precio = $data['precio'];
    }
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="crud.css">

</head>

<body>
    <section class="container">
        <div class="">
            <br>
            <h2 align="center">Editar informacion</h2>
            <form action="guardarDispositivo.php" method="POST">
            <div class="container">
              <form class="needs-validation">
                <div class="form-row">
                
                <input type="hidden" class="form-control" name="esActualizar" placeholder="" value="1" required>
                <input type="hidden" class="form-control" name="imeiOriginal" placeholder="" value="<?php echo $imei; ?>">
                <input type="hidden" class="form-control" name="idDispositivo" placeholder="" value="<?php echo $idDispositivo; ?>" required>
                  <div class="col-md-4 mb-3" id="imeiMensaje">
                    <label for="">Imei</label>
                    <input type="text" class="form-control" name="imei" placeholder="" value="<?php echo $imei; ?>"  id="imei" 
                    pattern="[0-9]{14,15}" title="Solo se permite imei 14 a 15" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3" id="modeloMensaje">
                    <label for="">Modelo</label>
                    <input type="text" class="form-control" name="modelo" placeholder="" value="<?php echo $modelo; ?>" id="modelo" pattern="[A-Za-z0-9]+" title="Solo se permite numeros y letras" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3"  id="precioMensaje">
                    <label for="">Precio</label>
                    <input type="number" step="0.01" min="0" max="999" class="form-control" name="precio" 
                    placeholder="" value="<?php echo $precio; ?>"  id="precio" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Guardar</button>
              </form>
            </div>
          </form>
        </div>
    </section>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>