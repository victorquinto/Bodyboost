<?php
include_once('conexao.php');

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $razao_social = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    

    $sqlUpdate = "UPDATE pjp SET razao_social='$razao_social', cnpj='$cnpj', email='$email', telefone='$telefone',
    cidade='$cidade', estado='$estado', endereco='$endereco', senha='$senha'
     WHERE id='$id'";

     $result=$conexao->query($sqlUpdate);
}

header('Location:sistemap.php');

?>