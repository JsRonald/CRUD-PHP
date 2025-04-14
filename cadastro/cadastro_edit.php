<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro_edit.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Alteração de Cadastro</title>
  </head>
  <body>

<?php

    include "conexao.php";
    include 'restrito.php';
    $cod_pessoas = $_POST['cod_pessoas'];
    $sql = "SELECT * FROM pessoas WHERE cod_pessoas = '$cod_pessoas'";
    $dados = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $foto= $linha['foto'];

?>
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
        <div class="col">
            <center>
                <h1>Alteração de Cadastro</h1>
            </center>
            <form action="edit_script.php" style="display: flex; flex-direction: column;margin:auto; border: 2px solid black;padding: 20px;width: 500px;border-radius:20px;" method="post" enctype="multipart/form-data">
                <div class="form-group" id="foto_container">
                    <?php 
                        $foto = $linha['foto'] ?? ''; // Verifica se a foto está definida
                        if ($foto) {
                            echo "<img id='foto_perfil' src='../img/$foto' alt='Foto de perfil'>";
                        } else {
                            echo "<img id='foto_perfil' src='../img/avatar.jpg' alt='Foto de perfil'>";
                        }
                    ?>         
                    <i class="fas fa-pencil-alt edit-icon"></i>         
                    <input type="file" class="input_foto" name="foto" required accept="image/*">             
                </div>

                <script>
                    // Abrir seletor de arquivos ao clicar no ícone de edição
                    document.querySelector('.edit-icon').addEventListener('click', function() {
                        document.querySelector('.input_foto').click();
                    });

                    // Pré-visualizar a foto selecionada
                    document.querySelector('.input_foto').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('foto_perfil').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                </script>
                <div class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">                
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">                
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">             
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">              
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nascimento" required value="<?php echo $linha['data_nascimento']; ?>">              
                </div>
                
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['cod_pessoas']; ?>">                       
                    </div>
                    
                </center>
                <a href="index.php" class="btn btn-primary">Voltar para tela inicial</a>
            </form>
            <center>
        </div>
    </div>
</div>
<footer>
        <p><i class="fas fa-copyright"></i> 2025 José Ronald. Todos os direitos reservados.</p>
</footer>                   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>