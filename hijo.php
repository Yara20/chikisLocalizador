<?php 
  include 'conexion.php';
  session_start();
  $usuario=$_SESSION['username'];
  $rol=$_SESSION['idRol'];
  $_SESSION['estaGeneradoReporte']="0";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Formulario Hijos</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" align="center">
      <a href="inicio.php"><img src="images/Logo.png" alt="" width="80" height="80"></a>
    </div>
    <div class="col-md-6 mr-5">
      <h1>Chikis Localizator</h1>
    </div>
    <div class="col-md-1">
      <?php echo "<h1>$usuario</h1>"; ?>
    </div>
    <div class="col-md-1">
      <a class="nav-link" href="editarPerfil.php"><span data-feather="user"></span>Editar Datos</a>
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
              <a class="nav-link" href="inicio.php">
                <span data-feather="home"></span>
                Inicio <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php 
              if($rol==1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">
                <span data-feather="user-plus"></span>
                Registrar Usuario
              </a>
            </li>
            <?php 
              }
              if($rol!=1){
            ?>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="users"></span>
                Registrar Hijo
              </a>
            </li>
            <?php 
              }
              if($rol==1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="dispositivo.php">
                <span data-feather="hard-drive"></span>
                Registrar Dispositivo
              </a>
            </li>
            <?php 
              }
              if($rol==1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="listaHijo.php">
                <span data-feather="users"></span>
                Lista Hijos
              </a>
            </li>
            <?php 
              }
              if($rol!=1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="reporte.php">
                <span data-feather="bar-chart-2"></span>
                Reporte
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reporteTiempoReal.php">
                <span data-feather="bar-chart-2"></span>
                Tiempo Real
              </a>
            </li>
            <?php 
              }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span data-feather="x-circle"></span>
                Salir
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <br>
        <form action="crearHijo.php" method="POST">
          <div class="container">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="">Nombre Hijo</label>
                  <input type="text" class="form-control" name="nombreHijo" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="">Codigo Pais</label>
                  <input type="number" class="form-control" name="codigoPais" placeholder="Ej: 591" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="">Numero de Celular</label>
                  <input type="number" class="form-control" name="celular" placeholder="" value="" required>
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
                  <input type="text" class="form-control" name="imei" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>                
              </div>
              <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
          </div>
        </form>


        <br>
          <h2 class="" align="center">Lista de Hijos</h2><br>
          <input class="form-control mb-4" id="tableSearch" type="text"placeholder="Buscar">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre del Hijo</th>
                <th scope="col">Codigo Pais</th>
                <th scope="col">Celular</th>
                <th scope="col">Operador Movil</th>  
                <th scope="col">Imei</th>  
                <th scope="col">Acción</th>              
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <?php  
              $cont=1;
              //$sql = "SELECT * FROM hijo";
              $sql="SELECT nombreHijo,H.codigoPais,H.celular,operadorMovil,imei
                    from hijo H inner join usuario U on H.idUsuario=U.idUsuario
                    where U.usuario='$usuario'";
              $result = mysqli_query($conexion,$sql);
              while($mostrar = mysqli_fetch_array($result)){
            ?>
            <tbody id="myTable">
              <tr>
                <td><?php echo $cont?></td>
                <td><?php echo $mostrar['nombreHijo'] ?></td>
                <td><?php echo $mostrar['codigoPais'] ?></td>
                <td><?php echo $mostrar['celular'] ?></td>
                <td><?php echo $mostrar['operadorMovil'] ?></td>
                <td><?php echo $mostrar['imei'] ?></td>
                <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-on="Activar" data-off="Desactivar"></td>
                <td><button type="button" class="btn btn-success editbtnU" data-toggle="modal" data-target="#editarUsuario">Editar</button></td>
                <td><button type="button" class="btn btn-danger deletebtnU" data-toggle="modal" data-target="#eliminarUsuario">Eliminar</button></td>
              </tr>
            </tbody>
            <?php 
              $cont++;
              }
            ?>
          </table>

      </main>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script>
</body>

</html>