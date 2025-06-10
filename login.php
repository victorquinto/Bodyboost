<?php


// Processa Cadastro Cliente (Pessoa Física)
if (isset($_POST["submit_cliente"])) {
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

    $result = mysqli_query($conexao, "INSERT INTO pf(nome, senha, email, telefone, genero, data_nasc, cidade, estado, endereco)
    values ('$nome', '$senha', '$email', '$telefone', '$genero', '$data_nascimento', '$cidade', '$estado', '$endereco' )");
    

    header('Location: home.html');
    exit;
}

// Processa Cadastro Parceiro (Pessoa Jurídica)
if (isset($_POST["submit_parceiro"])) {
    include_once("conexao.php");

    $razao_social = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO pjp(razao_social, cnpj, email, telefone, cidade, estado, endereco, senha)
         VALUES ('$razao_social', '$cnpj', '$email', '$telefone', '$cidade', '$estado', '$endereco', '$senha')");

    header('Location: home.html');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodyboost - Login/Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        html, body {
            height: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            height: 100%;
            width: 100vw;
            overflow-y: auto;
            position: relative;
            box-sizing: border-box;
        }
        #background {
            position: fixed;
            z-index: -1;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            left: 0;
            top: 0;
        }
        .logo { font-family: 'Impact', sans-serif; font-size: 2em; }
        .body-neutro { color: #0db94d; }
        .boost-neutro { color: #A9A9A9; }
        .switch-link { color: #0db94d; text-decoration: underline; cursor: pointer; }
        .hidden { display: none; }
        .form-section { margin-bottom: 2em; }
        .inputBox { margin-bottom: 1.7em; width: 100%; }
        .inputBox label {
            display: block;
            margin-bottom: 0.35em;
            font-weight: 500;
            text-align: left;
            margin-left: 2px;
            margin-right: auto;
            width: 95%;
        }
        .inputUser,
        .inputLogin {
            width: 96%;
            padding: 0.75em 1em;
            font-size: 1.1em;
            border-radius: 6px;
            border: 1px solid #aaa;
            margin-bottom: 0px;
            background: #f8f8f8;
            color: #222;
            box-sizing: border-box;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .genero-group {
            display: flex;
            gap: 1.5em;
            align-items: center;
            margin-top: 0.3em;
        }
        .genero-option {
            display: flex;
            align-items: center;
            gap: 0.3em;
        }
        .loginBox {
            background-color:rgba(54, 54, 54, 0.8);
            border: 1px solid #333;
            position: absolute;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px 25px 25px 25px;
            border-radius: 15px;
            color: white;
            width: 32vw;
            min-width: 340px;
            max-width: 460px;
            height: auto;
            text-align: center;
            overflow-y: auto;
            max-height: 80vh; /* Para barra de rolagem interna caso necessário */
        }
        .loginBox h1,
        .loginBox h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .loginBox form button[type="submit"],
        .loginBox form button[type="reset"] {
            margin-bottom: 16px;
            margin-right: 10px;
            margin-left: 10px;
        }
        .loginBox h6 {
            margin-top: 1.7em !important;
        }
        .tela-inicial {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            margin-top: 100px;
        }
        .tela-inicial h2 {
            margin-bottom: 2em;
        }
        .tela-inicial .btn-group {
            gap: 2em;
        }
        .tela-inicial button {
            min-width: 150px;
            padding: 1em 2em;
            font-size: 1.2em;
        }
        
        @media (max-width: 600px) {
            .loginBox { width: 98vw; min-width: unset; max-width: unset; }
            .inputUser, .inputLogin { width: 98%; }
        }
    </style>
</head>
<body>
<video id="background" autoplay muted loop>
    <source src="img/video1.mp4" type="video/mp4">
    Seu navegador não suporta o elemento de vídeo.
</video>
<header class="cabecalho">
    <div class="logo">
        <a href="home.html"span class="body-neutro">BODY</a>
        <a href="home.html"span class="boost-neutro">BOOST</a>
    </div>
    <nav>
        <ul class="menu">
            <li><a href="home.html">Início</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

<div id="tela_inicial" class="tela-inicial">
    <h2>Você é:</h2>
    <div class="btn-group">
        <button class="btn btn-success" onclick="showSection('login_cliente')">Cliente</button>
        <button class="btn btn-secondary" onclick="showSection('login_parceiro')">Parceiro</button>
    </div>
</div>

<div class="form-container loginBox">
    <!-- Login Cliente -->
    <div id="login_cliente" class="form-section hidden">
        <h2>Login Cliente</h2>
        <form action="testelogin.php" method="POST">
            <div class="inputBox">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="inputLogin" placeholder="E-mail" required>
            </div>
            <div class="inputBox">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="inputLogin" placeholder="Senha" required>
            </div>
            <button type="submit" name="submit" value="enviar" id="button">Enviar</button>
        </form>
        <h6>Não possui conta? <span class="switch-link" onclick="showSection('cadastro_cliente')">Cadastre-se</span></h6>
    </div>
    <!-- Cadastro Cliente -->
    <div id="cadastro_cliente" class="form-section hidden">
        <form action="login.php" method="post">
            <fieldset>
                <legend><b>Cadastro Cliente</b></legend><br>
                <div class="inputBox">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label>Gênero:</label>
                    <div class="genero-group">
                        <div class="genero-option">
                            <input type="radio" id="feminino" name="genero" value="feminino" required>
                            <label for="feminino" style="font-weight:400;margin-bottom:0;">Feminino</label>
                        </div>
                        <div class="genero-option">
                            <input type="radio" id="masculino" name="genero" value="masculino" required>
                            <label for="masculino" style="font-weight:400;margin-bottom:0;">Masculino</label>
                        </div>
                        <div class="genero-option">
                            <input type="radio" id="outro" name="genero" value="outro" required>
                            <label for="outro" style="font-weight:400;margin-bottom:0;">Outro</label>
                        </div>
                    </div>
                </div>
                <div class="inputBox">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" name="data_nasc" id="data_nasc" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                </div>
                <button type="submit" name="submit_cliente" id="button">Enviar</button>
                <button type="reset" name="reset" id="button">Reset</button>
            </fieldset>
        </form>
        <h6>Já possui conta? <span class="switch-link" onclick="showSection('login_cliente')">Entrar</span></h6>
    </div>
    <!-- Login Parceiro -->
    <div id="login_parceiro" class="form-section hidden">
        <h2>Login Parceiro</h2>
        <form action="testeloginp.php" method="POST">
            <div class="inputBox">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="inputLogin" placeholder="E-mail" required>
            </div>
            <div class="inputBox">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="inputLogin" placeholder="Senha" required>
            </div>
            <button type="submit" name="submit" value="enviar" id="button">Enviar</button>
        </form>
        <h6>Não possui conta? <span class="switch-link" onclick="showSection('cadastro_parceiro')">Cadastre-se</span></h6>
    </div>
    <!-- Cadastro Parceiro -->
    <div id="cadastro_parceiro" class="form-section hidden">
        <form action="login.php" method="post">
            <fieldset>
                <legend><b>Cadastro Parceiro</b></legend><br>
                <div class="inputBox">
                    <label for="razao_social">Razão Social</label>
                    <input type="text" name="razao_social" id="razao_social" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="email_pj">E-mail</label>
                    <input type="email" name="email" id="email_pj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="senha_pj">Senha</label>
                    <input type="password" name="senha" id="senha_pj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="telefone_pj">Telefone</label>
                    <input type="tel" name="telefone" id="telefone_pj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="cidade_pj">Cidade</label>
                    <input type="text" name="cidade" id="cidade_pj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="estado_pj">Estado</label>
                    <input type="text" name="estado" id="estado_pj" class="inputUser" required>
                </div>
                <div class="inputBox">
                    <label for="endereco_pj">Endereço</label>
                    <input type="text" name="endereco" id="endereco_pj" class="inputUser" required>
                </div>
                <button type="submit" name="submit_parceiro" id="button">Enviar</button>
                <button type="reset" name="reset" id="button">Reset</button>
            </fieldset>
        </form>
        <h6>Já possui conta? <span class="switch-link" onclick="showSection('login_parceiro')">Entrar</span></h6>
    </div>
</div>

<footer class="navbarrodape">
    <ul>
        <li><a href="#">Termos de Serviço</a></li>
        <li><a href="#">Política de Privacidade</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="manual.html">Contate-nos</a></li>
    </ul>
    <p>&copy; 2025 Todos os direitos reservados - BODYBOOST LTDA. CNPJ: 00.000.000/0000-00.</p>
</footer>
<script>
function showInitialScreen() {
    document.getElementById('tela_inicial').style.display = 'flex';
    document.querySelector('.loginBox').style.display = 'none';
    document.getElementById('login_cliente').classList.add('hidden');
    document.getElementById('cadastro_cliente').classList.add('hidden');
    document.getElementById('login_parceiro').classList.add('hidden');
    document.getElementById('cadastro_parceiro').classList.add('hidden');
}
function showSection(section) {
    document.getElementById('tela_inicial').style.display = 'none';
    document.querySelector('.loginBox').style.display = 'block';
    document.getElementById('login_cliente').classList.add('hidden');
    document.getElementById('cadastro_cliente').classList.add('hidden');
    document.getElementById('login_parceiro').classList.add('hidden');
    document.getElementById('cadastro_parceiro').classList.add('hidden');
    document.getElementById(section).classList.remove('hidden');
}
// Mostra tela inicial ao carregar
showInitialScreen();
</script>
<script src="script.js"></script>
</body>
</html>