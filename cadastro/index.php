<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro_edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php
      include 'restrito.php';
    ?>
  <title>Empresa</title>
  </head>
  <body>
    <header>
        <nav>
            <a href="index.php"><i class="fas fa-bars"></i></a>
            <a href="cadastro.php"><i class="fas fa-user-plus"></i></a>
            <form style=" padding: 0px; border: none; width:35px; right:0px;" action="logout.php" method="post">
            <button style="cursor:pointer;" type="submit"><i class="fas fa-door-open"></i></button>
            </form>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1 class="display-4">Cadastro Web</h1>
                <p class="lead">Este é um sistema simplificado de cadastro. Base de estudos para criação de sistemas com PHP e MYSQL</p>
                <hr class="my-4">
                <p>Acesse as funções</p>
                <a class="btn btn-primary btn-lg" href="cadastro.php" role="button">Cadastrar</a>
                <a class="btn btn-primary btn-lg" href="pesquisa.php" role="button">Pesquisar</a>
            </div>
        </div>
    </div>  
    <footer>
        <p><i class="fas fa-copyright"></i> 2025 José Ronald. Todos os direitos reservados.</p>
    </footer>  
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>