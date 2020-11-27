<?php
include 'conexion.php';
session_start();
$usuario = $_SESSION['username'];
$idUsuario = $_SESSION['idUsuario'];
$rol = $_SESSION['idRol'];
$seGeneroReporte =  isset($_SESSION['seGeneroTiemporeal']) ? $_SESSION['seGeneroTiemporeal'] : "0";
$_SESSION['seGeneroTiemporeal'] = "0";
$_SESSION['fechaInicioHidden']= "";
$_SESSION['fechaFinHidden']= "";
$_SESSION['idSeguimientoSeleccionado']= "";

?>
<!doctype html>
<html lang="en">

<head>
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
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
						if ($rol == 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="usuarios.php">
									<span data-feather="user-plus"></span>
									Registrar Usuarios
								</a>
							</li>
						<?php
						}
						if ($rol != 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="hijo.php">
									<span data-feather="users"></span>
									Registrar Hijos
								</a>
							</li>
						<?php
						}
						if ($rol == 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="dispositivo.php">
									<span data-feather="hard-drive"></span>
									Registrar Dispositivo
								</a>
							</li>
						<?php
						}
						if ($rol == 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="listaHijo.php">
									<span data-feather="users"></span>
									Lista Hijos
								</a>
							</li>
						<?php
						}
						if ($rol != 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="reporte.php">
									<span data-feather="bar-chart-2"></span>
									Reporte
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="reporteTiempoReal.php">
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


			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
				<br>
				<h2 class="" align="center">Ubicacion en Tiempo Real</h2><br>

				<form action="generarTiempoReal.php" method="POST">
					<div class="form-row">
						<div class="form-group col-md-7">
							<label for="idHijoSelect">Elegir nombre Hijo</label>
							<select id="idHijoSelect" class="form-control" name="idHijoSelect" required>
							<?php
								$sql = "SELECT idHijo,nombreHijo,H.codigoPais,H.celular,operadorMovil,imei 
										from hijo H inner join usuario U on H.idUsuario=U.idUsuario 
										where U.usuario='$usuario'";
								$result = mysqli_query($conexion, $sql);
								while ($mostrar = mysqli_fetch_array($result)) {
							?>
									<option value="<?php echo $mostrar['idHijo'] ?>">
										<?php echo $mostrar['nombreHijo'] ?>
									</option>
							<?php
								}
							?>
							</select>
						</div>
						<div class="form-group col-md-5">
							<label for="seguimientosButton">&nbsp</label><br>
							<button class="btn btn-primary" id="botonMostrar" type="submit">Mostrar</button>
						</div>
					</div>
				</form>

				<div id="reporte-container" class="container" data-aos="zoom-out" data-aos-delay="100">
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
									if($seGeneroReporte == "1"){
										$sql=isset($_SESSION['sqlReporteTiempoReal'])? $_SESSION['sqlReporteTiempoReal'] : ""; 
										$result = mysqli_query($conexion, $sql);
										$arrayLat = array();
										$arrayLgt = array();
										$cont = 0;
										$contadorId=1;
										$latitud = "";
										$longitud = "";
										while ($mostrar = mysqli_fetch_array($result)) {
											$idLocalizacion = $contadorId;
											$latitud = $mostrar['latitud'];
											$longitud = $mostrar['longitud'];
											$fechaActualizacion = $mostrar['fechaActualizacion'];
											$arrayLat[$cont] = $mostrar['latitud'];
											$arrayLgt[$cont] = $mostrar['longitud'];
											$cont++;
											$contadorId++;
								?>
											<tbody>
												<tr>
													<td><?php echo $idLocalizacion; ?></td>
													<td><?php echo $latitud; ?></td>
													<td><?php echo $longitud; ?></td>
													<td><?php echo $fechaActualizacion; ?></td>
												</tr>
											</tbody>
								<?php
										}
									}	
								?>
							</table>
						</div>
						<div id="map" class="col-xl-6"></div>

						<script type="text/javascript">
							var divmapa = document.getElementById("map");
							var seguimientosFiltrados = [];

							<?php if ($seGeneroReporte == "1") { ?>
								// Initialize and add the map
								function initMap() {
									var options = {
										zoom: 15,
										center: {
											lat: <?php echo $latitud == "" ? "null" : $latitud; ?>,
											lng: <?php echo $longitud == "" ? "null" : $longitud; ?>
										}
									}
									//nuevo mapa
									var map = new google.maps.Map(divmapa, options);

									var arrayCoordenadas = [];
									<?php
									$contador = 0;
									$limite = count($arrayLat);

									while ($contador < $limite) {
									?>
										var lat = <?php echo $arrayLat[$contador] ?>;
										var lgt = <?php echo $arrayLgt[$contador] ?>;
										var coordenadas = {
											lat: lat,
											lng: lgt
										};
										arrayCoordenadas.push(coordenadas);

										var marker<?php echo $contador ?> = new google.maps.Marker({
											position: coordenadas,
											map: map,
											icon: 'http://maps.google.com/mapfiles/marker.png'
										});
									<?php
										$contador++;
									}
									?>
									console.log(arrayCoordenadas);
									//agregando una ventana de informacion

									const flightPath = new google.maps.Polyline({
										path: arrayCoordenadas,
										geodesic: true,
										strokeColor: "#FF0000",
										strokeOpacity: 1.0,
										strokeWeight: 2,
									});
									flightPath.setMap(map);
								}
							<?php  } ?>
						</script>
						<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
						<?php if ($seGeneroReporte == "1") { ?>
							<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQpUKBi4SF8MBFF85v9nkUQEf9YntZos4&callback=initMap">
								<?php  } ?>
							</script>
							<script>
								<?php if ($seGeneroReporte == "1") { ?>

								<?php  } elseif($seGeneroReporte == "2"){ ?>
									$('#reporte-container').empty();
									$('#reporte-container').append("no esta activo");

								<?php  } else { ?> 
									$('#reporte-container').hide();
								<?php }?>
							</script>
					</div>
				</div>
			</main>
		</div>
	</div>

	<!--MODAL-->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="" align="center">Lista de Seguimientos</h2><br>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">N°</th>
							<th scope="col">Fecha Inicio</th>
							<th scope="col">Fecha Fin</th>
							<th scope="col">Nombre</th>
							<th scope="col">Accion</th>
						</tr>
					</thead>
					<tbody id="tabla-body-seguimiento">

					</tbody>
					<?php
					// }
					?>
				</table>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--FIN MODAL-->


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script>
		window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>');
		setInterval(function (params) {
			$('#botonMostrar').trigger('click');
		}, 10000);
	</script>
	<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>

</html>