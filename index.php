<?php
$page = 'login';

// SI parametre page dans URL ET page demandé est dans le tab pages
// On stock la valeur $page --> EVITER ERREUR STOCKER PAGE QUI N'EXISTE PAS
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

include_once 'includes/header.php';
include_once 'pages/' . $page . '.php';
include_once 'includes/footer.php';