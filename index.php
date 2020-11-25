<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/dist/js/bootstrap.js">
    <link rel="stylesheet" href="login.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <br>
                <h1 class="text-center">Chikis Localizator</h1>
                <img src="images/Logo.png">

                <form action="validarLogin.php" method="POST">
                    <input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario">
                    <input type="password" class="form-control" name="clave" placeholder="Password">
                    <input type="submit" value="Ingresar" class="btn btn-success"><br><br>
                    <div class="">No tiene una cuenta?
                        <a href="registrarse.php">Registrarse</a>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>