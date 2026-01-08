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
    <title>Músicas - Batuki</title>

    <link rel="stylesheet" href="../css/musicas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<nav id="menu">
    <img src="../img/logo.png" id="logo" alt="logo batuki">

    <a href="home.php">Home</a>
    <a href="idiomas.php">Idiomas</a>
    <a href="musicas.php">Músicas</a>

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

<main class="idiomas-main">

    <div class="ranking-container">
        <h1>Pop</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DXcBWIGoYBM5M"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Rock</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWXRqgorJj26U"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Hip Hop</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX0XUsuxWHRQd"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Rap</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWY4xHQp97fN6"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Funk</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DXa2PvUpywmrr"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Sertanejo</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX3PIPIT6lEg5"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Pagode</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWV8IND7NkP2W"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Samba</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX4SBhb3fqCJd"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Eletrônica</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX4dyzvuaRJ0n"></iframe>
    </div>

    <div class="ranking-container">
        <h1>House</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX2TRYkJECvfC"></iframe>
    </div>

    <div class="ranking-container">
        <h1>K-Pop</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX9tPFwDMOaN1"></iframe>
    </div>

    <div class="ranking-container">
        <h1>Indie</h1>
        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX2Nc3B70tvx0"></iframe>
    </div>

</main>

<footer>
    <div class="footer-content">
        <p>© 2024 <strong>Batuki</strong>. Todos os direitos reservados.</p>
        <p>Desenvolvido por Giovana Karolina | Fins Acadêmicos</p>
    </div>
</footer>

<script>
const searchIcon = document.getElementById('meu_icon');
const searchInput = document.getElementById('meu_barra');
const searchContainer = document.querySelector('.meu_search-container');

const placeholders = [
    "Qual o gênero de hoje?",
    "Pop, rock ou funk?",
    "Que som você procura?",
    "Descubra novos estilos!"
];

searchIcon.addEventListener('click', () => {
    if (!searchInput.style.display || searchInput.style.display === "none") {
        searchInput.style.display = "block";
        searchInput.placeholder = placeholders[Math.floor(Math.random() * placeholders.length)];
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
