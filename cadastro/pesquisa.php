<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Pesquisa</title>
</head>
<body>
    <?php 
    include "conexao.php";
    include 'restrito.php'; 
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
    <div style="margin-top:100px;"class="container">
        <div class="row">
            <center>
                <h1 style="font-family:Didot, serif; font-size:50px;">Cadastrados</h1><br>
            </center>
            <nav class="navbar navbar-light w-100" style="background-color:#e3f2fd; box-shadow:2px 2px 1px 1px #aad2f0; border:none">                
                <form class="form-inline" action="pesquisa.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca" id="busca" autofocus value="<?php if(isset($_POST['busca'])) echo $_POST['busca']?>">
                    <button style="width:150px"class="btn btn-outline-success" type="submit">Pesquisar</button>
                    <a style="margin-left:400px;" href="index.php" class="btn btn-primary btn-lg">Voltar para tela inicial</a>                   
                </form>
            </nav>
            
            <table class="table table-hover" style="margin:auto; margin-top: 20px;margin-bottom:20px;border:2px solid black;padding:10px;">
                <thead>
                    <tr>
                        <th scope="col" style ='border-right:1px solid black'>Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody id="tabelaCorpo">
                    <?php 
                    // Definindo Paginação
                    $perpage = 10;
                    $sql3 = "SELECT COUNT(*) AS total FROM pessoas";
                    $comandosql3 = mysqli_query($conexao, $sql3);
                    $total = mysqli_fetch_assoc($comandosql3)['total'];
                    $totalpaginas = ceil($total / $perpage);
                    $paginaatual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $paginaatual = max(1, $paginaatual);
                    $qtdecomeca = ($paginaatual - 1) * $perpage;

                    // Caso ocorra a busca
                    $pesquisa = trim($_POST['busca'])  ;
                        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%' LIMIT $qtdecomeca, $perpage";
                        $dados = mysqli_query($conexao, $sql);
                        if ($dados->num_rows == 0) {
                            echo "<tr><td colspan='7'>Nenhum resultado encontrado...</td></tr>";
                        } else {
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $cod_pessoas = $linha['cod_pessoas'];
                                $nome = $linha['nome'];
                                $endereco = $linha['endereco'];
                                $telefone = $linha['telefone'];
                                $email = $linha['email'];
                                $data_nascimento = mostrar_data($linha['data_nascimento']);
                                $foto = $linha['foto'] ?: 'avatar.jpg';
                                $mostrar_foto = "<img src='../img/$foto'>";
                                
                                echo "<tr>
                                    <th style ='border-right:1px solid black' class ='mostrar_foto'>$mostrar_foto</th>
                                    <td scope='row'>$nome</td>
                                    <td>$endereco</td>
                                    <td>$telefone</td>
                                    <td>$email</td>
                                    <td>$data_nascimento</td>
                                    <td width='150px' style='display: flex; flex-direction: row;'>
                                        <form action='cadastro_edit.php' method='POST'>
                                            <input type='hidden' name='cod_pessoas' value='$cod_pessoas'>                                      	
                                            <input type='submit' class ='btn btn-success btn-sm' value='Editar'>
                                        </form>
                                        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onclick='confirma(\"$nome\",\"$cod_pessoas\")' style='margin-left:10px'>Excluir</a>  
                                    </td>
                                </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
            </div>            
            <div class="d-flex justify-content-center mt-3" style="margin-bottom:70px;">
                <?php
                // Exibição de links de paginação
                for ($i = 1; $i <= $totalpaginas; $i++) {
                    if ($i == $paginaatual) {
                        echo "<span class='btn btn-secondary mr-2'>$i</span>"; 
                    } else {
                        echo "<a href='pesquisa.php?page=$i' class='btn btn-primary mr-2'>$i</a>";
                    }
                }
                ?>
            </div>
                
        
    </div> 

    <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="width:50px;"class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <form action="excluir.php" method="POST" style="margin-left:10px">
                    <input type="hidden" name="id" id="id_pessoa"> <!-- Armazena o ID da pessoa -->
                    <input type="hidden" name="nome" id="nome_pessoa_form"> <!-- Armazena o nome da pessoa -->
                    <button type="submit" style="width:50px;" class="btn btn-danger">Sim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p><i class="fas fa-copyright"></i> 2024 José Ronald. Todos os direitos reservados.</p>
    </footer>  

    <script>
        function confirma(nome, id) {
        document.getElementById("nome_pessoa").innerText = nome; // Atualiza o texto no modal
        document.getElementById("id_pessoa").value = id; // Define o ID no campo oculto
        document.getElementById("nome_pessoa_form").value = nome; // Define o nome no campo oculto
    }

        function limpar() {
            document.getElementById('tabelaCorpo').innerHTML = '';
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
