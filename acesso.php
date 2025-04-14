<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
    <?php 
    include "cadastro/conexao.php";
    ?>
</head>
<body> 
    <header>
        <nav>
            <a href="cadastro/index.php"><i class="fas fa-bars"></i></a>
            <a href="cadastro/cadastro.php"><i class="fas fa-user-plus"></i></a>
            <button id="form"><i class="fas fa-door-open"></i></button>
        </nav>
    </header>
    <form action="acesso.php" method="POST">
        <center>
        <h1>Entrar</h1>      
        <div style="margin-bottom: 10px;">
            <label for="login">Usuario:</label>
            <input type="text" name="login" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
        </div>        
        <button type="submit" class="btn btn-outline-dark">Entrar</button>
        </center>
        <?php
        session_start();
        if($_SERVER['REQUEST_METHOD'] =='POST'){
        $loginusuario= mysqli_real_escape_string($conexao,$_POST['login']);
        $senhausuario= mysqli_real_escape_string($conexao,$_POST['senha']);
        $comandosql = "SELECT * FROM acesso WHERE login = '$loginusuario'";
        $sql = mysqli_query($conexao, $comandosql);
        if ($sql) {
            $usuario = mysqli_fetch_assoc($sql);
            if ($usuario && $usuario['senha'] == $senhausuario) {
                session_regenerate_id();
                $_SESSION['usuario'] = $usuario['login'];
                $_SESSION['senha'] = $usuario['senha'];
                header('Location: cadastro/index.php');
                exit();
            } else {
                echo "<center>Login ou senha inválidos.</center>";
            }
        } else {
            echo "<center>Erro na consulta SQL.</center>";
        }
        }
        ?>
        <?php 
         if (isset($_SESSION['mensagem_erro'])) {
            echo "<p style='color: red; text-align: center;'>" . $_SESSION['mensagem_erro'] . "</p>";
            unset($_SESSION['mensagem_erro']);
        }
        ?>
    </form>
      <footer>
        <p><i class="fas fa-copyright"></i> 2025 José Ronald. Todos os direitos reservados.</p>
    </footer>  
    
</body>
</html>