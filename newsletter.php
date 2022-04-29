<?php  require "elements/header.php" ;
$email="";
$success=null;
$error=null;
  if (!empty($_POST["email"])) 
  {
     if (filter_var(($_POST["email"]))) {
      $email=$_POST["email"];
      $success="L'email a été bien enregistrer";
      $filePath=__DIR__ . DIRECTORY_SEPARATOR . "emails" . DIRECTORY_SEPARATOR . date("Y-m-d");
      file_put_contents($filePath,$email.PHP_EOL,FILE_APPEND);
      $email=null;
    }
  } 
  else
  {
      $error="Cet email est invalide";
  }
?>
<!-- -------------------------------- -->
<?php if($success): ?>
      <div class="alert alert-success"><?= $success ?></div>
<?php endif ?>
<?php if($error): ?> 
        <div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<form action="/newsletter.php" method="POST">
      <div class="form-group">
              <input type="email" name="email" placeholder="Votre email..." value="<?= htmlentities($email) ?>">
              <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
</form>
<!-- -------------------------------- -->
<?php require "elements/footer.php" ;?>