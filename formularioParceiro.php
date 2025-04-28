<?php
if(isset($_POST["submit"])){
    include_once("conexao.php");

    $razao_social = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    
    // Insere os dados na tabela
    $result = mysqli_query($conexao, "INSERT INTO pjp(razao_social, cnpj, email, telefone, cidade, estado, endereco, senha)
         VALUES ('$razao_social', '$cnpj', '$email', '$telefone', '$cidade', '$estado', '$endereco', '$senha');");

    // Redireciona para a página 'home.php'
    header('Location: home.html');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <form action="formularioParceiro.php" method="post">
        <fieldset>
            <legend><b>Formulário de Cadastro Parceiro</b></legend><br>

            <!-- Pessoa Jurídica -->
            <div id="pessoaJuridicaFields">
                <!-- Razão Social -->
                <div class="inputBox">
                    <input type="text" name="razao_social" id="razao_social" class="inputUser" required>
                    <label for="razao_social" class="labelInput">Razão Social</label>
                </div><br>

                <!-- CNPJ -->
                <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                    <label for="cnpj" class="labelInput">CNPJ</label>
                </div><br>

                <!-- Email -->
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">E-mail</label>
                </div><br>

                <!-- Senha -->
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div><br>

                <!-- Telefone -->
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div><br>

                <!-- Cidade -->
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div><br>

                <!-- Estado -->
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div><br>

                <!-- Endereço -->
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br>
            </div>

            <!-- Botões -->
            <button type="submit" name="submit" id="button">Enviar</button>
            <button type="reset" name="reset" id="button">Resetar</button>
        </fieldset>
    </form>
</div>

        
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
