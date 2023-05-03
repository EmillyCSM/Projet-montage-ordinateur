<?php
// session_start();

// require_once 'autoload.php';
// require_once 'config.inc.php';
require_once 'variables.php';
require_once 'functions.php';
require_once 'db.inc.php';
// Require pour qlq chose qui vient de PHP 
// Include pour le HTML

if (!isset($pageTitle)) {
    $pageTitle = "CLCD Concept";
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $pageTitle ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CLCD Concept</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Pièces <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Création pièce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Modèles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Création modèle</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: #17a2b8;"
                type="submit">Connexion</button>
        </div>
    </nav>
</body>