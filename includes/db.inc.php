<?php
// Ici, adapter les valeurs de dbname et port à votre configuration
// dbname contient le nom de la BdD à utiliser
// port est le port à utiliser (3306 par défaut)
// host est le nom d'hôte de notre serveur de BdD
// (127.0.0.1 ou localhost, les deux sont équivalents)
$dsn = 'mysql:dbname=computer_assembly;port=3306;host=127.0.0.1';
$user = 'root'; // Utilisateur par défaut
$password = ''; // Par défaut, pas de mot de passe sur Wamp

// Try nous permet d'attraper une exception
// catch (il peut y en avoir plusieurs) d'exécuter d'autres instructions 
// quand une erreur de type PDOException est levée
try {
    // On crée une connexion (objet PDO) à norte BdD,
    // nous pourrons nous en servir dans la suite du programme
    $connection = new PDO($dsn, $user, $password, [
        // Définition du mode d'erreur : on renvoie une exception 
        // dès qu'une erreur se produit dans les requêtes
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // On définit sous quel format on récupère les données de la base
        // On peut les récupérer sous la forme :
        // - D'un tableau associatif avec PDO::FETCH_ASSOC
        // - D'un objet avec PDO::FETCH_OBJ
        // - D'un objet utilisant une de vos classes avec PDO::FETCH_CLASS
        // - D'injections dans un objet avec PDO::FETCH_INTO
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    exit('Connexion échouée : ' . $e->getMessage());
}
