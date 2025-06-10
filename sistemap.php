<?php
session_start();
include_once('conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    session_unset();
    header('Location: login.php');
    exit();
}

$logado = $_SESSION['email'];

// Verificar se a busca foi enviada
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search = "%" . $conexao->real_escape_string($_GET['query']) . "%";

    // Preparar a consulta SQL com filtro por email
    $stmt = $conexao->prepare(
        "SELECT * FROM pjp 
        WHERE (razao_social LIKE ? OR cnpj LIKE ? OR email LIKE ? OR telefone LIKE ?) 
        AND email = ?"
    );
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conexao->error));
    }

    // Vincular parâmetros e executar
    $stmt->bind_param("sssss", $search, $search, $search, $search, $logado);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    // Obter resultados
    $result = $stmt->get_result();
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }
} else {
    // Consulta padrão com filtro por email
    $stmt = $conexao->prepare("SELECT * FROM pjp WHERE email = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conexao->error));
    }

    // Vincular parâmetros e executar
    $stmt->bind_param("s", $logado);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    // Obter resultados
    $result = $stmt->get_result();
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus Cadastros</title>
    <link rel="stylesheet" href="style.css">
    <style>
.cadastro {
    width: 95%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.cadastro th, .cadastro td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.cadastro th {
    background-color: #1ed760;
    font-weight: bold;
}

.cadastro tr:nth-child(even) {
    background-color: rgba(0, 0, 0, 0.5);
}

.cadastro tr {
    background-color:rgba(54, 54, 54, 0.8);
}

.cadastro .btn-edit, .cadastro .btn-delete {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    margin: 5px;
    border-radius: 5px;
}

.cadastro .btn-edit {
    background-color: #4CAF50;
    color: white;
}

.cadastro .btn-delete {
    background-color: #f44336;
    color: white;
}

.cadastro .btn-edit:hover {
    background-color: #45a049;
}

.cadastro .btn-delete:hover {
    background-color: #d32f2f;
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

    <!-- Navbar superior -->
    <header class="cabecalho">
        <div class="logo">
        <a href="sair.php"span class="body-neutro">BODY</a>
        <a href="sair.php"span class="boost-neutro">BOOST</a>
    </div>
        <nav>
            <ul class="menu">
                <li><a href="sair.php">Home</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <!-- Exibindo o email do usuário no topo -->
    <div class="welcome-email">
        <h1>Bem-vindo(a): <?php echo htmlspecialchars($logado); ?></h1>
    </div>

    <!-- Exibição dos cadastros -->
    <table class="cadastro">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Razao social</th>
                <th scope="col">cnpj</th>
                <th scope="col">email</th>
                <th scope="col">telefone</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($user_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user_data['id']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['razao_social']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['cnpj']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['email']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['telefone']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['cidade']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['estado']) . "</td>";
                echo "<td>" . htmlspecialchars($user_data['endereco']) . "</td>";
                echo "<td>
                    <form action='edit.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id' value='".htmlspecialchars($user_data['id'], ENT_QUOTES, 'UTF-8')."'>
                        <button type='submit' class='btn-edit'> Edit </button>
                    </form>

                    <form action=delete.php method='post' style='display:inline;'>
                    <input type='hidden' name='id' value='".htmlspecialchars($user_data['id'], ENT_QUOTES, 'UTF-8')."'>
                    <button type='submit' class='btn-delete'> Delete </button>
                    </form>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

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
        crossorigin="anonymous"
        src="script.js"></script>
    <!-- Icones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
