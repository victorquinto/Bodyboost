<?php
if(!empty($_GET['id'])){
    include_once('conexao.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM pjp WHERE id=$id";

    $result = $conexao->query($sqlSelect);
    //print_r($result);


    if($result->num_rows > 0){

        while($_user_data = mysqli_fetch_assoc($result)){
        $razao_social = $_user_data['razao_social'];
        $cnpj = $_user_data['cnpj'];
        $email = $_user_data['email'];
        $telefone = $_user_data['telefone'];
        $cidade = $_user_data['cidade'];
        $estado = $_user_data['estado'];
        $endereco = $_user_data['endereco'];
        $senha = $_user_data['senha'];
        }

    }else{
        header('Location:sistemap.php');
    }
    

    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
    <div class="box">
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend><b>Fomulário de Cadastro</b></legend><br>
                <div class="inputBox">
                    <input type="text" name="razao_social" id="razao_social" class="inputUser" value="<?php echo $razao_social?>" required>
                    <label for="razao_social" class="labelInput">razao social</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" value="<?php echo $cnpj?>" required>
                    <label for="cnpj" class="labelInput">cnpj</label>
                </div><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email?>" required>
                    <label for="email" class="labelInput">E-mail</label>
                </div><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha?>" required>
                    <label for="senha" class="labelInput">Endereço</label>
                </div><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade?>" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado?>" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco?>" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" name="update" id="button">Atualizar</button>
                
            </fieldset>
        </form>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>