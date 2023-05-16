<?php
require_once 'autoload.php';
session_start();
require_once 'db.inc.php';
require_once 'variables.php';
require_once 'functions.php';
// Require pour qlq chose qui vient de PHP 
// Include pour le HTML

if (!isset($pageTitle)) {
    $pageTitle = "CLCD Concept";
} ?>



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
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="?page=home">CLCD Concept</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-sm-between pe-2" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="?page=list_pieces">Pièces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=add_piece">Création pièce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=list_models">Modèles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=model_form">Création modèle</a>
                        </li>
                    </ul>
                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) {
                        ?>
                        <a class="nav-item btn btn-secondary" href="?page=logout">Déconnexion</a>
                        <?php
                    } else {
                        ?>
                        <a class="nav-item btn btn-secondary" href="?page=login">Connexion</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
        <?php

        if (isset($_GET['login']) && $_GET['login'] == "success") { ?>
            <div class="alert alert-success" role="alert">
                Connexion avec succès !
            </div>
        <?php }

        if (isset($_GET['logout']) && $_GET['logout'] == "success") { ?>
            <div class="alert alert-success" role="alert">
                Déconnexion avec succès !
            </div>
        <?php } ?>
    </header>