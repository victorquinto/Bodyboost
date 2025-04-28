<?php
if (isset($_POST["submit"])) {
    include_once("conexao.php");

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nasc'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    // Usando prepared statement para evitar SQL Injection
    $result = mysqli_query($conexao, "INSERT INTO pf(nome, senha, email, telefone, genero, data_nasc, cidade, estado, endereco)
    values ('$nome', '$senha', '$email', '$telefone', '$genero', '$data_nascimento', '$cidade', '$estado', '$endereco' )");
    header('Location: home.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodyboost</title>
    <link rel="stylesheet" href="style.css">
    


</head>
<body>

    <!-- Adicione o elemento de vídeo no HTML -->
    <video id="background" autoplay muted loop>
    <!-- Um vídeo inicial, caso queira carregar um primeiro vídeo padrão -->
    <source src="img/video1.mp4" type="video/mp4">
    Seu navegador não suporta o elemento de vídeo.
</video>
    
   <header class="cabecalho">
        <img class="i1" src="img/log.png" alt="Logo" class="logo">
        <nav>
            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="loginCliente.php">Login Cliente</a></li>
                <li><a href="loginParceiro.php">Login Parceiro</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <form action="formulariocliente.php" method="post">
            <fieldset>
                <legend><b>Fomulário de Cadastro Cliente</b></legend><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">E-mail</label>
                </div><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div><br>

                <p><b>Gênero:</b></p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label><br><br>

                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br>
                <button type="submit" name="submit" id="button">Enviar</button>
                <button type="reset" name="reset" id="button">Reset</button>
            </fieldset>
        </form>
    </div>

    <footer class="navbarrodape">
        <ul>
            <li><a href="#">Termos de Serviço</a></li>
            <li><a href="#">Política de Privacidade</a></li>
            <li><a href="faq.html">FAQ</a></li>
        </ul>
        <p>&copy; 2025 Site de Parcerias - Todos os direitos reservados.</p>
    </footer>

     <script src="script.js"></script>
</body>
</html>
