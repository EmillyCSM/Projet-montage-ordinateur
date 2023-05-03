<?php
include_once '../includes/header.php';
include_once '../includes/footer.php';

var_dump($_POST);

if (!empty($_POST)) {
  $sql = "INSERT INTO `users`(`isConceptor`, `name`, `email`, `password`) VALUES (:isConceptor,:name, :email, :password)";
  $statement = $connection->prepare($sql);
  $statement->bindValue(":isConceptor", $_POST["status"], PDO::PARAM_STR);
  $statement->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
  $statement->bindValue(":email", $_POST["mail"], PDO::PARAM_STR);
  $statement->bindValue(":password", password_hash($_POST["password"], PASSWORD_BCRYPT), PDO::PARAM_STR);

  $statement->execute();
}

?>

<form method="post">
  <div class="form-group">
    <label for="name">Prénom</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Prénom">
  </div>
  <div class="form-group">
    <label for="mail">Adresse mail</label>
    <input type="email" class="form-control" id="mail" name="mail" placeholder="email">
  </div>
  <select name="status" id="status">
    <option value="1">Concepteur</option>
    <option value="0">Monteur</option>
  </select>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>