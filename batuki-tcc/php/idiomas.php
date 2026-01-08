<?php
require_once('config.php');
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: entre.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idiomas - Batuki</title>
    <link rel="stylesheet" href="../css/idiomas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<nav id="menu">
    <img src="../img/logo.png" id="logo" alt="logo batuki">

    <a href="home.php">Home</a>
    <a href="idiomas.php">Idiomas</a>
    <a href="musicas.php">Músicas</a>

    <!-- PESQUISA -->
    <div class="meu_search-container">
        <form action="search.php" method="GET">
            <i id="meu_icon" class="fa fa-search"></i>
            <input type="text" id="meu_barra" class="search-input" name="query">
        </form>
    </div>

    <div class="perfil-container">
        <a href="perfil.php">
            <i class="fa-solid fa-headphones"></i>
        </a>
    </div>
</nav>
<br> <br> <br> <br> <br>
<main class="idiomas-main">
    <!-- GLOBAL -->
    <div class="ranking-container">
        <h1>Ranking 50 Global</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMDoHDwVN2tF"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- BRASIL -->
    <div class="ranking-container">
        <h1>Português - Brasil </h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMXbN3EUUhlg"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- EUA -->
    <div class="ranking-container">
        <h1>Inglês - Estados Unidos</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbLRQDuF5jeBp"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- ESPANHOL -->
    <div class="ranking-container">
        <h1>Espanhol - Espanha</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbNFJfN1Vw8d9"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- FRANCÊS -->
    <div class="ranking-container">
        <h1>Francês - França</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbIPWwFssbupI"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- ALEMÃO -->
    <div class="ranking-container">
        <h1>Alemão - Alemanha</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbJiZcmkrIHGU"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
    <br> <br> <br>
    <!-- COREANO -->
    <div class="ranking-container">
        <h1>Coreano - Coreia do Sul</h1>
        <iframe
            src="https://open.spotify.com/embed/playlist/37i9dQZEVXbNxXF4SkHj9F"
            width="1050"
            height="380"
            frameborder="0"
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            loading="lazy">
        </iframe>
    </div>
<br> <br> <br> <br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br> <br> <br> <br>

</main>

<footer>
    <div class="footer-content">
        <p>© 2024 <strong>Batuki</strong>. Todos os direitos reservados.</p>
        <p>Desenvolvido por Giovana Karolina | Fins Acadêmicos</p>
        <div class="policies">
            <a href="#">Política de Privacidade</a> |
            <a href="#">Termos de Uso</a>
        </div>
    </div>
</footer>

<!-- ✅ SCRIPT NO LUGAR CORRETO -->
<script>
const searchIcon = document.getElementById('meu_icon');
const searchInput = document.getElementById('meu_barra');
const searchContainer = document.querySelector('.meu_search-container');

const placeholders = [
    "Qual o ritmo de hoje?",
    "Qual o idioma de hoje?",
    "Encontre o que precisa!",
    "Procurando algo específico?",
    "O que deseja saber hoje?",
    "Pop? Samba? Rock?"
];

function getRandomPlaceholder() {
    return placeholders[Math.floor(Math.random() * placeholders.length)];
}

searchIcon.addEventListener('click', () => {
    if (!searchInput.style.display || searchInput.style.display === "none") {
        searchInput.style.display = "block";
        searchInput.placeholder = getRandomPlaceholder();
        searchInput.focus();
        searchContainer.classList.add('active');
    } else {
        searchInput.style.display = "none";
        searchContainer.classList.remove('active');
    }
});
</script>

</body>
</html>
