<?php
include_once '../includes/header.php';


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

<form method="post" class="container">
  <div class="row col-8 col-md-6 col-lg-5 p-3 m-auto gap-4">
    <div class="form-group">
      <label for="name">Prénom</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Prénom">
    </div>
    <div class="form-group">
      <label for="mail">Adresse mail</label>
      <input type="email" class="form-control" id="mail" name="mail" placeholder="email">
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="mot de passe">
    </div>
    <div class="form-group">
      <label for="status">Votre status</label>
      <select name="status" id="status" class="form-select">
        <option value="1">Concepteur</option>
        <option value="0">Monteur</option>
      </select>
    </div>
    <button type="submit" class="btn btn-dark w-25 m-auto">Valider</button>
  </div>
</form>

<?php
include_once '../includes/footer.php';
?>