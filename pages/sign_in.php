<?php
$errors = [];
if (!empty($_POST)) {
  if (empty($_POST["status"])&& !($_POST["status"] == 0) ) {
    $errors['status'] = 'Veuillez definir votre status svp';
  }
  if (empty($_POST["name"])) {
    $errors['name'] = 'Veuillez entrer votre nom';
  }
  if (empty($_POST["email"])) {
    $errors['email'] = 'Oups vous avez oublié de renseigner votre adresse email ';
  }
  if (empty($_POST["password"])) {
    $errors['password'] = 'Veuillez renseigner un mot de passe svp';
  }

  if (empty($errors)) {

    $sql = "INSERT INTO `users`(`isConceptor`, `name`, `email`, `password`) VALUES (:isConceptor,:name, :email, :password)";
    $statement = $connection->prepare($sql);
    $statement->bindValue(":isConceptor", $_POST["status"], PDO::PARAM_STR);
    $statement->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    $statement->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
    $statement->bindValue(":password", password_hash($_POST["password"], PASSWORD_BCRYPT), PDO::PARAM_STR);

    $statement->execute();
    header('Location: index.php?page=login');
  }
}

?>

<form method="post" class="container">
  <div class="row col-8 col-md-6 col-lg-5 p-3 m-auto gap-4">
    <div class="form-group">
      <label for="name">Prénom</label>
      <input type="text" class="form-control <?php if (isset($errors['name'])) {
        echo "is-invalid";
      } elseif (!empty($_POST)) {
        echo "is-valid";
      } ?>" id="name" name="name" placeholder="Prénom">
      <?php
      if (isset($errors['name'])) {
        echo $errors['name'];
      }
      ?>
    </div>
    <div class="form-group">
      <label for="email">Adresse mail</label>
      <input type="email" class="form-control <?php if (isset($errors['email'])) {
        echo "is-invalid";
      } elseif (!empty($_POST)) {
        echo "is-valid";
      } ?>" id="email" name="email" placeholder="example@mail.com" value="<?php if(isset($_POST["email"])){
        echo $_POST["email"];
      } ?>">
      <?php
      if (isset($errors['email'])) {
        echo $errors['email'];
      }
      ?>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label><br>
      <input type="password" class="form-control <?php if (isset($errors['password'])) {
        echo "is-invalid";
      }  elseif (!empty($_POST)) {
        echo "is-valid";
      } 
      ?>" name="password" id="password" placeholder="Mot de passe" value="<?php if(isset($_POST["password"])){
        echo $_POST["password"];
      } ?>"><br>
      <?php
      if (isset($errors['password'])) {
        echo $errors['password'];
      }
      ?>
    </div>
    <div class="form-group">
      <label for="status">Votre statut</label>
      <select name="status" id="status" class="form-select">
        <option value="1">Concepteur</option>
        <option value="0">Monteur</option>
      </select>
      <?php
      if (isset($errors['status'])) {
        echo $errors['status'];
      }
      ?>
    </div>
    <button type="submit" class="btn btn-dark w-25 m-auto">Valider</button>
  </div>
</form>