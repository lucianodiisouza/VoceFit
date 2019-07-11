<?php require('../inc/conexao.php') ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- MetaTags necessárias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.">
    <meta name="author" content="Luciano dii Souza - Desenvolvedor Web FullStack & Mobile">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <!-- meu css -->
    <link rel="stylesheet" href="../assets/css/dashboard.css" type="text/css" />
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>VoceFit</title>
  </head>
  <body>
  <!-- barra de navegação  -->
  <!-- Image and text -->
	<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light bg-light" style="background-color: #C4E322;">
		<a class="navbar-brand" href="../index.php">
		    <img src="../assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
		    VoceFit
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		  <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Usuários</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../videos/">Galeria</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Gameficação</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Estatísticas</a>
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
				    <a class="dropdown-item" href="#">Desconectar</a>
				  </div>
				</div>		      
		    </ul>
		  </div>
  </nav>
  <!-- fim da barra de navegação -->
  <!-- que comecem os jogos -->
  <div class="container-fluid" style="width: 90% !important;">
      <br>
      <br>
      <br>
    <div class="row">
      <div class="col colunaCustom">
        <div class="header_coluna">
          <h4>Usuários - Administrativos</h4>
          <a href="novo.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </div>
          <hr>
      <div class="table-responsive">
        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th scope="col">Usuário</th>
              <th scope="col">Email</th>
              <th scope="col">Nome</th>
              <th scope="col"><center>Social</center></th>
              <th scope="col"><center>Ações</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM usuarios_admin ORDER BY id;";
              $qry = mysqli_query($conecta, $sql);
              while($usuario = mysqli_fetch_array($qry)){
            ?>
            <!-- é mágica? acho que não rs -->
                <tr>
                  <td><center><?php echo $usuario['id']; ?></center></td>
                  <td><?php echo $usuario['usuario'] ?></td>
                  <td><?php echo $usuario['email'] ?></td>
                  <td><?php echo $usuario['nome'] ?></td>
                  <td>
                    <center>
                      <a class="customLink" target="_blank" href="<?php echo $usuario['facebook'] ?>"><i class="fab fa-facebook"></i></a>
                      <a class="customLink" target="_blank" target="_blank" href="<?php echo $usuario['instagram'] ?>"><i class="fab fa-instagram"></i></a>
                      <a class="customLink" target="_blank" href="https://wa.me/55<?php echo $usuario['whatsapp'] ?>"><i class="fab fa-whatsapp"></i></a>                
                    </center>
                  </td>
                  <td><center><a href="ver.php?id=<?php echo $usuario['id'] ?>"><i class="far fa-eye"></i></a></center></td>
            <!-- é mágica? acho que não rs -->
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
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