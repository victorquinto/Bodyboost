<?php
session_start();
if(isset($_POST['submit']) && !empty($_POST['email'])&& !empty($_POST['senha']))
{
    include_once('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT*FROM pf WHERE email = '$email' and senha = '$senha'";
    $result = $conexao->query($sql);
   




if(mysqli_num_rows($result)<1){
    print_r('sem conexão');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');

}else{
    print_r('conectado');
    $_SESSION['email']=$email;
    $_SESSION['senha']=$senha;
    header('Location: sistema.php');
}
}else{
    header('location: login.php');
}

?>