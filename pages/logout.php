<?php
session_destroy();
// Dans logout.php :
// On transmet un paramètre GET pour noter que l'utilisateur est déconnecté

// header("Location: ?disconnected=1");