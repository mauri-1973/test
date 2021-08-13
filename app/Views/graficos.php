<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Oscar Zambrano</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?=base_url();?>/img/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>/css/interno.css" >
	
</head>
	<body>

		<!-- HEADER: MENU + HEROE SECTION -->
		<header>
			<input type="hidden" id="oculto" value="<?=base_url();?>">
			<div class="menu">
				<ul>
					<li class="logo"><a href="<?=base_url();?>/"><img height="44" title="Oscar Zambrano" alt="Oscar Zambrano" src="<?=base_url();?>/img/codei.png"></a>
					</li>
					<li class="menu-toggle">
						<button onclick="toggleMenu();">&#9776;</button>
					</li>
					<li class="menu-item hidden"><a href="<?=base_url();?>/">Inicio</a></li>
					<li class="menu-item hidden"><a href="<?=base_url();?>/Home/uf">UF</a>
					</li>
				</ul>
			</div>

			<div class="heroe">

				<h1>CodeIgniter versión: <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>

				<h2>TEST DESARROLLADOR PHP</h2>

			</div>

		</header>

		<!-- CONTENT -->

		<section>

			<h1>Configuración inicial</h1>
			<a class="btn btn-outline-primary btn-sm mb-2" href="<?=base_url();?>/Home/uf" role="button">Ver UF</a>
			<form class="border border-primary p-2">
				<div class="form-row">
					<div class="col">
						<label for="busq">Seleccione el tipo</label>
							<select class="form-control" id="busq">
								<option value="bit" selected>Bitcoin</option>
								<option value="utm">UTM</option>
								<option value="dol">Dólar</option>
								<option value="eu">Euro</option>
								<option value="ipc">IPC</option>
							</select>
					</div>
					<div class="col">
					<label for="datepicker">Fecha de Inicio</label>
							<select class="form-control" id="year">
								<option value="2021" selected>2021</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								<option value="2012">2012</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
							</select>
					</div>
				</div>
				<hr>
				<div class="form-row">
					<div class="col">
						<label for="datepicker1">&nbsp;</label>
						&nbsp;
					</div>
					<div class="col">
						<label for="formGroupExampleInput">Iniciar Búsqueda</label>
						<button type="button" class="btn btn-primary btn-block" onclick="iniciarbusb();">Iniciar</button>
					</div>
				</div>
			</form>

		</section>

		<div class="further">

			<section>

				<h1>Gráficos</h1>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<canvas id="myChart1"></canvas>
							</div>
						</div>
					</div>
				</div>
				<hr>
				


			</section>

		</div>

		<footer>
			<div class="environment">

				<p>Test realizado por Oscar Zambrano Vásquez</p>

				<p>Environment: <?= ENVIRONMENT ?></p>

			</div>

			<div class="copyrights">

				<p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
					open source licence.</p>

			</div>

		</footer>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="<?=base_url();?>/js/generico.js"></script>
		<script src="<?=base_url();?>/js/interno.js"></script>
	</body>
</html>
