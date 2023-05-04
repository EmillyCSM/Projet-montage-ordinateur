<?php
if (!empty($_POST)) {
    $mail = $_POST['mail'];
    $sql = "SELECT email, password FROM `users` WHERE email = '$mail'";
    $statement = $connection->query($sql);
    // $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
    $result = $statement->fetch();
    $hash = $result;
    if (password_verify($_POST['password'], $hash['password'])) {
        echo "vous êtes connecté";
    } else {
        echo " ERREUR vous êtes pas connecté";
    }
}
?>
<form method="post" class="container">
    <div class="row col-8 col-md-6 col-lg-5 p-3 m-auto gap-4">
        <div class="form-group">
            <label for="mail">Adresse mail</label>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div>

        </div>
        <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
        <a id="link_sign_in" href="?page=sign_in">pas de compte? s'inscire ici</a>
    </div>

</form>