<?php
$error=null;
if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
 {
         $password='$2y$12$wMuSUgNc9rXhaXAhBFHei.s6rIGqL1CrjK62xANl/Uyw99quMwwCO';
        if (($_POST['pseudo']==="Alhouss") &&(password_verify($_POST['pass'] , $password)) ) 
        {
            session_start();
            $_SESSION['connecte']=1;
            header('Location: /dashboard.php');
            exit();
        }
}
else
{
        $error="Identifiant incorrecte";
}
require_once "functions/auth.php";
require_once "elements/header.php";
if(est_connecter()){
        header('Location: /dashboard.php');
        exit();
}
?>
<?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<form action="" method="post">
      <div class="form-group">
              <input type="text" name="pseudo" placeholder="votre nom..." class="form-control">
      </div>
        <div class="form-group">
                <input type="password" name="pass" placeholder="votre mots de pass..." class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php  require_once "elements/footer.php";?>