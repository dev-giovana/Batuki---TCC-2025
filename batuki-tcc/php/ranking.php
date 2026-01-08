<?php
require_once('config.php');
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: entre.php");
    exit();
}

// Spotify
$client_id = 'SEU_CLIENT_ID';
$client_secret = 'SEU_CLIENT_SECRET';

function getSpotifyToken($client_id, $client_secret) {
    $auth = base64_encode("$client_id:$client_secret");

    $ch = curl_init("https://accounts.spotify.com/api/token");
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
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

$token = getSpotifyToken($client_id, $client_secret);
if (!$token) die("Erro Spotify");

// Playlists (todas na mesma página)
$playlists = [
    'Top 50 Global'  => '37i9dQZEVXbMDoHDwVN2tF',
    'Top 50 Brasil' => '37i9dQZEVXbMXbN3EUUhlg',
    'Top 50 EUA'    => '37i9dQZEVXbLRQDuF5jeBp',
    'Viral Global'  => '37i9dQZEVXbLiRSasKsNU9'
];
?>
