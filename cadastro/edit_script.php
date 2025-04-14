<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/cadastro_edit.css">
    <title>Alteração de Cadastro</title>
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
        <div >
            <?php

              /* INCLUSÃO DO ARQUIVO QUE REALIZA A CONEXÃO COM O BANCO DE DADOS*/
               INCLUDE 'conexao.php';
               include 'restrito.php';  

                /* ATRIBUIÇÃO DOS DADOS PARA VARIAVEIS*/
                
                $cod_pessoas=$_POST['id'];
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $data_nascimento = $_POST['data_nascimento'];
                $foto =$_FILES['foto'];
                $nomefoto = mover_foto($foto);
                if ($nomefoto == 0){
                  $nomefoto = null;
                }
                /* ATUALIZAR DADOS DENTRO DA TABELA*/
                $sql = "UPDATE pessoas SET nome='$nome', endereco='$endereco', telefone='$telefone', email='$email', data_nascimento='$data_nascimento',foto='$nomefoto' WHERE cod_pessoas='$cod_pessoas'";


      

                if(mysqli_query($conexao, $sql))
                {
                    /*FUNÇÃO CRIADA DENTRO DO ARQUIVO CONEXAO*/
                    mensagem("Editado com sucesso", 'success','feito.png');
                }
                else
                { 
                    /*FUNÇÃO CRIADA DENTRO DO ARQUIVO CONEXAO*/
                    mensagem("Não foi possivel editar", 'danger', 'naofeito.jpg');
                }
            ?>
            <br>
            <a href="pesquisa.php" class ="btn btn-primary">Voltar</a>
        </div>
    </div>
    <footer>
        <p><i class="fas fa-copyright"></i> 2024 José Ronald. Todos os direitos reservados.</p>
    </footer>   
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>