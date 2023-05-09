<?php
spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});

require_once '../includes/db.inc.php';

include 'graficCard.php';
include 'hardDisk.php';
include 'keyboard.php';
// include 'graficCard.php';
// include 'graficCard.php';
// include 'graficCard.php';
// include 'graficCard.php';
// include 'graficCard.php';
// include 'graficCard.php';
?>