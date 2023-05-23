<?php
$pages = [
    'home' => "Accueil",
    'login' => "Connexion",
    'logout' => "Déconnexion",
    'sign_in' => "Inscription",
    'add_piece' => "Ajout ou Modification pièce",
    'list_pieces' => "Liste des pièces",
    'list_models' => "Liste des modèles",
    'model_form' => "Ajout/modification modèle",
];
$page = 'home';

// SI parametre page dans URL ET page demandé est dans le tableau pages ALORS on stock la valeur dans $page
//--> EVITER ERREUR STOCKER PAGE QUI N'EXISTE PAS
if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
    $page = $_GET['page'];
}

$pageTitle = $pages[$page];

// Temporisation de sortie ne semble pas nécessaire à vérifier avec Rémi
ob_start();

include_once 'includes/header.php';
include_once 'pages/' . $page . '.php';
include_once 'includes/footer.php';

ob_end_flush();