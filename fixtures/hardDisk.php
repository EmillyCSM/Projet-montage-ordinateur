<?php
spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});

require_once '../includes/db.inc.php';

// $connexion->exec('TRUNCATE TABLE `exo_beanies`.`beanie`');