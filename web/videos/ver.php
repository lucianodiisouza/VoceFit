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
		        <a class="nav-link" href="../usuarios/">Usuários</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Galeria</a>
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
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col abc">
          <form method="post">
          <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM videos WHERE id = $id";
            $qry = mysqli_query($conecta, $sql);
            $video = mysqli_fetch_assoc($qry);               
          ?>
          <div class="row">
              <div class="col">
                <div class="text-right">
                      <input type="submit" class="btn btn-success" value="Salvar">
                      <a href="index.php" class="btn btn-danger">Voltar</a>
                      <input type="hidden" name="envia" value="envia">
                </div>
                <br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                Título:
                <input type="text" value="<?php echo $video['titulo'] ?>" name="titulo" class="form-control">
              </div>
              <div class="col-md-4">
                Categoria:
                <select name="categoria" class="form-control">
                <?php 
                  if(empty($video['categoria'])){
                  ?>
                    <option value="" selected hidden disabled>Selecione uma opção</option>
                    <option value="Pernas">Pernas</option>
                    <option value="Braço">Braço</option>
                    <option value="Costas">Costas</option>
                    <option value="Pernas">Pernas</option>
                    <option value="Glúteo">Glúteo</option>
                    <option value="Abdomem">Abdomem</option>
                  }else{
                  ?>
                  <option value="<?php echo $video['categoria'] ?>"><?php echo $video['categoria'] ?></option>
                <?php
                  }
                ?>
                  <option value="Pernas">Pernas</option>
                  <option value="Braço">Braço</option>
                  <option value="Costas">Costas</option>
                  <option value="Pernas">Pernas</option>
                  <option value="Glúteo">Glúteo</option>
                  <option value="Abdomem">Abdomem</option>
                </select>
              </div>
              <div class="col-md-4">
                Link:
                <input type="text" value="<?php echo $video['link'] ?>" name="linkVideo" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col">
                Professor:
                <input type="text" name="professor" value="<?php echo $video['professor'] ?>" class="form-control">
              </div>
              <div class="col">
                Data:
                <input type="date" value="<?php echo $video['data'] ?>" name="data" class="form-control">
              </div>
              <div class="col">
                Disponível?
                <select name="disponível" class="form-control" >
                  <option value="" disabled hidden selected>Selecione uma opção ...</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
                Descrição:
                <textarea name="desc" class="form-control" style="min-height: 150px;"><?php echo $video['descricao'] ?></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <center>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/-0cY8PBRYZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </center>
              </div>
            </div>
            <br>
          </form>
          <?php 
            if(isset($_POST['envia'])){
              $titulo = $_POST['titulo'];
              $categoria = $_POST['categoria'];
              $link = $_POST['linkVideo'];
              $professor = $_POST['professor'];
              $desc = $_POST['desc'];
              //É hora do show porra!

              $sql = "UPDATE videos SET titulo='$titulo', categoria='$categoria', link='$link', professor='$professor', descricao='$descricao';";
              
              if($conecta->query($sql) === true){
                echo "Vídeo atualizado com sucesso!";
              }else{
                echo "Erro: " .$sql. "<br>" .$conecta->error;
              }
            }
          ?>
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