<?php 
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
  <title>Inicio</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
              <a class="nav-link active" href="#">
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

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
        <br>
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
          <div class="row">
            <div class="col-xl-5">
              <img src="images/gpsimg.png" alt="" class="img-fluid">
            </div>

            <div id="map"></div>
            <!--
            <script defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQpUKBi4SF8MBFF85v9nkUQEf9YntZos4&callback=initMap">
              </script>
            <script src="localizacion.js"></scriptsrc></script>
            <script src="main.js"></script>-->

            <script type="text/javascript">   

                  var divmapa=document.getElementById("map");
                  var latitud=-17.355703;
                  var longitud=-66.183758;

                  // Initialize and add the map
                  function initMap() {
                      var options={
                          zoom:15,
                          center: {lat: latitud, lng: longitud}
                      }

                      //nuevo mapa
                      var map=new google.maps.Map(divmapa,options);
                      //Agregando un marcador
                      //-17.355703,-66.183758
                      var casa = {lat: latitud, lng: longitud};
                      var marker = new google.maps.Marker({
                          position: casa, 
                          map: map, 
                          icon: 'http://maps.google.com/mapfiles/marker.png'
                      });

                      //agregando una ventana de informacion
                      var infoWindow=new google.maps.infoWindow({
                          content: '<h3>Casa</h3>'
                      });

                      marker.addListener('click', function(){
                          infoWindow.open(map,marker);
                      });

                      google.maps.event.trigger(marker,'click');
                  }                  
            </script>
              
            <script defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQpUKBi4SF8MBFF85v9nkUQEf9YntZos4&callback=initMap">
            </script>
          </div>
        </div>
        <br>

      </main>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script>
</body>

</html>