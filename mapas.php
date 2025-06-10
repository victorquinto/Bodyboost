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
    <title>BodyBoost</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #mapContainer {
            display: flex;
            flex-direction: row;
            width: 80%;
            margin: 20px auto;
        }
        #map {
            height: 400px;
            width: 60%;
        }
        #searchResults {
            width: 40%;
            padding: 15px;
            border: 1px solid #ccc;
            overflow-y: auto;
        }
        #searchResults h2 {
            margin-top: 0;
        }
        .searchResultItem {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dashed #eee;
            cursor: pointer;
        }
        .searchResultItem:last-child {
            border-bottom: none;
        }
        #pesquisa {
            background-color: rgba(128, 128, 128, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            width: 80%;
            box-sizing: border-box;
        }
        .logo {
            font-family: 'Impact', sans-serif;
            font-size: 2em;
        }
        .body-neutro {
            color: #0db94d;
        }
        .boost-neutro {
            color: #A9A9A9;
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
    <div id="pesquisa">
        <h1>Lojas Próximas na Bahia</h1>
        <input type="text" id="locationInput" placeholder="Digite um local na Bahia">
        <button onclick="searchPlaces()">Buscar</button>
    </div>
    <div id="mapContainer">
        <div id="searchResults">
            <h2>Resultados da Busca</h2>
            <ul id="resultsList">
                <!-- Resultados fixos -->
                <li class="searchResultItem" onclick="centerMapFixed(-12.9718, -38.5011)">
                    Loja BodyBoost Salvador<br>
                    Avenida Sete de Setembro, 1000, Salvador, BA<br>
                    (71) 1234-5678<br>
                    Rating: 4.8
                </li>
                <li class="searchResultItem" onclick="centerMapFixed(-13.0015, -38.5077)">
                    Loja BodyBoost Lauro de Freitas<br>
                    Av. Santos Dumont, 2000, Lauro de Freitas, BA<br>
                    (71) 8765-4321<br>
                    Rating: 4.7
                </li>
                <li class="searchResultItem" onclick="centerMapFixed(-12.8041, -38.2947)">
                    Loja BodyBoost Camaçari<br>
                    Rua do Trabalho, 300, Camaçari, BA<br>
                    (71) 9988-7766<br>
                    Rating: 4.6
                </li>
            </ul>
        </div>
        <div id="map"></div>
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        let map;
        let markers = [];

        function initMap() {
            const bahiaCenter = { lat: -12.97, lng: -38.51 };
            map = new google.maps.Map(document.getElementById("map"), {
                center: bahiaCenter,
                zoom: 7,
            });

            // Adiciona marcadores fixos
            addFixedMarker({
                lat: -12.9718, lng: -38.5011,
                name: "Loja BodyBoost Salvador",
                address: "Avenida Sete de Setembro, 1000, Salvador, BA",
                phone: "(71) 1234-5678",
                rating: "4.8"
            });
            addFixedMarker({
                lat: -13.0015, lng: -38.5077,
                name: "Loja BodyBoost Lauro de Freitas",
                address: "Av. Santos Dumont, 2000, Lauro de Freitas, BA",
                phone: "(71) 8765-4321",
                rating: "4.7"
            });
            addFixedMarker({
                lat: -12.8041, lng: -38.2947,
                name: "Loja BodyBoost Camaçari",
                address: "Rua do Trabalho, 300, Camaçari, BA",
                phone: "(71) 9988-7766",
                rating: "4.6"
            });
        }

        function addFixedMarker(data) {
            const marker = new google.maps.Marker({
                map: map,
                position: { lat: data.lat, lng: data.lng },
                title: data.name
            });
            markers.push(marker);
            const infowindow = new google.maps.InfoWindow({
                content: `
                    <div>
                        <strong>${data.name}</strong><br>
                        ${data.address}<br>
                        ${data.phone}<br>
                        Rating: ${data.rating}
                    </div>
                `
            });
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }

        function centerMapFixed(lat, lng) {
            map.setCenter({ lat: lat, lng: lng });
            map.setZoom(15);
        }

        // Se desejar manter a busca dinâmica, adicione a função searchPlaces abaixo
        function searchPlaces() {
            alert("Esta versão mostra resultados fixos. Se desejar integração com busca dinâmica, entre em contato com o desenvolvedor.");
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7yBHHvRwUkntI3W00bnsv66stFzW1h54&callback=initMap" async defer></script>
    <script src="script.js"></script>
</body>
</html>