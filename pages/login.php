<?php
include_once '../includes/header.php';
include_once '../includes/footer.php';
if (!empty($_POST)) {


    $mail = $_POST['mail'];
    $sql = "SELECT email, password FROM `users` WHERE email = '$mail'";
    $statement = $connection->query($sql);
    $result = $statement->fetch();
    $hash = $result;
    if (password_verify($_POST['password'], $hash['password'])) {
        echo "vous êtes connecté";
    } else {
        echo " ERREUR vous êtes pas connecté";
    }
}
?>
<form method="post">
    <div class="form-group">
        <label for="mail">Adresse mail</label>
        <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>