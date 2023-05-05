<?php
if (!empty($_POST)) {
    $mail = $_POST['email'];
    $sql = "SELECT * FROM `users` WHERE email = :mail";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, User::class); // si utilisation de class
    $result = $statement->fetch();
    if ($result) {
        if (password_verify($_POST['password'], $result->getPassword())) {
            $_SESSION['user'] = $result;
            header('Location: index.php?login=success');
        } else { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    Mot de passe vide ou incorrect.
                </div>
            </div>
            <?php

        }
    } else { ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                utilisateur inconnu.
            </div>
        </div>
        <?php

    }
}
?>

<form method="post" class="container">
    <div class="row col-8 col-md-6 col-lg-5 p-3 m-auto gap-4">
        <div class="form-group">
            <label for="email">Adresse mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div>

        </div>
        <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
        <a id="link_sign_in" href="?page=sign_in">pas de compte? s'inscire ici</a>
    </div>

</form>