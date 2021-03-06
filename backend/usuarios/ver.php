<?php require('../inc/conexao.php');
      require('../_validar_login_sub.php');
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
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col abc">
          <form method="post">
              <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM usuarios_admin WHERE id = $id";
                $qry = mysqli_query($conecta, $sql);
                $usuario = mysqli_fetch_assoc($qry);               
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
                Usuário:
                <input type="text" name="usuario" value="<?php echo $usuario['usuario'] ?>" class="form-control" required>
              </div>
              <div class="col-md-4">
                Senha:
                <input type="password" name="senha" value="<?php echo $usuario['senha'] ?>" class="form-control" readonly>
              </div>
              <div class="col-md-4">
                E-mail:
                <input type="mail" name="email" value="<?php echo $usuario['email'] ?>" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                Nome:
                <input type="text" name="nome" value="<?php echo $usuario['nome'] ?>" class="form-control" required>
              </div>
              <div class="col-md-3">
                Nascimento:
                <input type="date" name="nascimento" value="<?php echo $usuario['nascimento'] ?>" class="form-control" required>
              </div>
              <div class="col-md-3">
                Cargo:
                <select name="cargo" class="form-control" required>
                <?php
                    if(!empty($usuario['role'])){ 
                        $sql = "SELECT * FROM role WHERE id = ".$usuario['role'].";";
                        $qry = mysqli_query($conecta, $sql);
                        $role = mysqli_fetch_assoc($qry);
                ?>
                <option value="<?php $role['id'] ?>" selected disabled hidden><?php echo $role['role'] ?></option>
                <?php 
                        $sql = "SELECT * FROM role";
                        $qry = mysqli_query($conecta, $sql);
                        while($cargos = mysqli_fetch_assoc($qry)){
                            echo "<option value='".$cargos['id']."'>".$cargos["role"]."</option>";
                        }
                    }else{
                ?>
                <option value="" selected disabled hidden>Selecione um cargo...</option>
                <?php 
                  $sql = "SELECT * FROM role";
                  $qry = mysqli_query($conecta, $sql);
                  while($cargos = mysqli_fetch_assoc($qry)){
                    echo "<option value='".$cargos['id']."'>".$cargos["role"]."</option>";
                  }
                }
                ?>
                </select>
              </div>
              <div class="col-md-3">
                Telefone:
                <input type="tel" name="telefone" value="<?php echo $usuario['telefone'] ?>" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                Facebook:
                <input type="text" name="facebook" value="<?php echo $usuario['facebook'] ?>" placeholder="ex.: https://www.facebook.com/seuperfil" class="form-control">
              </div>
              <div class="col-md-4">
                Instagram:
                  <input type="text" name="instagram" value="<?php echo $usuario['instagram'] ?>"  placeholder="ex.: https://www.instagram.com/seuperfil/" class="form-control">
              </div>
              <div class="col-md-4">
                WhatsApp:
                  <input type="tel" name="whatsapp" value="<?php echo $usuario['whatsapp'] ?>" class="form-control" placeholder="ex.: 11999999999">
              </div>
            </div>
            <div class="row">
              <div class="col">
                Bio:
                <textarea name="bio" class="form-control" style="min-height: 150px;"><?php echo $usuario['bio'] ?></textarea>
              </div>
            </div>
            <br>

          </form>
          <?php 
            if(isset($_POST['envia'])){
              $usuario      = $_POST['usuario'];
              $email        = $_POST['email'];
              $nome         = $_POST['nome'];
              $nascimento   = $_POST['nascimento'];
              $role         = $_POST['cargo'];
              $telefone     = $_POST['telefone'];
              $bio          = $_POST['bio'];
              $facebook     = $_POST['facebook'];
              $instagram    = $_POST['instagram'];
              $whatsapp     = $_POST['whatsapp'];
              
              //É hora do show porra!

              $sql = "UPDATE usuarios_admin SET usuario='$usuario', email='$email', nome='$nome', nascimento='$nascimento', role='$role', telefone='$telefone', bio='$bio', facebook='$facebook', instagram='$instagram', whatsapp='$whatsapp' WHERE ID = $id ";
              
              if($conecta->query($sql) === true){
                echo "Usuário atualizado com sucesso!";
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