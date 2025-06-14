<?php
session_start();

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Usuário não está logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
  .card-container {
    display: flex;
    justify-content: center; /* Centraliza os cards horizontalmente */
    flex-wrap: wrap; /* Permite que os cards quebrem para a próxima linha em telas menores */
    margin-top: 20px; /* Adiciona espaço acima dos cards */
}

.card {
    background-color: rgba(54, 54, 54, 0.8);
    border: 1px solid #333;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: white;
    width: 25%;
    justify-content: center;
    margin: 10px; /* Adiciona espaço entre os cards */
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
        <a href="sair.php"span class="body-neutro">BODY</a>
        <a href="sair.php"span class="boost-neutro">BOOST</a>
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
    <div class="title">
        <h1>Melhores academias e parceiros de bem-estar em um só lugar</h1>
        <div class="card-container d-flex justify-content-around">
            <!-- Card 1: Loja de suplementos -->
            <div class="card " style="width: 18rem;">
                <img src="img/lojas.jpg" class="card-img-top" alt="Loja de Suplementos">
                <div class="card-body">
                    <h5 class="card-title">Loja de Suplementos</h5>
                    <p class="card-text">Encontre os melhores produtos para sua nutrição esportiva.</p>
                </div>
                <div class="card-body">
                    <a href="suplementos.php" class="card-link">Saiba Mais</a>
                </div>
            </div>
            <!-- Card 2: Clínica de saúde -->
            <div class="card" style="width: 18rem;">
                <img src="img/clinicas.jpg" class="card-img-top" alt="Clínica de Saúde">
                <div class="card-body">
                    <h5 class="card-title">Clínica de Saúde</h5>
                    <p class="card-text">Cuidado integral com profissionais especializados.</p>
                </div>
                <div class="card-body">
                    <a href="clinicas.php" class="card-link">Saiba Mais</a>
                </div>
            </div>
            <!-- Card 3: Academia -->
            <div class="card" style="width: 18rem;">
                <img src="img/Academia1.jpg" class="card-img-top" alt="Academia"
                    style="height: 230px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Academia</h5>
                    <p class="card-text">Treine e transforme-se com equipamentos modernos e espaço dedicado.</p>
                </div>
                <div class="card-body">
                    <a href="academia.php" class="card-link">Saiba Mais</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

