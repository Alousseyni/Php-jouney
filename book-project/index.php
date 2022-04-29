<?php
require_once "classes/Message.php";
require_once "classes/GuestBook.php";
$errors=[];
$success=false;
$guestBook = new GuestBook(__DIR__.DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."mesAvis");
if (isset($_POST['username'],$_POST['message'])) 
{
  $message=new Message($_POST['username'],$_POST['message']);
    if ($message->isValid()) {
     $guestBook->addMessage($message);
     $success=true;
     $_POST=[];
    }
    else{
      $errors=$message->getErrors();
    }
}
$message=$guestBook->getMessage();
$title="Livre d'or";
require "elements/header.php";
?>
<!-- -------------------------- -->
<main>
              <div class="container">
                             <h1>Livre d'or</h1>
              </div>
              <?php if($errors):?>
                    <div class="form-group">
                        <div class="alert alert-danger">Formulaire invalide</div>
                    </div>
              <?php endif ?>
              <?php if($success):?>
                    <div class="form-group">
                        <div class="alert alert-success">Merci pour votre avis</div>
                    </div>
              <?php endif ?>
        <form action="" method="post">
                  <div class="form-group">
                           <input type="text" name="username" placeholder="Entre votre nom..." class="form-control <?= isset($errors['username'])?'is-invalid':'is-valid'?>">
                           <?php if(isset($errors['username'])): ?>
                                    <div class="invalid-feedback"><?= $errors['username'] ?></div>
                           <?php endif ?>
                  </div>
                  <div class="form-group">
                         <textarea name="message" placeholder="Entre votre avis sur le livre" class="form-control <?= isset($errors['username'])?'is-invalid':'is-valid'?>"></textarea>
                         <?php if(isset($errors['message'])): ?>
                                    <div class="invalid-feedback <?= isset($errors['message'])?>"><?= $errors['message'] ?></div>
                           <?php endif ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <?php if(!empty($message)):?>
                 <h1 class="mt-4">Vos message</h1>
                    <?php foreach($message as $msge): ?>
                        <?= $msge->toHTML()?>
                    <?php endforeach ?>
        <?php endif ?>
</main>
<!-- ----------------------------- -->
<?php require "elements/footer.php"; ?>