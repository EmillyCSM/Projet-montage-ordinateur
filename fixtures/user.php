<?php

$users = [
    (new User())
        ->setName('Malak BOUAKER')
        ->setEmail('malak@gmail.com')
        ->setIsConceptor(1)
        ->setPassword('malak123'),
    (new User())
        ->setName('Emilly MESQUITA')
        ->setEmail('emilly@gmail.com')
        ->setIsConceptor(0)
        ->setPassword('emilly123'),
    (new User())
        ->setName('Rémi JARJAT')
        ->setEmail('remi@gmail.com')
        ->setIsConceptor(0)
        ->setPassword('remi123'),
];

$insertUsers = "INSERT INTO `users`(`name`, `email`, `password`, `isConceptor`) VALUES (:name, :email, :password, :isConceptor)";

$statementUser = $connection->prepare($insertUsers);

foreach ($users as $user) {
    $statementUser->bindValue(":name", $user->getName(), PDO::PARAM_STR);
    $statementUser->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
    $statementUser->bindValue(":isConceptor", $user->getIsConceptor(), PDO::PARAM_STR);
    $statementUser->bindValue(":password", password_hash($user->getPassword(), PASSWORD_BCRYPT), PDO::PARAM_STR);

    $statementUser->execute();
}