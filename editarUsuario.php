<?php
include 'conexion.php';

$iduser = $_GET['id'];

$mostrar = "SELECT nombreCompleto,ci,correo,codigoPais,celular,usuario,clave,idRol
                FROM usuario
                WHERE idUsuario=$iduser";
$resultado = mysqli_query($conexion, $mostrar);
$result_sql = mysqli_num_rows($resultado);

if ($result_sql == 0) {
    header('Location: usuarios.php');
} else {
    $option = '';
    while ($data = mysqli_fetch_array($resultado)) {
        $nombreCompleto = $data['nombreCompleto'];
        $ci = $data['ci'];
        $correo = $data['correo'];
        $codigoPais = $data['codigoPais'];
        $celular = $data['celular'];
        $usuario = $data['usuario'];
        $clave = md5($data['clave']);
        $idRol = $data['idRol'];
        if ($idRol == 1) {
            $tipoRol = "Administrador";
        } else {
            if ($idRol == 2) {
                $tipoRol = "Padre";
            }
        }

        if ($idRol == 1) {
            $option = '<option value="' . $idRol . '" select>' . $tipoRol . '</option>   ';
        } else if ($idRol == 2) {
            $option = '<option value="' . $idRol . '" select>' . $tipoRol . '</option>   ';
        }
    }
}

                            $queryRoles = "SELECT * FROM rol";
                            $resultadoRoles = mysqli_query($conexion, $queryRoles);
                            $resultadoNumeroRoles = mysqli_num_rows($resultadoRoles);

                            

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
            <br>
            <form method="POST" action="guardarUsuario.php" class="needs-validation" >
                <div class="form-row">
                    <input type="hidden" name="idUsuario" value="">
                    <div class="col-md-4 mb-3">
                        <label for="">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombreCompleto" placeholder="" value="<?php echo $nombreCompleto; ?>" 
                        pattern="[A-Za-z\s]+"  title="Solo se permite letras" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Carnet Identidad</label>
                        <input type="text" class="form-control" name="ci" placeholder="" value="<?php echo $ci; ?>" 
                        pattern="[0-9]+" title="Solo se permite numeros" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Correo</label>
                        <input type="email" class="form-control" name="correo" placeholder="" value="<?php echo $correo; ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="">Codigo Pais</label>
                        <input type="number" class="form-control" name="codigoPais" placeholder="Ejm: 591" value="<?php echo $codigoPais; ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Numero de Celular</label>
                        <input type="number" class="form-control" name="celular" placeholder="" value="<?php echo $celular; ?>" 
                        pattern="[0-9]+" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="" value="<?php echo $usuario; ?>" 
                        pattern="[A-Za-z0-9]+" title="Solo se permite numeros y letras" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="">Rol</label>
                        <input type="hidden" class="form-control" name="esActualizar" placeholder="" value="1">
                        <input type="hidden" class="form-control" name="usuarioOriginal" placeholder="" value="<?php echo $usuario; ?>">
                        <input type="hidden" class="form-control" name="idUsuario" placeholder="" value="<?php echo $iduser; ?>" required>
                        <?php
                            
                        ?>
                        <select class="custom-select d-block w-100" name="tipoRol" required>
                            <?php
                            if ($resultadoNumeroRoles > 0) {
                                while ($rol = mysqli_fetch_array($resultadoRoles)) {
                            ?>
                                    <option <?php $valor = $idRol == $rol["idRol"] ? "selected" : "";  echo $valor;?> value="<?php echo $rol["idRol"]; ?>"> <?php echo $rol["tipoRol"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-primary" type="button">Cancelar</button>
            </form>
        </div>
    </section>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>