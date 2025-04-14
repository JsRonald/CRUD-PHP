<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    $_SESSION['mensagem']="Você precisa fazer login para acessar esta página.";
    header('location: ../acesso.php');
    exit();
}
?>  