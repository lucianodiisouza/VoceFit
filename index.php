<?php 
	require('inc/conexao.php'); 
	require('_validar_login.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- MetaTags necessárias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.">
    <meta name="author" content="Luciano dii Souza - Desenvolvedor Web FullStack & Mobile">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- meu css -->
	<link rel="stylesheet" href="assets/css/dashboard.css" type="text/css" />
	<script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>VoceFit</title>
  </head>
  <body>
  <!-- barra de navegação  -->
  <!-- Image and text -->
	<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light bg-light" style="background-color: #C4E322;">
		<a class="navbar-brand" href="../index.php">
		    <img src="assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
		    VoceFit
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		  <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="usuarios/">Usuários</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="videos/">Galeria</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Gameficação</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Estatísticas</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Mensagens</a>
		      </li>
		      <div class="dropdown">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fas fa-users-cog"></i>
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto;">
				    <a class="dropdown-item" href="#">Ajuda</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="#">Configuração</a>
				    <a class="dropdown-item" href="#">Regras</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="inc/logout.php">Desconectar</a>
				  </div>
				</div>		      
		    </ul>
		  </div>
  </nav>
  <!-- que comecem os jogos -->
  <br>
  <br>
  <div class="container-fluid">
	  	<!-- graficos -->
		<div class="row">
			<div class="col colunaCustom">
			<div class="header_coluna">
					<h4>Estatísticas - Novos usuários</h4>
					<div>
						<button class="btn btn-success" id="randomizeData">Aleatório</button>
						<button class="btn btn-success"  id="addDataset">+ dados</button>
						<button class="btn btn-success"  id="removeDataset">- dados</button>
						<button class="btn btn-success"  id="addData">+ meses</button>
						<button class="btn btn-success"  id="removeData">- meses</button>
					</div>
				</div>
				<hr>
				<div style="width:100%;">
					<canvas id="canvas"></canvas>
				</div>

				<script>
					var MONTHS = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
					var config = {
						type: 'line',
						data: {
							labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
							datasets: [{
								label: 'Mulheres',
								backgroundColor: window.chartColors.red,
								borderColor: window.chartColors.red,
								data: [
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor()
								],
								fill: false,
							}, {
								label: 'Homens',
								fill: false,
								backgroundColor: window.chartColors.blue,
								borderColor: window.chartColors.blue,
								data: [
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor(),
									randomScalingFactor()
								],
							}]
						},
						options: {
							responsive: true,
							title: {
								display: true,
								text: 'Novos usuários'
							},
							tooltips: {
								mode: 'index',
								intersect: false,
							},
							hover: {
								mode: 'nearest',
								intersect: true
							},
							scales: {
								xAxes: [{
									display: true,
									scaleLabel: {
										display: true,
										labelString: 'Mês'
									}
								}],
								yAxes: [{
									display: true,
									scaleLabel: {
										display: true,
										labelString: 'Qtd.'
									}
								}]
							}
						}
					};

					window.onload = function() {
						var ctx = document.getElementById('canvas').getContext('2d');
						window.myLine = new Chart(ctx, config);
					};

					document.getElementById('randomizeData').addEventListener('click', function() {
						config.data.datasets.forEach(function(dataset) {
							dataset.data = dataset.data.map(function() {
								return randomScalingFactor();
							});

						});

						window.myLine.update();
					});

					var colorNames = Object.keys(window.chartColors);
					document.getElementById('addDataset').addEventListener('click', function() {
						var colorName = colorNames[config.data.datasets.length % colorNames.length];
						var newColor = window.chartColors[colorName];
						var newDataset = {
							label: 'Conjunto de Dados ' + config.data.datasets.length,
							backgroundColor: newColor,
							borderColor: newColor,
							data: [],
							fill: false
						};

						for (var index = 0; index < config.data.labels.length; ++index) {
							newDataset.data.push(randomScalingFactor());
						}

						config.data.datasets.push(newDataset);
						window.myLine.update();
					});

					document.getElementById('addData').addEventListener('click', function() {
						if (config.data.datasets.length > 0) {
							var month = MONTHS[config.data.labels.length % MONTHS.length];
							config.data.labels.push(month);

							config.data.datasets.forEach(function(dataset) {
								dataset.data.push(randomScalingFactor());
							});

							window.myLine.update();
						}
					});

					document.getElementById('removeDataset').addEventListener('click', function() {
						config.data.datasets.splice(0, 1);
						window.myLine.update();
					});

					document.getElementById('removeData').addEventListener('click', function() {
						config.data.labels.splice(-1, 1); // remove the label first

						config.data.datasets.forEach(function(dataset) {
							dataset.data.pop();
						});

						window.myLine.update();
					});
				</script>
			</div>
		</div>
		<!-- graficos -->
		<!-- usuarios -->
		<div class="row">
			<div class="col-md-6 colunaCustom">
				<div class="header_coluna">
					<h4>Usuários</h4>
					<a href="usuarios/novo.php" class="btn btn-success"><i class="fas fa-plus"></i></a>						
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table table-hover table-sm">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Usuário</th>
							<th scope="col">Email</th>
							<th scope="col">Social</th>
							<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT * FROM usuarios_admin ORDER BY id DESC limit 10;";
								$qry = mysqli_query($conecta, $sql);
								while ($linha = mysqli_fetch_array($qry)) {
							?>							
						<tr>
						<td><center><?php echo $linha["id"] ?></center></td>
						<td><?php echo $linha["usuario"] ?></td>
						<td><?php echo $linha["email"] ?></td>
						<td>
						<center>
							<a class="customLink" target="_blank" href="<?php echo $linha['facebook'] ?>"><i class="fab fa-facebook"></i></a>
							<a class="customLink" target="_blank" target="_blank" href="<?php echo $linha['instagram'] ?>"><i class="fab fa-instagram"></i></a>
							<a class="customLink" target="_blank" href="https://wa.me/55<?php echo $linha['whatsapp'] ?>"><i class="fab fa-whatsapp"></i></a>                
						</center>
					</td>
					<td><center><a href="usuarios/ver.php?id=<?php echo $linha["id"] ?>"><i class="far fa-eye"></i></a></center></td>
				</tr>						
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
				<!-- datatable -->
			</div>
			<!-- Mensagens -->
			<div class="col colunaCustom">
				<div class="header_coluna">
					<h4>Mensagens</h4>
					<a href="#" class="btn btn-success"><i class="fas fa-plus"></i></a>
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table table-hover table-sm">
						<thead>
							<tr>
								<th scope="col">De</th>
								<th scope="col">Assunto</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>pedrinho</td>
								<td>Atualizações do aplicativo projetadas para Agosto...</td>
								<td><a href="#"><i class="far fa-eye"></i></a></td>
							</tr>
											<tr>
								<td>usuario057</td>
								<td>Dúvidas ao acessar a aula de spinning...</td>
								<td><a href="#"><i class="far fa-eye"></i></a></td>
							</tr>
											<tr>
								<td>mariacarolina</td>
								<td>Editar este conteúdo para as novas aulas [URGENTE]</td>
								<td><a href="#"><i class="far fa-eye"></i></a></td>
							</tr>
											<tr>
								<td>Administrador</td>
								<td>Evento para lançamento do App. Julho/2019</td>
								<td><a href="#"><i class="far fa-eye"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>				
		</div>
		<!-- usuários -->
		<!-- videos -->
		<div class="row">
			<?php 
				$sql = "SELECT * FROM videos ORDER BY id DESC LIMIT 4;";
				$qry = mysqli_query($conecta, $sql);
				while($video = mysqli_fetch_array($qry)){
			?>
				<div class="col colunaCustom">
					<div class="header_coluna">
						<h6>#<?php echo $video['id']." - ".$video['titulo'] ?></h6>
						<p><a href="videos/ver.php?id=<?php echo $video["id"] ?>"><i class="far fa-eye"></i></a></p>
					</div>
					<iframe src="<?php echo $video['link'] ?>" width="240" height="164" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
					<br>
					<?php echo $video['professor']." <br><small>".$video['categoria']."</small>" ?>
				</div>
			<?php
				}
			?>
		</div>
    </div>
  <!-- que comecem os jogos -->

	<!-- Javascript é opcional -->

    <script src="https://kit.fontawesome.com/fbc2e0b83e.js"></script>
    <!-- Seguir a ordem JQuery > Popper > Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>