<?php
include_once '../includes/header.php';
include_once '../includes/footer.php';

var_dump($_POST);

$sql = "INSERT INTO `users`(`isConceptor`, `name`, `email`, `password`) VALUES (:isConceptor,:name, :email, :password)";
$statement = $connection ->prepare($sql);
$statement->bindValue(":isConceptor",$_POST["status"],PDO::PARAM_STR);
$statement->bindValue(":name",$_POST["name"],PDO::PARAM_STR);
$statement->bindValue(":email",$_POST["mail"],PDO::PARAM_STR);
$statement->bindValue(":password",$_POST["password"],PDO::PARAM_STR);

$statement->execute();

?>

<form method="post">
<div class="form-group">
    <label for="name">Prénom</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter mail">
  </div>
  <div class="form-group">
    <label for="mail">Adresse mail</label>
    <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
  </div>
<select name="status" id="status">
  <option value="1">Concepteur</option>
  <option value="0">Monteur</option>
</select>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>