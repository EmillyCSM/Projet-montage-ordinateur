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