// Array com os caminhos dos vídeos
const videos = [
    'img/video1.mp4',  // Substitua pelos caminhos dos seus vídeos
    'img/video2.mp4'
    
];

// Função para trocar o vídeo de fundo
let currentVideoIndex = 0;

function changeBackground() {
    // Define o novo vídeo de fundo
    document.getElementById('background').src = videos[currentVideoIndex];

    // Atualiza o índice para o próximo vídeo
    currentVideoIndex = (currentVideoIndex + 1) % videos.length;
}

// Inicializa a troca de fundo a cada 10 segundos
setInterval(changeBackground, 9000); // 10000ms = 10 segundos

// Chama a função uma vez ao carregar a página para definir o primeiro vídeo
changeBackground();

