<?php
session_start();

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Usuário não está logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

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
      font-size: 2em;
      /* Aumenta o tamanho da fonte da logo */
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
  <!-- Navbar Superior -->
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

  <!-- Seção de Produtos -->
  
  <div class="card-container">
    <div class="card">
      <img src="img/Growth.jpg" class="card-img-top" alt="Clínica 28 de Julho">
      <div class="card-body">
        <h5 class="card-title">Growth Suplementos</h5>
        <p class="card-text">Encontre qualidade e preços incríveis!!</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cupom: BODYBOOST10</li>
        <li class="list-group-item">Desconto: 10%</li>
      </ul>
      <div class="card-body">
        <a href="https://www.gsuplementos.com.br/" class="card-link" target="_blank">
          <i class="bi bi-browser-chrome"></i> Site
        </a>
      </div>
    </div>
    <div class="card">
      <img src="img//Max_logo.jpg" class="card-img-top" alt="Amor Saúde">
      <div class="card-body">
        <h5 class="card-title">Max Titanium</h5>
        <p class="card-text">A força que seu corpo merece!</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cupom: BODYBOOST15</li>
        <li class="list-group-item">Desconto: 15%</li>
      </ul>
      <div class="card-body">
        <a href="https://www.maxtitanium.com.br/" class="card-link" target="_blank">
          <i class="bi bi-browser-chrome"></i> Site
        </a>
      </div>
    </div>
    <div class="card">
      <img src="img/Black_Skull_logo2.png" class="card-img-top" alt="Clínica Ciam">
      <div class="card-body">
        <h5 class="card-title">Black Skull</h5>
        <p class="card-text">A escolha dos campeões!</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cupom: BODYBOOST20</li>
        <li class="list-group-item">Desconto: 20%</li>
      </ul>
      <div class="card-body">
        <a href="https://www.blackskullusa.com.br/" class="card-link" target="_blank">
          <i class="bi bi-browser-chrome"></i> Site
        </a>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="script.js"></script>
</body>

</html>