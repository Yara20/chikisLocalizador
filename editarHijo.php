<?php
include 'conexion.php';

$idHijo = $_GET['id'];

$mostrar = "SELECT idHijo,nombreHijo,codigoPais,celular,operadorMovil,imei
            from hijo
            where idHijo='$idHijo'";
$resultado = mysqli_query($conexion, $mostrar);
$result_sql = mysqli_num_rows($resultado);

if ($result_sql == 0) {
    header('Location: hijo.php');
} else {
    $option = '';
    while ($data = mysqli_fetch_array($resultado)) {
        $idHijo = $data['idHijo'];
        $nombreHijo = $data['nombreHijo'];
        $codigoPais = $data['codigoPais'];
        $celular = $data['celular'];
        $operadorMovil = $data['operadorMovil'];
        $imei = $data['imei'];
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
            <form action="crearHijo.php" method="POST">
            <div class="container">
              <form class="needs-validation" novalidate>
                <div class="form-row">
                
                <input type="hidden" class="form-control" name="esActualizar" placeholder="" value="1" required>
                <input type="hidden" class="form-control" name="idHijo" placeholder="" value="<?php echo $idHijo; ?>" required>
                  <div class="col-md-4 mb-3">
                    <label for="">Nombre Hijo</label>
                    <input type="text" class="form-control" name="nombreHijo" placeholder="" value="<?php echo $nombreHijo; ?>" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="">Codigo Pais</label>
                    <input type="number" class="form-control" name="codigoPais" placeholder="Ej: 591" value="<?php echo $codigoPais; ?>" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="">Numero de Celular</label>
                    <input type="number" class="form-control" name="celular" placeholder="" value="<?php echo $celular; ?>" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="">Operador Movil</label>
                    <select class="custom-select d-block w-100" name="operadorMovil" required>
                      <option value="">....</option>
                      <option>Entel</option>
                      <option>Viva</option>
                      <option>Tigo</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid sexo.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="">Imei Dispositivo</label>
                    <input type="text" class="form-control" name="imei" placeholder="" value="<?php echo $imei; ?>" required>
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