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

        /* Estilos para o formulário de resultados de exames */
        #resultados-exames {
            background-color: rgba(54, 54, 54, 0.8);
            border: 1px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 10px;
            /* Adiciona margem para separação quando empilhados */
        }

        #resultado {
            background-color: rgba(54, 54, 54, 0.8);
            border: 1px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 10px;
            /* Adiciona margem para separação quando empilhados */
        }

        #resultados-exames h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        #resultadoSalvo {
            margin-top: 10px;
            /* Reduz a margem superior quando lado a lado */
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            /* Inicialmente escondido */
        }

        #resultadoSalvo h3 {
            margin-top: 0;
        }

        .resultado-item {
            margin-bottom: 8px;
        }

        .resultado-label {
            font-weight: bold;
        }

        /* Estilos para layout lado a lado */
        .resultados-container {
            display: flex;
            flex-wrap: wrap;
            /* Permite que quebre em telas menores */
            gap: 20px;
            /* Espaço entre os itens */
            justify-content: space-around;
            /* Distribui o espaço */
            margin: 20px auto;
            /* Centraliza o container e adiciona margem */
            max-width: 1200px;
            /* Largura máxima para o container */
        }

        #resultados-exames,
        #resultado {
            flex: 1;
            /* Cada seção ocupa o mesmo espaço disponível */
            min-width: 300px;
            /* Largura mínima para evitar que fiquem muito estreitos */
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
                <li><a href="sistema.php">Home</a></li>
                <li><a href="mapas.php">Parceiros proximos</a></li>
                <li><a href="exames.php">Historico de exames</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <div class="resultados-container">
        <section id="resultados-exames">
            <h2>Salvar Resultado de Exame</h2>
            <form id="formExame">
                <div class="form-group">
                    <label for="nomePaciente">Nome do Paciente:</label>
                    <input type="text" class="form-control" id="nomePaciente" name="nomePaciente" required>
                </div>
                <div class="form-group">
                    <label for="dataExame">Data do Exame:</label>
                    <input type="date" class="form-control" id="dataExame" name="dataExame" required>
                </div>
                <div class="form-group">
                    <label for="tipoExame">Tipo de Exame:</label>
                    <input type="text" class="form-control" id="tipoExame" name="tipoExame" required>
                </div>
                <div class="form-group">
                    <label for="resultadoExame">Resultado do Exame (Opcional):</label>
                    <textarea class="form-control" id="resultadoExame" name="resultadoExame" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="arquivoExame">Documento ou Foto do Exame:</label>
                    <input type="file" class="form-control" id="arquivoExame" name="arquivoExame">
                    <small class="form-text text-muted">Selecione um arquivo PDF, JPG, PNG, etc.</small>
                </div>
                <button type="button" class="btn btn-primary" onclick="salvarResultado()">Salvar Resultado</button>
            </form>
        </section>

        <section id="resultado">
            <div id="resultadoSalvo" style="display: none;">
                <h3>Resultado Salvo</h3>
                <p class="resultado-item"><span class="resultado-label">Nome do Paciente:</span> <span
                        id="pacienteResultado"></span></p>
                <p class="resultado-item"><span class="resultado-label">Data do Exame:</span> <span
                        id="dataResultado"></span></p>
                <p class="resultado-item"><span class="resultado-label">Tipo de Exame:</span> <span
                        id="tipoResultado"></span></p>
                <p class="resultado-item"><span class="resultado-label">Resultado (Texto):</span> <span
                        id="resultadoTexto"></span></p>
                <p class="resultado-item"><span class="resultado-label">Arquivo:</span> <span id="arquivoNome">Nenhum
                        arquivo selecionado</span></p>
            </div>
        </section>
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
    <script>
        function salvarResultado() {
            const nomePaciente = document.getElementById('nomePaciente').value;
            const dataExame = document.getElementById('dataExame').value;
            const tipoExame = document.getElementById('tipoExame').value;
            const resultadoExame = document.getElementById('resultadoExame').value;
            const arquivoExame = document.getElementById('arquivoExame').files[0];
            const resultadoSalvoDiv = document.getElementById('resultadoSalvo');
            const arquivoNomeSpan = document.getElementById('arquivoNome');

            document.getElementById('pacienteResultado').textContent = nomePaciente;
            document.getElementById('dataResultado').textContent = dataExame;
            document.getElementById('tipoResultado').textContent = tipoExame;
            document.getElementById('resultadoTexto').textContent = resultadoExame;

            if (arquivoExame) {
                arquivoNomeSpan.textContent = arquivoExame.name;
            } else {
                arquivoNomeSpan.textContent = 'Nenhum arquivo selecionado';
            }

            resultadoSalvoDiv.style.display = 'block';
            document.getElementById('formExame').reset(); // Limpa o formulário após salvar (exceto o campo de arquivo por segurança em alguns navegadores)
            document.getElementById('arquivoExame').value = ''; // Limpa explicitamente o campo de arquivo
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>