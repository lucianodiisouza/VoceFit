
<?php require('_validar_login.php'); ?>
</head>
<body style="background-image: url(img/bg_transparente.png) !important; background-repeat: no-repeat; background-size: cover;">
	<!-- Barra de Menu - Será fixa no topo -->
	<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light bg-light" style="background-color: #C4E322;">
		<a class="navbar-brand" href="index.php">
		    <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		    BolãoChapada
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		  <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="jogos/">Jogos</a>
		      </li>
		      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <li class="nav-item">
		        <a class="nav-link" href="rodadas/">Rodadas</a>
		      </li>
		      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <li class="nav-item">
		        <a class="nav-link" href="times/">Times</a>
		      </li>
		      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <li class="nav-item">
		        <a class="nav-link" href="usuarios/">Usuários</a>
		      </li>
		      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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