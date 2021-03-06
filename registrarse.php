<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>REGISTRO USUARIO</title>

    <link rel="stylesheet" href="assets/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/dist/js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <div class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" align="center">
            <a href="inicio.php"><img src="images/Logo.png" alt="" width="80" height="80"></a>
        </div>
        <div class="col-md-6 mr-5">
            <h1>Chikis Localizator</h1>
        </div>
        <div class="col-md-2">
        </div>
        
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <span data-feather="x-circle"></span>
                        Salir
                    </a>
                </li>
            </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
        <div class="panel-body">
        <h1>Crear Cuenta</h1>
        <form action="crearUsuario2.php" method="POST">
            <div class="container">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombreCompleto" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Carnet Identidad</label>
                            <input type="text" class="form-control" name="ci" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" name="correo" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Codigo Pais</label>
                            <input type="number" class="form-control" name="codigoPais" placeholder="Ejm: 591" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="">Numero de Celular</label>
                            <input type="number" class="form-control" name="celular" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Usuario</label>
                            <input type="text" class="form-control" name="usuario" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>                
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="">Clave</label>
                            <input type="password" class="form-control" name="clave" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Repetir Clave</label>
                            <input type="password" class="form-control" name="clave" placeholder="" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </form>
            </div>
            <br>
        </form>
    </div>
            

        </main>
        </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>