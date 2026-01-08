<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Músicas - PT-BR. </title>
    <link rel="stylesheet" href="../css/pt.css"> <!-- Link para o arquivo CSS externo --></head>
<body>
    
  <nav id="menu">
      <img src="../img/logo.png" id="logo" alt="logo batuki"> 

      <a href="home.php">
       home
      </a>
      <a href="idiomas.php">
          idiomas
      </a>
      <a href="musicas.php">
          músicas
      </a>

<!-- PESQUISA -->
<div class="meu_search-container">
    <form action="search.php" method="GET">
        <i id="meu_icon" class="fa fa-search" onclick="toggleSearch()"></i>
        <input type="text" id="meu_barra" class="search-input" name="query">
    </form>
</div>

<div class="perfil-container">
        <a href="perfil.php">
        <i class="fa-solid fa-headphones"></i></a>
    </div>
</nav>
<br> <br> <br> <br> <br>
    <!-- BRASIL -->
        <h1>Português - Brasil </h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMXbN3EUUhlg"
            width="1050"
            height="1000"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy"
            margin-right="35vh"
            align-items="center">
        </iframe>
<br> <br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br> <br>
<footer>
    <div class="footer-content">
        © 2024 <strong>Batuki</strong>. Todos os direitos reservados.<br>
        Desenvolvido por Giovana Karolina | Fins Acadêmicos
        <div class="policies">
            <a href="#">Política de Privacidade</a> | 
            <a href="#">Termos de Uso</a>
        </div>
    </div>
    </footer>
<script>
        // Seleciona os elementos da lupa e do campo de busca
        const searchIcon = document.getElementById('meu_icon');
        const searchInput = document.getElementById('meu_barra');
        const searchContainer = document.querySelector('.meu_search-container');
      
        // Array de placeholders que mudarão aleatoriamente
        const placeholders = [
          " Qual o ritmo de hoje?",
          " Qual o idioma de hoje?",
          " Encontre o que precisa!",
          " Procurando algo específico?",
          " O que deseja saber hoje?",
          " Pop? Samba? Rock?"
      ];
      
          // Função para selecionar um placeholder aleatório
          function getRandomPlaceholder() {
          const randomIndex = Math.floor(Math.random() * placeholders.length);
          return placeholders[randomIndex];
      }
      
          // Adiciona um evento de clique ao ícone da lupa
          searchIcon.addEventListener('click', function() {
          // Alterna a classe ativa no contêiner de busca
          if (searchInput.style.display === "none" || searchInput.style.display === "") {
              searchInput.style.display = "block";
              searchInput.placeholder = getRandomPlaceholder();  // Define o placeholder aleatório
              searchInput.focus();  // Coloca o cursor no campo de texto automaticamente
              searchContainer.classList.add('active'); // Adiciona a classe para expandir o campo de texto
          } else {
              searchInput.style.display = "none";
              searchContainer.classList.remove('active'); // Remove a classe para esconder o campo de texto
              searchInput.blur();   // Tira o foco do input
          }
      
          // LUPA
          function toggleSearch() {
          var container = document.querySelector('.meu_search-container');
          container.classList.toggle('active');
      }
      
      });
      </script>

      
<!-- Script player -->
<script>
function togglePlayPause(icon) {
    // Encontrar o div "audio-player" pai
    var player = icon.closest('.audio-player');
    
    // Procurar um elemento <audio> ou criar se não existir
    var audio = player.querySelector('audio');
    if (!audio) {
        var previewUrl = player.getAttribute('data-preview-url');
        audio = document.createElement('audio');
        audio.src = previewUrl;
        player.appendChild(audio);
    }

    // Alternar entre play e pause
    if (audio.paused) {
        audio.play();
        icon.classList.remove('fa-play');  // Remove ícone de play
        icon.classList.add('fa-pause', 'pause-icon');    // Adiciona ícone de pause
    } else {
        audio.pause();
        icon.classList.remove('fa-pause'); // Remove ícone de pause
        icon.classList.add('fa-play', 'play-icon');     // Adiciona ícone de play
    }

    // Evento para voltar o ícone para play quando a música terminar
    audio.onended = function() {
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
    };
}
</script>

