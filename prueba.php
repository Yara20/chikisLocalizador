<?php 
  include 'conexion.php';
  session_start();
  $usuario=$_SESSION['username'];
  $rol=$_SESSION['idRol'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Reportes</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <style>
      #map {
        width: 550px;
        height: 500px;
      }
    </style>

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
                  Registrar Usuarios
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
              <li class="nav-item active">
                <a class="nav-link" href="listaHijo.php">
                  <span data-feather="users"></span>
                  Lista Hijos
                </a>
              </li>
              <?php 
                }
              ?>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reporte
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="x-circle"></span>
                  Salir
                </a>
              </li>
            </ul>
            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
        <br>
        <h2 class="" align="center">Lista de Hijos</h2><br>  
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre del Hijo</th>            
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <?php  
                  //$sql = "SELECT * FROM hijo";
                  $sql="SELECT idHijo,nombreHijo,H.codigoPais,H.celular,operadorMovil,imei
                        from hijo H inner join usuario U on H.idUsuario=U.idUsuario
                        where U.usuario='$usuario'";
                  $result = mysqli_query($conexion,$sql);
                  while($mostrar = mysqli_fetch_array($result)){
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $mostrar['idHijo'] ?></td>
                    <td><?php echo $mostrar['nombreHijo'] ?></td>
                    <td>
                      <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary">
                    </td>
                    <td><button type="button" class="btn btn-danger deletebtnU" data-toggle="modal" data-target="#eliminarUsuario">Eliminar</button></td>
                  </tr>
                </tbody>
                <?php 
                  }
                ?>
              </table>
              <br><br>
          <h2 class="" align="center">Reporte Historico</h2><br>
          <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
              <div class="col-xl-6">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">N°</th>
                      <th scope="col">Latitud</th>
                      <th scope="col">Longitud</th>
                      <th scope="col">Fecha Actualizacion</th>
                    </tr>
                  </thead>
                  <?php  
                    $sql = "SELECT * FROM localizacion";
                    $result = mysqli_query($conexion,$sql);
                    $arrayLat=array();
                    $arrayLgt=array();
                    $cont=0;
                    while($mostrar = mysqli_fetch_array($result)){
                      $idLocalizacion=$mostrar['idLocalizacion'];
                      $latitud=$mostrar['latitud'];
                      $longitud=$mostrar['longitud'];
                      $fechaActualizacion=$mostrar['fechaActualizacion'];
                      $arrayLat[$cont]=$mostrar['latitud'];
                      $arrayLgt[$cont]=$mostrar['longitud'];
                      $cont++;
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $idLocalizacion;?></td>
                      <td><?php echo $latitud; ?></td>
                      <td><?php echo $longitud;?></td>               
                      <td><?php echo $fechaActualizacion; ?></td>
                    </tr>
                  </tbody>
                  <?php 
                    }
                  ?>
                </table>

                <div id="map" class="col-xl-6"></div>

              <script type="text/javascript">   
              
                    var divmapa=document.getElementById("map");
                                        
                    // Initialize and add the map
                    function initMap() {
                        var options={
                            zoom:10,
                            center: {lat: <?php echo $latitud; ?>, lng: <?php echo $longitud; ?>}
                        }
                        //nuevo mapa
                        var map=new google.maps.Map(divmapa,options);
                        
                        var arrayCoordenadas=[];
                        <?php
                          $contador=0;
                          $limite=count($arrayLat);
                          
                          while ($contador<$limite) {
                        ?>
                          var lat=<?php echo $arrayLat[$contador]?>;
                          var lgt=<?php echo $arrayLgt[$contador]?>;                          
                          var coordenadas = {lat: lat, lng: lgt};
                          arrayCoordenadas.push(coordenadas);
                          
                          var marker<?php echo $contador ?> = new google.maps.Marker({
                            position: coordenadas, 
                            map: map, 
                            icon: 'http://maps.google.com/mapfiles/marker.png'
                          });

                          //MUESTRA EL CUADRO DE DIALOGO
                          // var infoWindow<?php //echo $contador ?>=new google.maps.InfoWindow({
                          //   content: '<h3><?php //echo $contador+1 ?></h3>'
                          // });

                          //AGREGA EVENTO CLICK
                          // marker<?php //echo $contador ?>.addListener('click', function(){
                          //   infoWindow<?php //echo $contador ?>.open(map,marker<?php //echo $contador ?>);
                          // });

                          //EJECUTA EVENTO CLICK
                          //google.maps.event.trigger(marker<?php //echo $contador ?>,'click');
                        <?php
                          $contador++;
                          }
                        ?>
                        console.log(arrayCoordenadas);
                        //agregando una ventana de informacion
                        

                        


                        const flightPlanCoordinates = [
                          { lat: 37.772, lng: -122.214 },
                          { lat: 21.291, lng: -157.821 },
                          { lat: -18.142, lng: 178.431 },
                          { lat: -27.467, lng: 153.027 },
                        ];
                        console.log(flightPlanCoordinates);
                        const flightPath = new google.maps.Polyline({
                          path: arrayCoordenadas,
                          geodesic: true,
                          strokeColor: "#FF0000",
                          strokeOpacity: 1.0,
                          strokeWeight: 2,
                        });
                        flightPath.setMap(map);
                    }

                    
              </script>
                
              <script defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQpUKBi4SF8MBFF85v9nkUQEf9YntZos4&callback=initMap">
              </script>
              </div>
              </div>
        </main>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script src="dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

  </body>
</html>