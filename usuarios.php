<?php 
  include 'conexion.php';
  session_start();
  $usuario=$_SESSION['username'];
  $rol=$_SESSION['idRol'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Formulario Usuario</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
              <a class="nav-link active" href="#">
                <span data-feather="user-plus"></span>
                Registrar Usuario
              </a>
            </li>
            <?php 
              }
              if($rol!=1){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="hijo.php">
                <span data-feather="users"></span>
                Registrar Hijos
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
        <form action="crearUsuario.php" method="POST">
          <div class="container">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <input type="hidden" name = "idUsuario" value="">
                <div class="col-md-4 mb-3">
                  <label for="">Nombre Completo</label>
                  <input type="text" class="form-control" name="nombreCompleto" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="">Carnet Identidad</label>
                  <input type="text" class="form-control" name="ci" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="">Correo</label>
                  <input type="email" class="form-control" name="correo" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="">Codigo Pais</label>
                  <input type="number" class="form-control" name="codigoPais" placeholder="Ejm: 591" value="" required>
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
                <div class="col-md-4 mb-3">
                  <label for="">Usuario</label>
                  <input type="text" class="form-control" name="usuario" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>                
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="">Clave</label>
                  <input type="password" class="form-control" name="clave" placeholder="" value="" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="">Rol</label>
                  <select class="custom-select d-block w-100" name="tipoRol" required>
                    <option value="">....</option>
                    <option>Administrador</option>
                    <option>Padre</option>
                  </select>
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
        <h2 class="" align="center">Lista de Usuarios</h2><br>
        <!-- Search form -->
          <input class="form-control mb-4" id="tableSearch" type="text"placeholder="Buscar">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ci</th>
                <th scope="col">correo</th>
                <th scope="col">Celular</th>
                <th scope="col">Usuario</th>                
                <th scope="col">Estado</th>
                <th scope="col">Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <?php  
              $sql = "SELECT U.idUsuario,U.nombreCompleto,U.ci,U.correo,U.celular,U.usuario,U.estado,R.tipoRol
                      FROM usuario U inner join rol R on U.idRol=R.idRol
                      ORDER BY U.idUsuario";
              $result = mysqli_query($conexion,$sql);
              while($mostrar = mysqli_fetch_array($result)){
            ?>
            <tbody id="myTable">
              <tr>
                <td><?php echo $mostrar['idUsuario'] ?></td>
                <td><?php echo $mostrar['nombreCompleto'] ?></td>
                <td><?php echo $mostrar['ci'] ?></td>
                <td><?php echo $mostrar['correo'] ?></td>
                <td><?php echo $mostrar['celular'] ?></td>
                <td><?php echo $mostrar['usuario'] ?></td>
                <td><?php echo $mostrar['estado'] ?></td>
                <td><?php echo $mostrar['tipoRol']?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditarUsuario">Editar</button></td>
                    <?php
                        if($mostrar["idUsuario"] != 1){
                    ?>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarUsuario">Eliminar</button></td>
                    <?php
                        }
                    ?>
              </tr>
            </tbody>
            <?php 
              }
            ?>
          </table>
      </main>
    </div>
  </div>

  <!--MODAL-->
  <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
              <input type="hidden" name = "idUsuario" value =<?php echo $mostrar['idUsuario'] ?>>
              <div class="form-group">
                <label for="" class="col-form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="" value =<?php echo $mostrar['nombreCompleto'] ?>>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Carnet Identidad</label>
                    <input type="text" class="form-control" id="" value =<?php echo $mostrar['ci'] ?>>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Correo</label>
                    <input type="email" class="form-control" id="" value =<?php echo $mostrar['correo'] ?>>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Codigo Pais</label>
                    <input type="number" class="form-control" id="" value =<?php echo $mostrar['codigoPais'] ?>>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Numero Celular</label>
                    <input type="number" class="form-control" id="" value =<?php echo $mostrar['celular'] ?>>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" id="" value =<?php echo $mostrar['usuario'] ?>>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="" class="col-form-label">Clave</label>
                    <input type="password" class="form-control" id="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="" class="col-form-label">Rol</label>
                  <select class="custom-select d-block w-100" name="tipoRol" id="" value =<?php echo $mostrar['rol'] ?>>
                    <option value="">....</option>
                    <option>Administrador</option>
                    <option>Padre</option>
                  </select>
               </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!--FIN MODAL-->


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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</body>

</html>