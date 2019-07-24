<!doctype html>
<html lang="pt-br">
  <head>
    <!-- MetaTags necessárias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.">
    <meta name="author" content="Luciano dii Souza - Desenvolvedor Web FullStack & Mobile">
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>VoceFit</title>
  </head>
  <body>
  <!-- barra de navegação  -->
    <form method="post" style="justify-content: center; margin-left: 40%; margin-top: 20%;">
      <div class="row">
        <div class="col-md-4">
          Usuário: 
          <input type="text" name="usuario" class="form-control">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
          Senha:
          <input type="password" name="senha" class="form-control">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
            <input type="submit" value="Enviar" class="btn btn-success" name="enviar">
            <input type="reset" value="Limpar" class="btn btn-danger" name="limpar">
            <input type="hidden" value="envia" name="envia">
          </div>
      </div>
      <?php 
        if(isset($_POST['envia'])){
          $usuario = $_POST['usuario'];
          $senha = $_POST['senha'];

          if($usuario = 'admin' and $senha = 'admin'){
            echo "Senha correta! Fazendo login!";
            header('Location: /web');
          }else{
            echo "Usuário ou senha incorretos.";
          }

        }
      ?>
    </form>

    <!-- Javascript é opcional -->
    <!-- Seguir a ordem JQuery > Popper > Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
