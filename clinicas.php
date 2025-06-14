<?php
session_start();
include_once('conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    session_unset();
    header('Location: login.php');
    exit();
}
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            /* Centraliza os cards horizontalmente */
            flex-wrap: wrap;
            /* Permite que os cards quebrem para a próxima linha em telas menores */
            margin-top: 20px;
            /* Adiciona espaço acima dos cards */
        }

        .card {
            background-color: rgba(54, 54, 54, 0.8);
            border: 1px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: white;
            width: 25%;
            justify-content: center;
            margin: 10px;
            /* Adiciona espaço entre os cards */
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo {
            font-family: 'Impact', sans-serif;
            font-size: 2em; /* Aumenta o tamanho da fonte da logo */
        }

        .body-neutro {
            color: #0db94d;
            /* Azul aço */
        }

        .boost-neutro {
            color: #A9A9A9;
            /* Cinza elegante */
        }
    </style>
</head>

<body>

    <!-- Adicione o elemento de vídeo no HTML -->
    <video id="background" autoplay muted loop>
        <!-- Um vídeo inicial, caso queira carregar um primeiro vídeo padrão -->
        <source src="img/video1.mp4" type="video/mp4">
        Seu navegador não suporta o elemento de vídeo.
    </video>
    <!-- Navbar superior -->
    <header class="cabecalho">
        <div class="logo">
        <a href="home.html"span class="body-neutro">BODY</a>
        <a href="home.html"span class="boost-neutro">BOOST</a>
    </div>
        <nav>
            <ul class="menu">
                <li><a href="sistema.php">Home</a></li>
                <li><a href="mapas.php">Parceiros proximos</a></li>
                <li><a href="exames.php">Historico de exames</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <!-- Cards organizados horizontalmente -->

    <div class="card-container">
        <div class="card">
            <img src="img/28_julho_logo2.jpg" class="card-img-top" alt="Clínica 28 de Julho">
            <div class="card-body">
                <h5 class="card-title">Clínica 28 de Julho</h5>
                <p class="card-text">Oferece serviços de nutrição e outras especialidades médicas.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Local: Praça José Bastos, 74</li>
                <li class="list-group-item">Horário: 8h às 18h</li>
                <li class="list-group-item">Utilize o nosso codigo: BODYBOOST</li>
            </ul>
            <div class="card-body">
                <a href="https://clinica28dejulho.com.br" class="card-link" target="_blank">
                    <i class="bi bi-browser-chrome"></i> Site
                </a>
            </div>
        </div>
        <div class="card">
            <img src="img/amorsaude_logo2.png" class="card-img-top" alt="Amor Saúde">
            <div class="card-body">
                <h5 class="card-title">Amor Saúde</h5>
                <p class="card-text">Clínica com consultas acessíveis para várias especialidades, incluindo nutrição.
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Local: Rua Rui Barbosa, 761, Centro</li>
                <li class="list-group-item">Horário: 7h às 19h</li>
                <li class="list-group-item">Utilize o nosso codigo: BODYBOOST</li>
            </ul>
            <div class="card-body">
                <a href="https://www.amorsaude.com.br" class="card-link" target="_blank">
                    <i class="bi bi-browser-chrome"></i> Site
                </a>
            </div>
        </div>
        <div class="card">
            <img src="img/ciam_logo2.jpg" class="card-img-top" alt="Clínica Ciam">
            <div class="card-body">
                <h5 class="card-title">Clínica Ciam</h5>
                <p class="card-text">Atendimento nutricional com foco em saúde e bem-estar.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Local: Avenida Aziz Maron, 129</li>
                <li class="list-group-item">Horário: 9h às 17h</li>
                <li class="list-group-item">Utilize o nosso codigo: BODYBOOST</li>
            </ul>
            <div class="card-body">
                <a href="https://www.instagram.com/ciam.clinica" class="card-link" target="_blank">
                    <i class="bi bi-browser-chrome"></i> Contato
                </a>
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="script.js"></script>
    <!-- Icones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>