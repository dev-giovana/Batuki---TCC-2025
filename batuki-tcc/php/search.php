<?php
    // Credenciais de API do Spotify
    $client_id = '';
    $client_secret = '';

// ================== TOKEN ==================
function getAccessToken($client_id, $client_secret) {
    $auth = base64_encode($client_id . ':' . $client_secret);

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://accounts.spotify.com/api/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Basic $auth",
            "Content-Type: application/x-www-form-urlencoded"
        ],
        CURLOPT_POSTFIELDS => "grant_type=client_credentials"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return $data['access_token'] ?? null;
}

// ================== SEARCH OFICIAL ==================
function searchSpotify($query, $token) {
    $query = urlencode($query);
    $url = "https://api.spotify.com/v1/search?q=$query&type=track,album,playlist&limit=12";

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $token"
        ]
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// ================== EXECUÇÃO ==================
$query = $_GET['query'] ?? '';
$results = null;

if (!empty($query)) {
    $token = getAccessToken($client_id, $client_secret);
    $results = searchSpotify($query, $token);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisa </title>
    <link rel="stylesheet" href="../css/search.css">
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

<!-- ================== RESULTADOS ================== -->
<?php if ($results): ?>

<div class="results">

<!-- ================== FAIXAS ================== -->
<h2 class="title">Faixas</h2>
<div class="carousel-container">
    <button class="carousel-arrow left-arrow" onclick="moveCarousel('tracks', -1)">❮</button>

    <div class="carousel-wrapper">
        <div class="carousel" id="tracks">
            <?php foreach ($results['tracks']['items'] as $i => $track): ?>
                <div class="track">
                    <img src="<?= $track['album']['images'][0]['url'] ?>" class="track-image">
                    <div class="title-track"><?= htmlspecialchars($track['name']) ?></div>
                    <div class="title-artist"><?= htmlspecialchars($track['artists'][0]['name']) ?></div>

                    <?php if ($track['preview_url']): ?>
                        <button class="play-button" onclick="togglePlay(this, <?= $i ?>)">
                            <i class="fa-solid fa-play"></i>
                        </button>
                        <audio id="audio-<?= $i ?>" src="<?= $track['preview_url'] ?>"></audio>
                    <?php else: ?>
                        <p class="preview-unavailable">Prévia indisponível</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <button class="carousel-arrow right-arrow" onclick="moveCarousel('tracks', 1)">❯</button>
</div>

<!-- ================== ÁLBUNS ================== -->
<h2 class="title">Álbuns</h2>
<div class="carousel-container">
    <button class="carousel-arrow left-arrow" onclick="moveCarousel('albums', -1)">❮</button>

    <div class="carousel-wrapper">
        <div class="carousel" id="albums">
            <?php foreach ($results['albums']['items'] as $album): ?>
                <a href="detalhes_album.php?id=<?= $album['id'] ?>" class="album-button">
                    <img src="<?= $album['images'][0]['url'] ?>">
                    <div class="title-album"><?= htmlspecialchars($album['name']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <button class="carousel-arrow right-arrow" onclick="moveCarousel('albums', 1)">❯</button>
</div>

<!-- ================== PLAYLISTS ================== -->
<h2 class="title">Playlists</h2>
<div class="carousel-container">
    <button class="carousel-arrow left-arrow" onclick="moveCarousel('playlists', -1)">❮</button>

    <div class="carousel-wrapper">
        <div class="carousel" id="playlists">
            <?php foreach ($results['playlists']['items'] as $playlist): ?>
                <a href="<?= $playlist['external_urls']['spotify'] ?>" target="_blank" class="album-button">
                    <img src="<?= $playlist['images'][0]['url'] ?>">
                    <div class="title-album"><?= htmlspecialchars($playlist['name']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <button class="carousel-arrow right-arrow" onclick="moveCarousel('playlists', 1)">❯</button>
</div>

</div>
<?php endif; ?>

<!-- ================== SCRIPT ================== -->
<script>
function moveCarousel(id, dir) {
    const el = document.getElementById(id);
    const item = el.children[0];
    const width = item.offsetWidth + 20;
    let pos = parseInt(el.dataset.pos || 0);
    pos += dir;
    if (pos < 0) pos = 0;
    el.style.transform = `translateX(${-pos * width}px)`;
    el.dataset.pos = pos;
}

function togglePlay(btn, i) {
    const audio = document.getElementById(`audio-${i}`);
    const all = document.querySelectorAll('audio');
    const icons = document.querySelectorAll('.play-button i');

    all.forEach(a => a.pause());
    icons.forEach(ic => ic.className = 'fa-solid fa-play');

    if (audio.paused) {
        audio.play();
        btn.querySelector('i').className = 'fa-solid fa-pause';
    }
}

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
